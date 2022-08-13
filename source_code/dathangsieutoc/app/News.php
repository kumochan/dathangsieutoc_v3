<?php

namespace App;

use App\Base\Thing;

class News extends Thing
{
    protected $table = 'things';
    protected $hidden = array('pivot');

    public function categories()
    {
        return $this->belongsToMany(NewsCategory::class, 'terms_things', 'thing_id', 'term_id');
    }

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($locale = '', $hasRoot = true, $type = 'news')
    {
        return parent::orphanList($locale, $hasRoot, $type);
    }

    public static function orphanListNewsEdit($locale = '', $hasRoot = true, $type = 'news', $id = 0)
    {
        return parent::orphanListEdit($locale, $hasRoot, $type, $id);
    }

    public static function pagedList($locale = 'vi', $type = 'news', $search = false, $offset = 0, $limit = 10)
    {
        return parent::pagedList($locale, $type, $search, $offset, $limit);
    }

    public static function tags($id = 0)
    {
        $news = News::findOrFail($id);
        $metadata = json_decode($news->metadata);
        $news->tags = $metadata->tags;
        return $news->tags;
    }

    public static function tags_place($id = 0)
    {
        $news = News::findOrFail($id);
        $metadata = json_decode($news->metadata);
        $news = $metadata->tags_place;
        return $news;
    }


}
