<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\CustomerProduct;
class ProductController extends Controller
{
     public function index()
    {
//        $news = Product::pagedList(session('locale'), 'product', '', 0, 25);
//        foreach ($news as $item ) {
//            # code...
//            $metadata = json_decode($item->metadata);
//            if(isset($metadata->link)){
//            $item->link = $metadata->link;}
//
//            $item->weight = $metadata->weight;
//            if(isset($metadata->ship)){
//            $item->ship = $metadata->ship;}
//            $item->rate = $metadata->rate;
//        }
//        $totalRow = Product::count(session('locale'), 'product', '');
//        $jsonData = array(
//            'total' => $totalRow,
//            'rows' => $news
//        );
//        $result = $jsonData;
//        //dd($result);
//        $a = json_decode( $news[0]->metadata);
////    if(in_array("weight",$a))
////    {
////        dd(1);
////    }
//         dd($a);
        $tigia = DB::table('things')->where('type','tigia')->pluck('excerpt')->first();
        return view('backend.product.index',compact('tigia'));
    }

    public function detail(){
        $tigia = DB::table('things')->where('type','tigia')->pluck('excerpt')->first();
        return view('backend.product.detail',compact('tigia'));
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {

        return view('backend.product.add');
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {

        $news = new Product();
        $news->name = $request->input('name');
        $news->slug = $request->input('slug');
      	$news->price = $request->input('price');
      	$news->number = $request->input('number');
      	$news->content = $request->input('content');
        $news->type = 'product';
        $news->discount = $request->input('discount');
        // lấy data metadata
        $link = $request->input('link');
        $rate = $request->input('rate');
        $ship = $request->input('ship');
        $weight = $request->input('weight');
        $shipCN= $request->input('shipCN');
        //tổng tiền bên trung quốc
        $news->sum = $news->number * $news->price +$shipCN - $news->discount;
        //tổng tiền bên việt nam
        $news->total = $weight*$ship  + $news->sum*$rate;
        $news->author = Auth::user()->id;
        $news->status = $request->input('status');
        $news->locale = session('locale');
        $news->transporters = $request->input('transporters');
        $news->transport_code = $request->input('transport_code');
        $news->customer_id = $request->input('dllCustomer');
    // xử lý metadata
        $metadata = ['link' => $link ,'rate' =>$rate ,'weight'=>$weight ,'ship'=>$ship,'shipCN'=>$shipCN];
        $news->metadata = json_encode($metadata);
    //xử lý customer_product

       // dd($customer_id);

       if ($news->save()) {
          // dd($news->id);
            return back()->with('message', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('message', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showEditForm($id)
    {
//        $customer = DB::table('customer')->where('customer_id', '=', 3)->pluck('customer_name')->first();
//        dd($customer);
        $news = Product::findOrFail($id);
        //dd($news);
        $metadata = $news->metadata;
        $metadata = json_decode($metadata);
        $link = $metadata->link;
        $rate = $metadata->rate;
        if(isset($metadata->link)){
            $news->link = $metadata->link;
        }
        if(isset($metadata->rate)){
            $news->rate = $metadata->rate;
        }
        if(isset($metadata->weight)){
            $news->weight = $metadata->weight;
        }
        if(isset($metadata->ship)){
            $news->ship = $metadata->ship;
        }
        if(isset($metadata->shipCN)){
            $news->shipCN = $metadata->shipCN;
        }
        if (!$news) {
            return redirect()->action('Backend\ProductController@index');
        }
        return view('backend.product.edit')->with('thing', $news);

    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $customer_name = $request->input('customer');

       //dd($request->all());
        $news = Product::findOrFail($request->input('id'));
        $news->name = $request->input('name');
        $news->slug = $request->input('slug');
        $news->price = $request->input('price');
        $news->number = $request->input('number');
        $news->sum = $news->number * $news->price;
        $news->content = $request->input('content');
        $news->type = 'product';
        $news->discount = $request->input('discount');
        $weight = $request->input('weight');
        $ship = $request->input('ship');
        $news->total = $weight*$ship - $news->discount + $news->sum;
        $news->author = Auth::user()->id;
        $news->status = $request->input('status');
        $news->locale = session('locale');
        $news->transporters = $request->input('transporters');
        $news->transport_code = $request->input('transport_code');
        $news->customer_id = $request->input('dllCustomer');
        // xử lý metadata
        $link = $request->input('link');
        $rate = $request->input('rate');
        $totalCN = $news->total*$rate;
        $shipCN= $request->input('shipCN');
        $metadata = ['link' => $link ,'rate' =>$rate ,'weight'=>$weight ,'ship'=>$ship,'shipCN'=>$shipCN,'total'=>$totalCN];
        $news->metadata = json_encode($metadata);
        if ($news->save()){
            return back()->with('message', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('message', trans('backend/common.error'))->withInput();
        }
    }


    public function deleteProduct($id)
    {
        $news = Product::find($id);
        if ($news->delete()) {
            return back()->with('success', trans('backend/common.success'))->withInput();

        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
    public function delete(Request $request){
        $ids = $request->input('ids');
        $ids = explode(',', $ids);

        //dd($ids);
        DB::table('product')->whereIn('id', $ids)->delete();
        return response()->json(200);
       // dd($product);
    }

    /**
     * Trang chuyên mục + form thêm mới chuyên mục
     */
//     public function category($id = 0)
//     {
//         $term = new NewsCategory();
//         $term->id = 0;
//         $term->parent_id = 0;
//         $term->locale_source_id = 0;
//         return view('backend.product.category')->with('term', $term);
//     }

//     /**
//      * Hiển thị form edit
//      */
//     public function showEditCategoryForm($id = 0)
//     {
//         $term = NewsCategory::find($id);
//         if (!$term) {
//             return redirect()->action('Backend\ProductController@category');
//         }
//         return view('backend.product.category')->with('term', $term);
//     }

//     /**
//      * Thêm mới category
//      */
//     public function addCategory(Request $request)
//     {
//         $newsCate = new NewsCategory();
//         $newsCate->name = $request->input('name');
//         $newsCate->slug = $request->input('slug');
//         $newsCate->type = 'news_category';
//         $newsCate->parent_id = $request->input('parent_id');
//         $newsCate->status = 'publish';
//         $newsCate->locale = session('locale');
//         $newsCate->locale_source_id = $request->input('locale_source_id');
//         if ($newsCate->save()) {
//             return back()->with('success', trans('backend/common.success'))->withInput();
//         } else {
//             return back()->with('error', trans('backend/common.error'))->withInput();
//         }
//     }

//     /**
//      * Cập nhật category
//      */
//     public function editCategory(Request $request)
//     {
// //        if ($request->id === 0 && !$request->user()->can('add-news_category')) {
// //            return view('backend.productevent.category')->withErrors(trans('auth.failed'));
// //        }

//         $newsCate = NewsCategory::find($request->id);
//         $newsCate->name = $request->input('name');
//         $newsCate->slug = $request->input('slug');
//         $newsCate->parent_id = $request->input('parent_id');
//         $newsCate->locale_source_id = $request->input('locale_source_id');
//         if ($newsCate->save()) {
//             return back()->with('success', trans('backend/common.success'))->withInput();
//         } else {
//             return back()->with('error', trans('backend/common.error'))->withInput();
//         }
//     }

//     /**
//      * Xóa category
//      */
//     public function deleteCategory($id)
//     {
//         $newsCate = NewsCategory::find($id);
//         if ($newsCate->delete()) {
//             return back()->with('success', trans('backend/common.success'))->withInput();
//         } else {
//             return back()->with('error', trans('backend/common.error'))->withInput();
//         }
//     }
}
