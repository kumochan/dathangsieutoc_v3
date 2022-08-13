<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Wallet;
class HistoryTransaction extends Model
{
    protected $table = 'history_transaction';
    protected $fillable = ['transaction_code','transaction_status_id','transaction_status_name','transaction_price','last_balance','note','order_id','customer_id'];

    public static function pagedList($order_id, $offset, $limit, $from_date, $to_date, $transaction_status_id, $user_id)
    {
        $customer_id = session('current_user')->id;
        $from_date = !empty($from_date) ? strtotime("{$from_date}") : '';
        $to_date = !empty($to_date) ? strtotime("{$to_date}") : '';
        $list = HistoryTransaction::selectRaw('history_transaction.*, history_transaction.note as transaction_note, history_transaction.created_at as transaction_created_at')
            ->offset($offset)
            ->limit($limit)
            ->get();
        if (session('current_user')->cant('edit-history-transaction')) {
            $list = $list->filter(function ($item) use ($customer_id) {
                return $item->customer_id == $customer_id;
            });
        }
        if ($transaction_status_id != '') {
            $transaction_status_id = intval($transaction_status_id);
            $list = $list->filter(function ($item) use ($transaction_status_id) {
                return $item->transaction_status_id == $transaction_status_id;
            });
        }
        if ($order_id != '') {
            $list = $list->filter(function ($item) use ($order_id) {
                return $item->order_id == $order_id;
            });
        }
        if ($user_id) {
            $list = $list->filter(function ($item) use ($user_id) {
                return $item->customer_id == $user_id;
            });
        }
        if ($from_date != '' || $to_date != '') {
            $list = $list->filter(function ($item) use ($from_date, $to_date) {
                if (empty($from_date) && !empty($to_date)) {
                    return strtotime($item->created_at) <= $to_date;
                } else if (!empty($from_date) && empty($to_date)) {
                    return strtotime($item->created_at) >= $from_date;
                } else if (!empty($from_date) && !empty($to_date)) {
                    return strtotime($item->created_at) >= $from_date && strtotime($item->created_at) <= $to_date;
                }
            });
        }
        return $list->values();
    }

    public static function count($order_id, $from_date, $to_date, $transaction_status_id, $user_id)
    {
        $customer_id = session('current_user')->id;
        $from_date = !empty($from_date) ? strtotime("{$from_date}") : '';
        $to_date = !empty($to_date) ? strtotime("{$to_date}") : '';
        $list = HistoryTransaction::selectRaw('history_transaction.*, history_transaction.note as transaction_note, history_transaction.created_at as transaction_created_at')
            ->get();
        if ($transaction_status_id != '') {
            $transaction_status_id = intval($transaction_status_id);
            $list = $list->filter(function ($item) use ($transaction_status_id) {
                return $item->transaction_status_id == $transaction_status_id;
            });
        }
        if (session('current_user')->cant('edit-history-transaction')) {
            $list = $list->filter(function ($item) use ($customer_id) {
                return $item->customer_id == $customer_id;
            });
        }
        if ($order_id != '') {
            $list = $list->filter(function ($item) use ($order_id) {
                return $item->order_id == $order_id;
            });
        }
        if ($user_id) {
            $list = $list->filter(function ($item) use ($user_id) {
                return $item->customer_id == $user_id;
            });
        }
        if ($from_date != '' || $to_date != '') {
            $list = $list->filter(function ($item) use ($from_date, $to_date) {
                if (empty($from_date) && !empty($to_date)) {
                    return strtotime($item->created_at) <= $to_date;
                } else if (!empty($from_date) && empty($to_date)) {
                    return strtotime($item->created_at) >= $from_date;
                } else if (!empty($from_date) && !empty($to_date)) {
                    return strtotime($item->created_at) >= $from_date && strtotime($item->created_at) <= $to_date;
                }
            });
        }
        return count($list);
    }
}
