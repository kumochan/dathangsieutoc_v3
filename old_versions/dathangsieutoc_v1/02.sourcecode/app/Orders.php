<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\DateTime;
class Orders extends Model
{
    const PRODUCT_TYPE = [
        1 => 'Hàng dễ vỡ',
        2 => 'Đóng gỗ',
        3 => 'Kiểm đếm',
    ];


    protected $table = 'orders';

    public static function getOrderDetailByOrderId($id)
    {
        return OrderDetail::where('order_id', $id)->get();
    }

    public function setStatus($statusId)
    {
        $status = Option::getOrderStatus();
        if ($statusId == count($status) - 1) {
            return false;
        }
        $nextStatus = $statusId + 1;
        $this->status_id = $nextStatus;
        $this->status_name = $status[$nextStatus];
    }

    public static function pagedList($search, $offset, $limit, $type, $from_date, $to_date, $user_name, $user_id)
    {
        $customer_id = session('current_user')->id;
        $search = str_replace("ĐHST-{$customer_id}-", '', $search);
        $from_date = !empty($from_date) ? strtotime("{$from_date} 00:00:00") : '';
        $to_date = !empty($to_date) ? strtotime("{$to_date} 00:00:00") : '';
        //type = 0 là đon hàng chưa đặt
        $operator = $type == 0 ? '>' : '=';
        $list = Orders::selectRaw('orders.* , order_detail.image_link as image, users.name as customer_name,
        sum(order_detail.detail_total_price_cn) as detail_total_price_cn,
        sum(order_detail.detail_total_price_vn) as detail_total_price_vn')
            ->leftJoin('order_detail','order_detail.order_id','=','orders.id')
            ->leftJoin('users','users.id','=','orders.customer_id')
            ->where('orders.status_id', $operator, $type)
            ->where('orders.id',  'like', '%' . $search . '%')
            ->where('orders.deleted_at', null)
            ->where('users.name',  'like', '%' . $user_name . '%')
            ->groupBy('orders.id')
            ->offset($offset)
            ->limit($limit)
            ->get()->each(function ($item, $index){
                $item->numerical_order = $index + 1;
            });
        if (session('current_user')->cant('edit-order')) {
            $list = $list->filter(function ($item) use ($customer_id) {
                return $item->customer_id == $customer_id;
            });
        }
        if ($user_id && $user_name == '') {
            $list = $list->filter(function ($item) use ($user_id) {
                return $item->customer_id == $user_id;
            });
        }
        $list = $list->filter(function ($item) use ($from_date, $to_date) {
                if (empty($from_date) && !empty($to_date)) {
                    return strtotime($item->created_at) <= $to_date;
                } else if (!empty($from_date) && empty($to_date)) {
                    return strtotime($item->created_at) >= $from_date;
                } else if (!empty($from_date) && !empty($to_date)) {
                    return  strtotime($item->created_at) >= $from_date && strtotime($item->created_at) <= $to_date;
                }
                return $item;
            });
        return $list->values();
    }
    public static function count($search, $type, $from_date, $to_date, $user_name, $user_id)
    {
        $customer_id = session('current_user')->id;
        $search = str_replace("ĐHST-{$customer_id}-", '', $search);
        $from_date = !empty($from_date) ? strtotime("{$from_date} 00:00:00") : '';
        $to_date = !empty($to_date) ? strtotime("{$to_date} 00:00:00") : '';
        //type = 0 là đon hàng chưa đặt
        $operator = $type == 0 ? '>' : '=';
        $list = Orders::selectRaw('orders.* , order_detail.image_link as image, 
        sum(order_detail.detail_total_price_cn) as detail_total_price_cn,
        sum(order_detail.detail_total_price_vn) as detail_total_price_vn')
            ->leftJoin('order_detail','order_detail.order_id','=','orders.id')
            ->leftJoin('users','users.id', '=', 'orders.customer_id')
            ->where('orders.status_id', $operator, $type)
            ->where('orders.id',  'like', '%' . $search . '%')
            ->where('orders.deleted_at', null)
            ->where('users.name',  'like', '%' . $user_name . '%')
            ->groupBy('orders.id')
            ->get()->each(function ($item, $index){
                $item->numerical_order = $index + 1;
            });
        if (session('current_user')->cant('edit-order')) {
            $list = $list->filter(function ($item) use ($customer_id) {
                return $item->customer_id == $customer_id;
            });
        }
        if ($user_id && $user_name == '') {
            $list = $list->filter(function ($item) use ($user_id) {
                return $item->customer_id == $user_id;
            });
        }
        $list = $list->filter(function ($item) use ($from_date, $to_date) {
            if (empty($from_date) && !empty($to_date)) {
                return strtotime($item->created_at) <= $to_date;
            } else if (!empty($from_date) && empty($to_date)) {
                return strtotime($item->created_at) >= $from_date;
            } else if (!empty($from_date) && !empty($to_date)) {
                return  strtotime($item->created_at) >= $from_date && strtotime($item->created_at) <= $to_date;
            }
            return $item;
        });
        return count($list);
    }

    public static function getStatusBar($currentUrl = '') {
        $statusBar = Option::getOrderStatus();
        $total = 0;
        $newStatusBar = array();
        $newStatusBar[0] = 'Tất cả';
        $customer_id = Auth::user()->id;
        foreach ($statusBar as $key => $value) {
            if ($key == 0) {
                continue;
            }
            if (session('current_user')->can('edit-order')) {
                $count = Orders::where('status_id', $key)->count();
            } else {
                $count = Orders::where('status_id', $key)->where('customer_id', $customer_id)->count();
            }
            if($currentUrl == $key) {
                $newStatusBar[$key] = array('active' => 'active', 'total' => $count, 'currentUrl' => $key, 'name' => $value);
            } else {
                $newStatusBar[$key] = array('total' => $count, 'currentUrl' => $key, 'name' => $value);
            }
            $total += $count;
        }
        if($currentUrl == '') {
            $newStatusBar[0] = array('active' => 'active', 'total' => $total, 'currentUrl' => '', 'name' => "Tất cả");
        } else {
            $newStatusBar[0] = array('total' => $total, 'currentUrl' => '', 'name' => "Tất cả");
        }
        return $newStatusBar;
    }
}
