<?php

namespace App\Http\Controllers;

use App\status;
use App\category;
use App\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class NewsController extends Controller
{

    public function showNewsItem($id)
    {
        $newsItem = news::where('id', $id)->with('status')->first();
        $category = category::where('id', $newsItem->category_id)->first();
        $status = status::find($newsItem->status_id);


        return view('showNewsItem', compact('newsItem', 'category', 'status'));
    }


    public function showCatNews($id)
    {
        $news = news::where('category_id', $id)->get();
        $catwgoryName = category::select('name')->find($id)->name;

        return view('showCatNews', compact('news', 'catwgoryName'));
    }



    public function createNews()
    {
        $statuses = status::all();
        $categories = category::all();
        return view('NewsCreate', compact('categories', 'statuses'));
    }

    public function editNews($id)
    {
        $news = news::find($id);
        $statuses = status::all();
        $categories = category::all();
        return view('NewsUpdate', compact('news', 'categories', 'statuses'));
    }


    public function patchNews(Request $request)
    {
        $request->validate([
            'new_id' => 'required', 'integer',
        ]);

        $news = news::find($request->new_id);
        $this->updateNews($news, $request);
        return redirect()->action('DashboardController@index');
    }

    public function putNews(Request $request)
    {
        $news = new news();
        $this->updateNews($news, $request);
        return redirect()->action('DashboardController@index');
    }

    private function updateNews($news, $request) //todo replace from controller
    {
            $request->validate([
                'title' => 'required', 'string',
                'description' => 'required', 'string',
                'text' => 'required', 'string',
                'author_name' => 'required', 'string',
                'category_id' => 'required', 'integer',
                'status' => 'required', 'integer',
            ]);

            if ($request->hasFile('img')) {
                $file = $request->file('img');
                if (!in_array($file->getClientOriginalExtension(), ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'pdf'])) {
                    return route('home');
                }
                $path = $file->store('public/News');
                $news->img = str_replace('public/', 'public/storage/', $path);
            }
            $news->title = $request->title;
            $news->description = $request->description;
            $news->text = $request->text;
            $news->author_name = $request->author_name;
            $news->category_id = $request->category_id;
            $news->status_id = $request->status;
            $news->save();
    }


}
