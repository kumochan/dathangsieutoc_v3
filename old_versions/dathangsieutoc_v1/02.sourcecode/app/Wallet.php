<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wallet extends Model
{
    protected $table = 'wallet';
    public static function getCurrentBalance() {
        $currentWallet = self::where('customer_id', Auth::user()->id)->first();
        return $currentWallet->balance;
    }
}
