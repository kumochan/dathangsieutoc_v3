<?php

use Illuminate\Database\Seeder;
use App\Wallet;
class WalletSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallet = new Wallet();
        $wallet->customer_id = 1;
        $wallet->deposit = 1750000;
        $wallet->withdraw = 500000;
        $wallet->total_payment = 300000;
        $wallet->balance = 950000;
        $wallet->refund = 0;
        $wallet->save();
    }
}
