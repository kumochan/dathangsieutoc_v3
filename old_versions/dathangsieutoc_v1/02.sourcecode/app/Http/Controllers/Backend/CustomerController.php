<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    //
    public function index(){
        return view('backend.customer.index');
    }
    public function getAdd(){
        return view('backend.customer.add');
    }
    public function add(Request $request){

        $customer = new Customer();
        $customer->customer_name= $request->input('name');
        $customer->email= $request->input('email');
        $customer->phone= $request->input('phone');
        $customer->address= $request->input('address');
        if ( $customer->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
    public function getEdit($id){
        $user = Customer::where('customer_id',$id)->first();
       // dd($user);
        return view('backend.customer.edit',compact('user'));
    }
    public function edit(Request $request,$id){
        //dd($id);
        $customer=  Customer::where('customer_id',$id)->first();
      //  dd($customer);
        $customer->customer_name= $request->input('name');
        $customer->email= $request->input('email');
        $customer->phone= $request->input('phone');
        $customer->address= $request->input('address');
        $flg = $customer->update();
        if ( $flg) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        $ids = explode(',', $ids);
       // dd($ids);
        //dd($ids);
        DB::table('customer')->whereIn('customer_id', $ids)->delete();
        // dd($product);
        return response()->json(200);
    }
}
