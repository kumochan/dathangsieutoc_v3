<?php

namespace App\Http\Controllers\Api;

use App\HistoryTransaction;
use Illuminate\Http\Request;
use App\Helper;

class HistoryTransactionController extends ThingController
{
    //
    public function grid(Request $request)
    {
        $order_id = $request->input('order_id');
        $order_id = str_replace('ĐHST-', '', $order_id);
        $transaction_status_id = $request->input('transaction_status_id');
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $user_id = 0;
        if($request->input('user_id')) {
            $user_id = Helper::regexUserEmail($request->input('user_id'));
        }
        $transaction = HistoryTransaction::pagedList($order_id, $offset, $limit, $from_date, $to_date, $transaction_status_id, $user_id);
        $totalRow = HistoryTransaction::count($order_id, $from_date, $to_date, $transaction_status_id, $user_id);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $transaction
        );
        $result = json_encode($jsonData);
        return $result;
    }
//    public function delete(Request $request)
//    {
//        $ids = $request->input('ids');
//        DB::table('orders')->whereIn('id', $ids)->delete();
//        return response()->json(200);
//    }
    /**
     * Dữ liệu chuyên mục theo dạng cây với kiểu json => sử dụng để load vào jstree
     */

}
