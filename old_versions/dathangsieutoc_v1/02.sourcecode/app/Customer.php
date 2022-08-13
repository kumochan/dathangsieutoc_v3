<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Customer extends Model
{
    //
    public $timestamps = false;
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

//    public function customer()
//    {
//        return $this->hasMany(Product::class, 'product');
//    }
    public static function pagedList($search, $offset, $limit)
    {
        $list =$list = DB::table('customer')->where('customer_name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function count($search)
    {
        $count = Customer::where('customer_name', 'like', '%' . $search . '%')->orWhere('phone', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }
}
