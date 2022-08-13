<?php

namespace App\Base;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thing extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function terms()
    {
        return $this->belongsToMany(Term::class, 'terms_things');
    }

    public static function list($locale,
                                $type = ['news', 'event', 'project', 'page', 'blog'],
                                $status = ['pending', 'publish'],
                                $orderBy = 'created_at',
                                $orderDirection = 'desc',
                                $search = '')
    {
        $list = Thing::where('locale', $locale)
            ->whereIn('type', $type)
            ->whereIn('status', $status)
            ->where('title', 'like', '%' . $search . '%')
            ->orderBy($orderBy, $orderDirection)
            ->get();
        return $list;
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
        $list = Thing::where('type', $type)
            ->where('locale', $locale)
            ->where('title', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $list;
    }

    public static function count($locale, $type, $search)
    {
        $count = Thing::where('type', $type)
            ->where('locale', $locale)
            ->where('title', 'like', '%' . $search . '%')
            ->count();
        return $count;
    }

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type)
    {
        $retList = collect();
        if ($hasRoot) {
            $root = new Thing();
            $root->id = 0;
            $root->title = '----------';
            $retList->put($root->id, $root);
        }

        $list = Thing::where([
            ['type', $type],
            ['locale_source_id', 0],
            ['locale', '!=', $locale == '' ? session('locale') : $locale],
        ])->whereNotIn('id', function ($query) {
            $query->select('locale_source_id')->from('things');
        })->get();

        foreach ($list as $item) {
            $retList->put($item->id, $item);
        }

        return $retList;
    }


    /**
     * Lấy danh sách menu
     */
    public static function getMenus($parent_id = 0, $hasRoot = true)
    {
        $list = DB::table('things')
            ->selectRaw('things.id,
                things.type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                terms.name,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.type', 'menu_item'],
                ['things.parent_id', $parent_id],
                ['terms.type', 'frontend_menu'],
            ])
            ->get();

        if ($hasRoot) {
            $menu = new Thing();
            $menu->id = 0;
            $menu->title = "----------";
            $list->push($menu);
        }
        return $list->sortBy('id');
    }


    /**
     * @return mixed
     */
    public static function getViewTermsThings()
    {
        $list = DB::table('things')
            ->selectRaw('things.id,
                things.type,
                things.created_at,
                things.updated_at,
                things.title,
                things.locale,
                things.slug as things_slug,
                things.featured_img,
                things.metadata,
                things.parent_id,
                terms.name,
                terms.slug,
                terms.type')
            ->join('terms_things', 'terms_things.thing_id', '=', 'things.id')
            ->join('terms', 'terms.id', '=', 'terms_things.term_id')
            ->where([
                ['things.locale', session('locale')],
                ['things.type', 'menu_item'],
            ])
            ->get();
        return $list->sortBy('id');;
    }

    /**
     * lay danh sach con cua 1 menu theo id
     */
    public static function getChilds($id)
    {
        //dd(self::getViewTermsThings()->where('id', $id));
        return self::getViewTermsThings()->where('id', $id);
    }


}
