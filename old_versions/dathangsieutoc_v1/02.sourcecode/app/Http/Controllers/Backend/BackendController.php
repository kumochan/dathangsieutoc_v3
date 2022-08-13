<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Option;
use App\Base\Thing;
use App\Orders;
use App\Wallet;
use App\HistoryTransaction;
use App\ConstValue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BackendController extends Controller
{
    public function dashboard()
    {
        $exchange_rate = Option::get('exchange_rate');
        $is_admin = Auth::user()->can('edit-order') && Auth::user()->can('edit-history-transaction');
        // lay ra order va complain order
        if ($is_admin) {
            $order = Orders::where('deleted_at', null)->get();
        } else {
            $order = Orders::where('deleted_at', null)->where('customer_id', Auth::user()->id)->get();
        }
        $order_number = $order->count();
        $complain_status = ConstValue::ORDER_STATUS_ID_11;
        $complain_order_number = $order->filter(function($item) use ($complain_status) {
            return $item->status_id == $complain_status;
        })->count();
        //lay ra tong so giao dich va so tien giao dich trong thang
        $this_month = date('Y-m');
        if ($is_admin) {
            $history_transaction = HistoryTransaction::whereRaw("DATE_FORMAT(created_at, '%Y-%m') = '{$this_month}'")->orderBy('created_at', 'DESC')->get();
        } else {
            $history_transaction = HistoryTransaction::whereRaw("DATE_FORMAT(created_at, '%Y-%m') = '{$this_month}'")->where('customer_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        }
        $total_transaction_in_month = $history_transaction->count();
        $total_money_in_month = $history_transaction->map(function ($item) {
                return $item->transaction_price;
            })->sum();
        $session = session('api-token');
        $user_id = Auth::user()->id;
        $history_transactions = $history_transaction->take(10);
        return view('backend.dashboard')->with([
            'exchange_rate' => $exchange_rate,
            'complain_order_number' => $complain_order_number,
            'order_number' => $order_number,
            'total_transaction_in_month' => $total_transaction_in_month,
            'total_money_in_month' => $total_money_in_month,
            'history_transactions' => $history_transactions,
            'is_admin' => $is_admin,
            'session_api' => $session,
            'user_id' => $user_id
        ]);
    }

    public function test()
    {
        return 'test';
    }
}
