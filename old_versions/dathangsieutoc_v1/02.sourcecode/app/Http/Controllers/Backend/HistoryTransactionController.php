<?php

namespace App\Http\Controllers\Backend;

use App\Wallet;
use App\User;
use App\HistoryTransaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helper;
Use App\Option;
class HistoryTransactionController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $wallet = Wallet::where('customer_id', $user->id)->first();
        return view('backend.history_transaction.index', compact('wallet'));
    }

    public function adminIndex()
    {
    	$user = Auth::user();
        $wallet = Wallet::selectRaw('sum(deposit) as deposit, sum(withdraw) as withdraw, sum(total_payment) as total_payment, sum(refund) as refund, sum(balance) as balance')->first();
        return view('backend.history_transaction.admin_index', compact('wallet'));
    }

    public function add()
    {
    	return view('backend.history_transaction.add');
    }

    public function store(Request $request)
    {
    	//'transaction_code','transaction_status_id','transaction_status_name','transaction_price','last_balance','note','order_id','customer_id'
    	try {
            DB::beginTransaction();
            $customer_name = $request->input('customer_id');
	        $customer_id = Helper::regexUserEmail($customer_name);
	        $order_id = '';
	        if ($request->input('order_id')) {
	        	$order_id = explode('-', $request->input('order_id'))[2];
	        }
	        $transaction_status_id = $request->input('transaction_status_id');
	        $transaction_status_name = Option::get('history_transaction_status')[$transaction_status_id - 1];
	        $transaction_price = $request->input('transaction_price');
	        if ($transaction_status_id == 2) {
	        	$transaction_price = 0 - $transaction_price;
	        } else {
	        	$transaction_price = 0 + $transaction_price;
	        }
	    	$history_transaction = new HistoryTransaction();
		    $history_transaction->transaction_code = date('Ymdhis');
		    $history_transaction->transaction_status_id = $transaction_status_id;
		    $history_transaction->transaction_status_name = $transaction_status_name;
		    $history_transaction->transaction_price = $transaction_price;
		    $history_transaction->last_balance += $transaction_price;
		    $history_transaction->note = $request->input('note');
		    $history_transaction->order_id = $order_id;
		    $history_transaction->customer_id = $customer_id;
		    if($history_transaction->save()) {
		    	$wallet = Wallet::where('customer_id', $customer_id)->first();
		    	if ($transaction_status_id == 1) {
		    		$Wallet->deposit += $transaction_price;
		    	} elseif ($transaction_status_id == 2) {
		    		$wallet->withdraw += abs($transaction_price);
		    	} elseif ($transaction_status_id == 6) {
		    		$Wallet->refund += $transaction_price;
		    	} else {
		    		$wallet->total_payment += $transaction_price;
		    	}
		    	$wallet->balance += $transaction_price;
		    	$wallet->save();
			    DB::commit();
			}
	    } catch (\Exception $e) {
	        $message = $e->getMessage();
	        DB::rollBack();
	        return back()->with('error', 'Sai mã giao dịch hoặc tên khách hàng'.$message)->withInput();;
	    }
	    return back()->with('success', 'Thành công')->withInput();
    }

    public function getWalletByUserId(Request $request)
    {
        $user_name = $request->input('user_name');
        $user_id = Helper::regexUserEmail($user_name);
        $wallet = Wallet::where('customer_id', $user_id)->first();
        if(is_null($wallet)) {
        	$wallet = new Wallet();
        	$wallet->customer_id = $user_id;
        	$wallet->save();
        }
        return response($wallet->balance);
    }
}
