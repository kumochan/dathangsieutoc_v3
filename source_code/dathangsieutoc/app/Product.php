<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Customer;
class Product extends Model
{
     protected $table = 'product';
     use SoftDeletes;

    protected $dates = ['deleted_at'];



    public static function getCustomerByID($id)
    {
        $customer = DB::table('customer')->where('customer_id', '=', $id)->pluck('customer_name')->first();
        return $customer;
    }

    /**
     * Danh sách được phân trang
     * @param $type
     * @param $locale
     * @param $search
     * @param $offset
     * @param $limit
     * @return mixed
     */
    public static function pagedList($locale, $type, $search, $offset, $limit)
    {

        $list = DB::table('product')->where('type', $type)
            ->leftJoin('customer','customer.customer_id','=','product.customer_id')
            ->where('locale', $locale)
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')
            ->orWhere('status', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $list;
    }

    public static function count($locale, $type, $search)
    {
        $count = Product::where('type', $type)
            ->where('locale', $locale)
            ->where('name', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }
    /**
    lấy danh sách khách hàng.
     **/
    public static function listCustomer(){
        $customer = DB::table('customer')->get();
        return $customer;
    }
    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type)
    {
        $retList = collect();
        if ($hasRoot) {
            
            $root = new Product();
            $root->id = 0;
            $root->name = '----------';
            $retList->put($root->id, $root);
        }

       

        $list = Product::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['locale', '!=', $locale == '' ? session('locale') : $locale],
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('product');
        })->get();

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }

    public static function orphanListEdit($locale = '', $hasRoot = true, $type,$id=0)
    {
        $retList = collect();
        $news = News::with('categories:id')->find($id);
        $samenews = DB::table('product')->where('locale_source_id',$news->id)->first();
        $samenews2 = DB::table('product')->where('id',$news->locale_source_id)->first();
       // dd($samenews);
        if ($id != 0 && $samenews != null) {
            $root = new Product();
            $root->id = $samenews->id;
            $root->name = $samenews->name;
            $retList->put($root->id, $root);
        }  
        if ($id != 0 && $samenews2 != null) {

            $root = new Product();
            $root->id = $samenews2->id;
            $root->name = $samenews2->name;
            $retList->put($root->id, $root);
        }  
        if ($hasRoot) {
            
            $root = new Product();
            $root->id = 0;
            $root->name = '----------';
            $retList->put($root->id, $root);
        } 

        $list = Product::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['id','!=',$id],
            ['locale', '!=', $locale == '' ? session('locale') : $locale]
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('product');
        })->get();

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }
}
