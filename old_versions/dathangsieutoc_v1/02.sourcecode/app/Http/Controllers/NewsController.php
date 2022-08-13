<?php

namespace App\Http\Controllers;

use App\Base\Term;
use App\Base\Thing;
use App\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        try {
            $news = Thing::where('type', 'news')
                ->where('status', 'publish')
                ->paginate(5);
            $news->getCollection()->each(function ($item) {
                $item->user = User::where('id', $item->author)->first();
                return $item;
            });
            $recent_news = Thing::where('type', 'news')
                ->where('status', 'publish')
                ->limit(5)
                ->orderBy('created_at', 'DESC')
                ->get();
        } catch (\Exception $e) {
            return abort(404);
        }
        return view('frontend.news.news', compact('news', 'recent_news'));
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
            $categories = Term::where('type', 'news_category')->where('status', 'publish')->get();
        } catch (\Exception $e) {
            return abort(404);
        }
        $next_news_slug = Thing::where('id', $news->id + 1)->where('type', 'news')->where('status', 'publish')->pluck('slug')->first();
        $previous_news_slug = Thing::where('id', $news->id - 1)->where('type', 'news')->where('status', 'publish')->pluck('slug')->first();
        return view('frontend.news.detail', compact('news', 'recent_news', 'categories', 'next_news_slug', 'previous_news_slug'));
    }
}
