<?php

use Illuminate\Database\Seeder;
use App\HistoryTransaction;
class HistoryTransactionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trans = new HistoryTransaction();
        $trans->transaction_code = 52521052;
        $trans->transaction_status_name = 'Nạp Tiền';
        $trans->transaction_status_id = 1;
        $trans->transaction_price = 500000;
        $trans->last_balance = 500000;
        $trans->note = 'CK TECH';
        $trans->order_id = 0;
        $trans->customer_id = 1;
        $trans->save();

        $trans = new HistoryTransaction();
        $trans->transaction_code = 52521052;
        $trans->transaction_status_name = 'Nạp Tiền';
        $trans->transaction_status_id = 1;
        $trans->transaction_price = 500000;
        $trans->last_balance = 500000;
        $trans->note = 'CK TECH';
        $trans->order_id = 0;
        $trans->customer_id = 1;
        $trans->save();

        $trans = new HistoryTransaction();
        $trans->transaction_code = 52521053;
        $trans->transaction_status_name = 'Tất toán đơn hàng';
        $trans->transaction_status_id = 3;
        $trans->transaction_price = 300000;
        $trans->last_balance = 200000;
        $trans->note = 'CK TECH';
        $trans->order_id = 1;
        $trans->customer_id = 1;
        $trans->save();


        $trans = new HistoryTransaction();
        $trans->transaction_code = 52521054;
        $trans->transaction_status_name = 'Nạp Tiền';
        $trans->transaction_status_id = 1;
        $trans->transaction_price = 750000;
        $trans->last_balance = 950000;
        $trans->note = 'CK TECH';
        $trans->order_id = 0;
        $trans->customer_id = 1;
        $trans->save();

        $trans = new HistoryTransaction();
        $trans->transaction_code = 52521055;
        $trans->transaction_status_name = 'Rút Tiền';
        $trans->transaction_status_id = 2;
        $trans->transaction_price = 500000;
        $trans->last_balance = 450000;
        $trans->note = 'Rút tiền về tài khoản ngân hàng';
        $trans->order_id = 0;
        $trans->customer_id = 1;
        $trans->save();
    }
}
