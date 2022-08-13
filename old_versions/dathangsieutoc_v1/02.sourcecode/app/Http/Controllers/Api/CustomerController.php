<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends ApiController
{
    //
    public function grid( Request $request){
        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $customer = Customer::pagedList($search,$offset,$limit);
        $totalRow = Customer::count($search);
        $jsonData =array(
            'total' =>$totalRow,
            'rows'=>$customer
        );
        $result =json_encode($jsonData);
        return $result;
    }
    
    public function delete($id){
        return 1;
    }
}
