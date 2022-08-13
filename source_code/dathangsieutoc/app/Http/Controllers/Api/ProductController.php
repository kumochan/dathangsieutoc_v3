<?php

namespace App\Http\Controllers\Api;

//use App\Base\Thing;
use App\Product;
//use App\NewsCategory;
use Illuminate\Http\Request;

class ProductController extends ThingController
{
    //
    public function grid(Request $request)
    {

        $offset = $request->input('offset');
        $limit = $request->input('limit');
        $search = $request->input('search');
        $news = Product::pagedList(session('locale'), 'product', $search, $offset, $limit);
        foreach ($news as $item ) {
            # code...
            $metadata = json_decode($item->metadata);
            if(isset($metadata->link)){
                $item->link = $metadata->link;
            }
            if(isset($metadata->rate)){
                $item->rate = $metadata->rate;
            }
            if(isset($metadata->weight)){
                $item->weight = $metadata->weight;
            }
            if(isset($metadata->ship)){
                $item->ship = $metadata->ship;
            }
            if(isset($metadata->shipCN)){
                $item->shipCN = $metadata->shipCN;
            }
        }
        $totalRow = Product::count(session('locale'), 'product', $search);
        $jsonData = array(
            'total' => $totalRow,
            'rows' => $news
        );
        $result = json_encode($jsonData);
        return $result;
    }
    public function delete(Request $request)
        {
            $ids = $request->input('ids');
            DB::table('product')->whereIn('id', $ids)->delete();
            return response()->json(200);
        }
    /**
     * Dữ liệu chuyên mục theo dạng cây với kiểu json => sử dụng để load vào jstree
     */
   
}
