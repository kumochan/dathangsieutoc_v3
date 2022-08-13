<?php

namespace App\Http\Controllers\Backend;
use App\Option;
use App\Orders;
use App\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Helper;

class OrderController extends Controller
{
    public function index($currentUrl = '')
    {
        $statusBar = Orders::getStatusBar($currentUrl);
        return view('backend.order.order_index', compact('statusBar', 'currentUrl'));
    }
    public function userOrderIndex($user_id) {
        // currentUrl = 0 => status mac dinh la tat ca.
        $currentUrl = 0;
        $statusBar = Orders::getStatusBar($currentUrl);
        $customer_id = $user_id;
        return view('backend.order.user_order_index', compact('statusBar', 'currentUrl', 'customer_id'));
    }
    public function cart()
    {
        $customer_id = Auth::user()->id;
        $order = DB::table('orders')->join('order_detail', 'orders.id','=' ,'order_detail.order_id')
            ->where('orders.customer_id', $customer_id)->where('status_id', 0)->get()->groupBy('order_id');
        return view('backend.order.cart')->with('orders', $order);
    }

    public function addOrder(Request $request) {
        $array_order_detail_id = $request->input('array_product');
        $array_order_detail_id = array_filter($array_order_detail_id);
        if (!empty($array_order_detail_id)) {
            try {
                DB::beginTransaction();
                $order_id = $request->input('order_info');
                $order = Orders::findOrFail($order_id);
                $arrayOrderDetailObj = Orders::getOrderDetailByOrderId($order_id)->filter(function ($order_detail) use ($array_order_detail_id) {
                    return in_array($order_detail->id, $array_order_detail_id);
                });
                $arrayOrderDetailObj->each(function ($detail) use ($request, $order_id) {
                    $orderDetailId = $detail->id;
                    $detail->detail_total_price_cn = $request->input("detail_total_price_cn_{$orderDetailId}_{$order_id}");
                    $detail->detail_total_price_vn = $request->input("detail_total_price_vn_{$orderDetailId}_{$order_id}");
                    $detail->number = $request->input("detail_number_{$orderDetailId}_{$order_id}");
                    $detail->detail_note = $request->input("detail_note_{$orderDetailId}_{$order_id}");
                    $detail->save();
                });
                $product_type = empty($request->input('product_type')) ? '': implode(',', $request->input('product_type'));
                $order->product_type = $product_type;
                $order->number_order = $request->input("update_number_{$order_id}");
                $order->total_price_cn = $request->input("update_price_cn_{$order_id}");
                $order->total_price_vn = $request->input("update_price_vn_{$order_id}");
                $order->received_address = $request->input("received_address");
                $order->note = $request->input("order_note");
                $order->warehouse = $request->input("warehouse");
                $order->setStatus($request->input("status_id"));
                if ($order->save()) {
                    DB::commit();
                }
            } catch (\Exception $e) {
                $message = $e->getMessage();
                DB::rollBack();
                return back()->with('error', 'Gặp lỗi trong quá trình thêm sản phẩm vui lòng liên hệ với admin')->withInput();
            }
        }
        return back();
    }

    public function getListOrderByUserId(Request $request)
    {
        $user_name = $request->input('user_name');
        $user_id = Helper::regexUserEmail($user_name);
        $order = Orders::where('customer_id', $user_id)->get();
        $order = collect($order)->map(function ($item) {
            return 'ĐHST-'. $item->customer_id .'-'. $item->id;
        });
        return response($order);
    }

    public function getComplainOrder() {
        return view('backend.order.complain');
    }

    public function softDelete($id) {
        try {
            $today = date('Y-m-d h:i:s');
            DB::beginTransaction();
            $order = Orders::findOrFail($id);
            $order->deleted_at = $today;
            $order->save();
            $orderdetail = OrderDetail::where('order_id', $order->id)->update([
                'deleted_at' => $today
            ]);
            DB::commit();
            return back()->with('susscess', 'Xóa thành công');
        } catch(\Exception $e) {
             DB::rollBack();
            return back()->with('error', 'Thất bại');
        }
    }
}
