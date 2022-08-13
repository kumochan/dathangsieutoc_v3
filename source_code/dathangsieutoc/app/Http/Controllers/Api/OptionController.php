<?php

namespace App\Http\Controllers\Api;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends ApiController
{

    /**
     * Lấy tỉ giá hiện thời
     * @param Request $request
     * @return \Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|null
     */
    public function getExchangeRate(Request $request)
    {
        return Option::get('exchange_rate');
    }
}
