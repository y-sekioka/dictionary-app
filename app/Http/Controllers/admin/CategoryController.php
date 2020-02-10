<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dictionary_category;
use App\Main_category;
use App\Sub_category;

class CategoryController extends Controller
{
    public function get_dictionary()
        {
            $posts = Dictionary_category::all();
            return view('admin/category/dictionary_category',['posts'=> $posts]);
        }
    public function dictionary(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $dictionary_category = new Dictionary_category();
            $dictionary_category->id = Dictionary_category::max('id')+1;
            $dictionary_category->name = $validatedData['name'];
            $dictionary_category->save();
            return redirect('admin/category/dictionary');
        }
    public function get_main_category()
        {
            $posts = Main_category::all();
            $dictionary_posts = Dictionary_category::all();
            return view('admin/category/main_category',['posts'=> $posts, 'dictionary_posts'=> $dictionary_posts]);
        }
    public function main_category(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'dictionary_id' => 'required',
            ]);
            $main_category = new Main_category();
            $main_category->id = Main_category::max('id')+1;
            $main_category->name = $validatedData['name'];
            $main_category->dictionary_id = $validatedData['dictionary_id'];
            $main_category->save();
            return redirect('admin/category/main_category');
        }
    public function get_sub_category()
        {
            $posts = Sub_category::all();
            $main_posts = Main_category::all();
            return view('admin/category/sub_category',['posts'=> $posts, 'main_posts'=> $main_posts]);
        }
    public function sub_category(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
                'main_category_id' => 'required',
            ]);
            $sub_category = new Sub_category();
            $sub_category->id = Sub_category::max('id')+1;
            $sub_category->name = $validatedData['name'];
            $sub_category->main_category_id = $validatedData['main_category_id'];
            $sub_category->save();
            return redirect('admin/category/sub_category');
        }
    public function dictionary_delete(Request $request)
        {
            $dictionary_category = Dictionary_category::find($request->id);
            $items = Dictionary_category::where('id', '>', $request->id)->get();
            $dictionary_category->delete();
            foreach($items as $item) {
                $item->id -= 1;
                $item->save();
            }
            return redirect('admin/category/dictionary');
        }
    public function main_category_delete(Request $request)
        {
            $main_category = Main_category::find($request->id);
            $items = Main_category::where('id', '>', $request->id)->get();
            $main_category->delete();
            foreach($items as $item) {
                $item->id -= 1;
                $item->save();
            }
            return redirect('admin/category/main_category');
        }
    public function sub_category_delete(Request $request)
        {
            $sub_category = Sub_category::find($request->id);
            $sub_category->delete();
            return redirect('admin/category/sub_category');
        }
}
