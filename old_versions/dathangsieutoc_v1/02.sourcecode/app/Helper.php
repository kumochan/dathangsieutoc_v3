<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\User;

class Helper
{
    /**
     * Lấy ra đường dẫn hiện thời
     * @param bool $noSlash Chứa dấu gạch chéo ở đầu hay không
     * @return mixed
     */
    public static function currentRoutePrefix($noSlash = false)
    {
        if (Route::current() != null)
            $temp = Str::lower(explode('/', Route::current()->uri)[0]);
        else
            $temp = '';
        switch ($temp) {
            case env('BACKEND_ALIAS'):
                $temp = env('BACKEND_ALIAS');
                break;
            case 'api':
                $temp = $temp;
                break;
            default:
                $temp = '';
                break;
        }
        if ($noSlash) {
            return $temp;
        } else {
            return '/' . $temp;
        }
    }

    /**
     * Lấy ra ngôn ngữ hiện thời đang dùng
     */
    public static function currentLocale()
    {
        // Nếu có trong session thì trả ra
        if (session()->has('locale')) {
            return session('locale');
        }

        // Chưa có thì lưu vào session
        session(['locale' => Option::get('locale_default')]);
        return session('locale');
    }

    /**
     * Danh sách ngôn ngữ đang hỗ trợ
     */
    public static function localeList()
    {
        return Option::get('locale_list');
    }

    /**
     * Trả ra 0 nếu là locale mặc định và 1 là locale khác (ảnh hưởng đến thứ tự của url segments)
     * @return int
     */
    public static function slugIndex()
    {
        return app()->getLocale() == env('LOCALE_DEFAULT') ? 0 : 1;
    }


    public static function getNews($number, $hot = 1)
    {
        $hot_or_not = sprintf('"hot":"%s"', $hot);
        $news = News::where('status', 'publish')->where('type', 'news')->where('metadata', 'like', "%{$hot_or_not}%")->limit($number)->get();
        if (empty($news)) {
            $news = News::where('status', 'publish')->where('type', 'news')->limit($number)->get();
        }
        return $news;
    }

    /**
     * @param $number số lượng bài viết muốn lấy
     * @param string $category lấy theo category
     * @param int $hot lấy bài viết hot [1: bài viết hot], [2: tất cả bài viết], [0: bài viết không hot]
     * @param int $paginate phân trang hay không và số lượng bản ghi
     * @return \Illuminate\Support\Collection
     */
    public static function getNewsByCategory($number = 0, $category = '', $hot = 1, $paginate = 0)
    {
        $hot_or_not = sprintf('"hot":"%s"', $hot);
        $news = DB::table('things')
            ->selectRaw('things.*, terms.slug as terms_slug')
            ->leftJoin('terms_things', 'terms_things.thing_id', 'things.id')
            ->leftJoin('terms', 'terms_things.term_id', 'terms.id')
            ->where('terms.slug', 'like', "%{$category}%")
            ->where('things.status', 'publish')->where('things.type', 'news');
        if ($hot != 2) {
            $news = $news->where('things.metadata', 'like', "%{$hot_or_not}%");
        }
        $news = $news->orderBy('things.created_at', 'desc');
        if ($number) {
            $news = $news->limit($number);
        }
        if ($paginate) {
            $news = $news->paginate($paginate);
            $news->getCollection()->each(function ($item) {
                $item->user = User::where('id', $item->author)->first();
                return $item;
            });
        } else {
            $news = $news->get();
        }
        return $news;
    }

    public static function getCategoryByNewsId($id)
    {
        $category = DB::table('things')
            ->leftJoin('terms_things', 'terms_things.thing_id', 'things.id')
            ->leftJoin('terms', 'terms_things.term_id', 'terms.id')
            ->where('things.id', $id)
            ->pluck('terms.name')
            ->first();
        return $category;
    }

    /**
    * $user_name có dạng username(email@xx.com)
    * return $user_id 
    **/
    public static function regexUserEmail($user_name) {
        $regexString = '/\(([^)]+)\)/';
        preg_match($regexString, $user_name, $matches);
        $user_email = $matches[1];
        $user = User::where('email', $user_email)->first();
        $user_id = 0;
        if ($user) {
            $user_id = $user->id;
        }
        return $user_id;
    }
}