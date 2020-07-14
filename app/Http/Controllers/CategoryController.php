<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    public function showCategories()
    {
        $categories = category::all();

        return view('welcome', compact('categories'));
    }


    public function createCategory()
    {
        return view('CategoryCreate');
    }

    public function editCategory($id)
    {
        $category = category::find($id);

        return view('CategoryUpdate', compact('category'));
    }


    public function patchCategory(Request $request)
    {
        $request->validate([
            'cat_id' => 'required', 'integer',
        ]);
        $category = category::find($request->cat_id);
        $this->updateCat($category, $request);
        return redirect()->action('DashboardController@index');
    }

    public function putCategory(Request $request)
    {
        $category = new category();
        $this->updateCat($category, $request);
        return redirect()->action('DashboardController@index');
    }

   private function updateCat ($category, $request){

       $request->validate([
           'name' => 'required', 'string',
           'description' => 'required', 'string',
       ]);

       if ($request->hasFile('img')) {
           $file = $request->file('img');
           $path = $file->store('public/Categories');
           $category->img = str_replace('public/', 'public/storage/', $path);
       }
       if(isset($request->name))
           $category->name = $request->name;
       if(isset($request->description))
           $category->description = $request->description;
       $category->save();

   }

}
