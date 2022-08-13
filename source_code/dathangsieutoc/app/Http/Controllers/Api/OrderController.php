<?php
namespace App\Http\Controllers\Api;

use App\Option;
use App\OrderDetail;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use session;
use App\User;
use App\ConstValue;
class OrderController extends ThingController
{
    //
    public function grid(Request $request, $type = 0)
    {
        $user_name = $request->input('user_name');
        $user_id = $request->input('user_id');
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        if ($request->input('complain') == true) {
            $type = ConstValue::ORDER_STATUS_ID_11;
        }
        $orders = Orders::pagedList($search, $offset, $limit, $type, $from_date, $to_date, $user_name, $user_id);
        $totalRow = Orders::count($search, $type, $from_date, $to_date, $user_name, $user_id);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $orders
        );
        return $jsonData;
    }

    public function delete(Request $request)
    {
        $ids = $request->input('ids');
        DB::table('orders')->whereIn('id', $ids)->delete();
        return response()->json(200);
    }

    public function addOrder(Request $request)
    {  
        $content = $request->all(); 
        $all_order = [$content];
        $exchange_rate = Option::get('exchange_rate');
        try {
            DB::beginTransaction();
            foreach ($all_order as $order) {
                $product_price_cn = $order['attributes']['price_cn'];
                $product_price_vn = $product_price_cn * $exchange_rate * 1000;
                $prepayment = $product_price_vn * 0.9;
                $total_price_vn = $product_price_vn;
                $total_price_cn = $product_price_cn;
                $user_id = $order['user_id'];
                $orders = new Orders();
                $orders->shop_name = $order['attributes']['shop_name'];
                $orders->shop_id = $order['attributes']['shop_id'];
                $orders->number_order = $order['attributes']['number_order'];
                $orders->price_cn = $product_price_cn;
                $orders->price_vn = $product_price_vn;
                $orders->prepayment = $prepayment;
                $orders->arrears_fee = $product_price_vn;
                $orders->customer_id = $user_id;
                $orders->total_price_vn = $total_price_vn;
                $orders->total_price_cn = $total_price_cn;
                $orders->save();
                foreach ($order['product'] as $orderDetail) {
                    $detail = new OrderDetail();
                    $detail->name = $orderDetail['name'];
                    $detail->image_link = $orderDetail['image_link'];
                    $detail->number = $orderDetail['number'];
                    $detail->color = $orderDetail['color'];
                    $detail->size = $orderDetail['size'];
                    $detail->detail_price_cn = $orderDetail['detail_price_cn'];
                    $detail->detail_price_vn = $orderDetail['detail_price_cn'] * $exchange_rate * 1000;;
                    $detail->detail_total_price_cn = $orderDetail['detail_total_price_cn'];
                    $detail->detail_total_price_vn = $orderDetail['detail_total_price_cn'] * $exchange_rate * 1000;;
                    $detail->order_id = $orders->id;
                    $detail->save();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            $message = $e->getMessage();
            DB::rollBack();
            return response("Gặp lỗi trong quá trình thêm sản phẩm vui lòng liên hệ với admin \n {$message}");
        }
        return response('Thêm vào giỏ hàng thành công');
    }
}
