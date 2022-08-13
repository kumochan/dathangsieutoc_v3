<?php

namespace App\Http\Controllers;

use App\Base\Thing;
use App\Helper;
use App\User;

class GuideController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = Helper::getNewsByCategory(0, 'huong-dan-mua-hang', 2, 5);
        $recent_news = Thing::where('type', 'news')
            ->where('status', 'publish')
            ->limit(5)
            ->orderBy('created_at', 'DESC')
            ->get();
        return view('frontend.guide.guide', compact('news', 'recent_news'));
    }

    public function detail($slug)
    {
        try {
            $news = Thing::where('slug', "$slug")->where('status', 'publish')->first();
            $news->user = User::where('id', $news->author)->first();
            $metadata = json_decode($news->metadata);
            if (is_array($metadata->tags) && !empty(array_filter($metadata->tags))) {
                $news->tags = array_filter($metadata->tags);
            }
            $recent_news = Thing::where('type', 'news')
                ->where('status', 'publish')
                ->limit(5)
                ->orderBy('created_at', 'DESC')
                ->get();
        } catch (\Exception $e) {
            return abort(404);
        }
        $next_news_slug = Thing::where('id', $news->id + 1)->where('type', 'news')->where('status', 'publish')->pluck('slug')->first();
        $previous_news_slug = Thing::where('id', $news->id - 1)->where('type', 'news')->where('status', 'publish')->pluck('slug')->first();
        return view('frontend.guide.detail', compact('news', 'recent_news', 'next_news_slug', 'previous_news_slug'));
    }
}
