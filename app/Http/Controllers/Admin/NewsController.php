<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return News::orderBy('created_at', 'desc')->get();
    }

    public function newsItem($id)
    {
        return News::find($id);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lang' => 'required',
            'text' => 'required',
        ]);

        $newsItem = new News();

        $newsItem->name = $request->name;
        $newsItem->lang = $request->lang;
        $newsItem->text = $request->text;
        $newsItem->gallery = $request->gallery;

        $newsItem->save();
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'lang' => 'required',
            'text' => 'required',
        ]);

        $newsItem = News::find($id);

        $newsItem->name = $request->name;
        $newsItem->lang = $request->lang;
        $newsItem->text = $request->text;
        $newsItem->gallery = $request->gallery;

        $newsItem->save();
    }
}
