<?php

namespace App\Http\Controllers;
use App\Helper;
use App\Option;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $option = new \stdClass();
        $option->service_fee = Option::getOptionWithoutCache('service_fee');
        $option->transport_fee = Option::getOptionWithoutCache('transport_fee');
        $option->deposit_fee = Option::getOptionWithoutCache('deposit_fee');
        $shopping_guide = Helper::getNewsByCategory(4, 'huong-dan-mua-hang');
        return view('frontend.index', compact('shopping_guide', 'option'));
    }
}
