<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class OptionsController extends Controller
{
    public function index()
    {
        $option = new \stdClass();
        $option->service_fee = Option::getOptionWithoutCache('service_fee');
        $option->transport_fee = Option::getOptionWithoutCache('transport_fee');
        $option->deposit_fee = Option::getOptionWithoutCache('deposit_fee');
        $option->exchange_rate = Option::getOptionWithoutCache('exchange_rate');
        $option->property =  array('service_fee' => 'Phí dịch vụ', 'transport_fee' => 'Phí vận chuyển', 'deposit_fee' => 'Phí kí gửi');
        return view('backend.options.index', compact('option'));
    }

    public function update(Request $request, $key) {
        try {
            DB::beginTransaction();
            $option = Option::where('key', $key)->first();
            if ($key == 'exchange_rate') {
                $option_value = $request->input($key);
            } else {
                $tille = $request->input('title');
                $header = $request->input('header');
                $content = $request->input("{$key}_content");
                $option_value = array('locale' => 'vi', 'title' => $tille, 'header' => $header, 'content' => $content);
                $option_value = json_encode($option_value);
            }
            $option->value = "{$option_value}";
            if ($option->save()) {
                DB::commit();
                return back()->with('success', 'Thành công')->withInput();
            }
        } catch (Exception $e) {
                $e->getMessage();
                DB::rollBack();
                return back()->with('error', 'Gặp lỗi trong quá trình sửa thông tin vui lòng liên hệ với admin')->withInput();
        }
    }
}
