<?php

namespace App\Http\Controllers\Backend;
use App\Option;
use App\Orders;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\ConstValue;

class OrderDetailController extends Controller
{
    public function index($id = '')
    {
        $exchange_rate = Option::get('exchange_rate');
        $customer = Auth::user();
        $customer_id = $customer->id;
        $orders = DB::table('orders')->selectRaw('orders.*, order_detail.*, users.name as customer_name, users.id as user_customer_id, users.username')
            ->join('users','orders.customer_id', '=', 'users.id')
            ->join('order_detail', 'orders.id','=' ,'order_detail.order_id')
            ->where('orders.id', $id)
            ->get();
        if ($customer->cant('edit-order')) {
            $orders = $orders->filter(function ($item) use ($customer_id) {
                return $item->customer_id == $customer_id;
            });
        }
        $status_bar = Orders::getStatusBar($orders[0]->status_id);
        $array_user_id = $orders[0]->user_id;
        $array_user = User::getArrayUser($array_user_id);
        return view('backend.order.order_detail', compact('orders', 'exchange_rate', 'array_user', 'status_bar'));
    }

    public function showEditForm($id)
    {
        $exchange_rate = Option::get('exchange_rate');
        $customer = Auth::user();
        $customer_id = $customer->id;
        $orders = DB::table('orders')->selectRaw('orders.*, order_detail.*, users.name as customer_name, users.id as user_customer_id, users.username')
            ->join('users','orders.customer_id', '=', 'users.id')
            ->join('order_detail', 'orders.id','=' ,'order_detail.order_id')
            ->where('orders.id', $id)
            ->get();
        if ($customer->cant('edit-order')) {
            $orders = $orders->filter(function ($item) use ($customer_id) {
                return $item->customer_id == $customer_id;
            });
        }
        $status_bar = Orders::getStatusBar($orders[0]->status_id);
        $array_user_id = $orders[0]->user_id;
        $array_user = User::getArrayUser($array_user_id);
        return view('backend.order.order_detail_edit', compact('orders', 'exchange_rate', 'array_user', 'status_bar'));
    }

    public function updateStatus(Request $request) {
        $orders = Orders::find($request->input('orders_id'));
        $orders->status_id = $request->input('status_id');
        if ($orders->save()) {
            return response()->json(200);
        } else {
            return response()->json(500);
        }
    }

    public function updateDetail(Request $request) {
        try {
            DB::beginTransaction();
            $order = Orders::find($request->input('orders_id'));
            $total = 0;
            $exchange_rate = Option::get('exchange_rate');
            foreach($request->all() as $key => $money) {
                if($key == '_token' || $key == 'orders_id') {
                    continue;
                } else {
                    $total += $money;
                    $order->$key = $money;
                }
            }
            $order->total_price_vn += $total;
            $order->total_price_cn = $order->total_price_vn/$exchange_rate;
            $order->arrears_fee += $total;
            $order->save();
            DB::commit();
            return back()->withInput();
            
        } catch (Exception $e) {
            $e->getMessage();
            DB::rollBack();
            return back()->with('error', 'Gặp lỗi trong quá trình sửa thông tin vui lòng liên hệ với admin')->withInput();
        }
    }

    public function reportOrder($id)
    {
        $exchange_rate = Option::get('exchange_rate');
        $orders = DB::table('orders')->selectRaw('orders.*, order_detail.*, users.name as customer_name, users.id as user_customer_id, users.username')
        ->join('users','orders.customer_id', '=', 'users.id')
        ->join('order_detail', 'orders.id','=' ,'order_detail.order_id')
        ->where('orders.id', $id)
        ->get(); 
        //dd($orders);
        return view('backend.order.report_order', compact('orders', 'exchange_rate'));
    }

    public function setReportOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $order = Orders::where('id', $request->input('order_id'))->first();
            $order->status_id = 11;
            $order->status_name = ConstValue::ORDER_STATUS_11;
            $order->note = $request->input('note');
            if ($order->save()) {
                DB::commit();
                return back()->with('success', 'Thành công')->withInput();
            }
        } catch (Exception $e) {
            $e->getMessage();
            DB::rollBack();
            return back()->with('error', 'Gặp lỗi trong quá trình sửa thông tin vui lòng liên hệ với admin')->withInput();
        }
    }
}
