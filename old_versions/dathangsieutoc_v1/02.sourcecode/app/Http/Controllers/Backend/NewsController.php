<?php

namespace App\Http\Controllers\Backend;

use App\News;
use App\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends ThingController
{
    /**
     * Trang chủ
     */
    public function index()
    {
        return view('backend.news.index');
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showAddForm()
    {
        return view('backend.news.add');
    }

    /**
     * Thêm mới
     */
    public function add(Request $request)
    {
        $news = new News();
        $news->title = $request->input('title');
        $news->slug = $request->input('slug'). '-' .date('YmdHis');
        $news->featured_img = $request->input('featured_img');
        $news->excerpt = $request->input('excerpt');
        $news->content = $request->input('content');
        $news->type = 'news';
        $news->author = Auth::user()->id;
        $news->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $news->locale = session('locale');
        $news->locale_source_id = 0; //id cua ban dich (da ngon ngu)

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $hot = $request->input('hot') == "on" ? '1' : '0';
        $metadata = ['tags' => $tags, 'hot' => $hot];
        $news->metadata = json_encode($metadata);

        $categories = (array)json_decode($request->input('categories'), true);
        $cates = collect();
        foreach ($categories as $item) {
            $tmp = new NewsCategory();
            $tmp->term_id = $item['id'];
            $cates->push($tmp);
        }

        if ($news->save()) {
            if ($news->locale_source_id != 0) {
                $locale_source_id = $news->locale_source_id;
                $samenews = News::find($locale_source_id);
                $samenews->locale_source_id = $news->id;
                $samenews->update();
            }
            $news->categories()->attach($cates);
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Hiển thị trang thêm mới
     */
    public function showEditForm($id = 0)
    {
        $news = News::with('categories:id')->find($id);
        if (!$news) {
            return redirect()->action('Backend\NewsController@index');
        }
        $metadata = json_decode($news->metadata);
        $news->tags = implode(',', $metadata->tags);
        $news->hot = $metadata->hot;
        $news->categories = json_encode($news->getRelation('categories'));
        // dd($news);
        return view('backend.news.edit')->with('thing', $news);

    }

    /**
     * Cập nhật
     */
    public function edit(Request $request)
    {
        $news = News::find($request->input('id'));
        $news->categories()->detach();

        $news->title = $request->input('title');
        $news->slug = $request->input('slug');
        $news->featured_img = $request->input('featured_img');
        $news->excerpt = $request->input('excerpt');
        $news->content = $request->input('content');
        $news->status = $request->input('status') == "on" ? 'publish' : 'pending';
        $news->locale_source_id = $request->input('locale_source_id');

        $tags = array_map('trim', explode(',', $request->input('tags')));
        $hot = $request->input('hot') == "on" ? '1' : '0';
        $metadata = ['tags' => $tags, 'hot' => $hot];
        $news->metadata = json_encode($metadata);
        //  dd($news->metadata);
        $categories = (array)json_decode($request->input('categories'), true);
        $newCates = collect();
        foreach ($categories as $item) {
            $tmp = new NewsCategory();
            $tmp->term_id = $item['id'];
            $newCates->push($tmp);
        }

        if ($news->save()) {
            if ($news->locale_source_id != 0) {
                $locale_source_id = $news->locale_source_id;
                $samenews = News::find($locale_source_id);
                $samenews->locale_source_id = $news->id;
                $samenews->update();
            }
            $news->categories()->attach($newCates);
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }


    public function deleteNew($id)
    {
        $news = News::find($id);
        // dd($news);
        if ($news->delete()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Trang chuyên mục + form thêm mới chuyên mục
     */
    public function category($id = 0)
    {
        $term = new NewsCategory();
        $term->id = 0;
        $term->parent_id = 0;
        $term->locale_source_id = 0;
        return view('backend.news.category')->with('term', $term);
    }

    /**
     * Hiển thị form edit
     */
    public function showEditCategoryForm($id = 0)
    {
        $term = NewsCategory::find($id);
        if (!$term) {
            return redirect()->action('Backend\NewsController@category');
        }
        return view('backend.news.category')->with('term', $term);
    }

    /**
     * Thêm mới category
     */
    public function addCategory(Request $request)
    {
        $newsCate = new NewsCategory();
        $newsCate->name = $request->input('name');
        $newsCate->slug = $request->input('slug');
        $newsCate->type = 'news_category';
        $newsCate->parent_id = $request->input('parent_id');
        $newsCate->status = 'publish';
        $newsCate->locale = session('locale');
        $newsCate->locale_source_id = 0; //id cua ban dich (da ngon ngu)
        if ($newsCate->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Cập nhật category
     */
    public function editCategory(Request $request)
    {
        $newsCate = NewsCategory::find($request->id);
        $newsCate->name = $request->input('name');
        $newsCate->slug = $request->input('slug');
        $newsCate->parent_id = $request->input('parent_id');
        $newsCate->locale_source_id = $request->input('locale_source_id');
        if ($newsCate->save()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }

    /**
     * Xóa category
     */
    public function deleteCategory($id)
    {
        $newsCate = NewsCategory::find($id);
        if ($newsCate->delete()) {
            return back()->with('success', trans('backend/common.success'))->withInput();
        } else {
            return back()->with('error', trans('backend/common.error'))->withInput();
        }
    }
}
