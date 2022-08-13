<?php

namespace App;

use App\Base\Term;

class NewsCategory extends Term
{
    protected $table = 'terms';
    protected $hidden = array('pivot');

    /**
     * Lấy danh sách chưa được dịch
     */
    public static function orphanList($type = 'news_category')
    {
        return parent::orphanList($type);
    }

    /**
     * Lấy ra danh sách theo dạng cây phân cấp
     */
    public static function tree($locale = '', $hasRoot = true, $childNamePrefix = '---', $removeId = 0)
    {
        $tree = collect();
        return parent::buildTree('news_category', $tree, $locale, $hasRoot, $childNamePrefix, $removeId, 0, 0);
    }
}
