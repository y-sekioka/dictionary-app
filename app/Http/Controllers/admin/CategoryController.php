<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Dictionary_category;
use App\Main_category;
use App\Sub_category;

class CategoryController extends Controller
{
    public function get_dictionary()
        {
            $user_id = Auth::id();
            $posts = Dictionary_category::where('user_id',"$user_id")->get();
            return view('admin/category/dictionary',['posts'=> $posts]);
        }
    public function dictionary(Request $request)
        {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            $dictionary_category = new Dictionary_category();
            $dictionary_category->id = Dictionary_category::max('id')+1;
            $dictionary_category->name = $validatedData['name'];
            $dictionary_category->user_id = Auth::id();
            $dictionary_category->save();
            return redirect('admin/category/dictionary');
        }
    public function get_main_category()
        {
            $user_id = Auth::id();
            $my_dictionary_id = Dictionary_category::where('user_id',"$user_id")->pluck('id');
            //ログイン中のユーザーが登録したDictionaryのIDを抽出。
            $posts = Main_category::where('dictionary_id', $my_dictionary_id)->get();
            //抽出したIDと一致するデータをメインカテゴリテーブルから抽出。
            $dictionary_posts = Dictionary_category::where('user_id', $user_id)->get();
            //ユーザーIDが一致する辞書カテゴリを全て抽出。
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
            $main_category->user_id = Auth::id();
            $main_category->save();
            return redirect('admin/category/main_category');
        }
    public function get_sub_category()
        {
            $user_id = Auth::id();
            $my_dictionary_id = Dictionary_category::where('user_id','=', $user_id)->pluck('id');
            //ログイン中のユーザーが登録したDictionaryのIDを抽出。
            $main_id = Main_category::where('dictionary_id', '=', $my_dictionary_id)->pluck('id');
            //抽出したIDと一致するデータのIDをメインカテゴリテーブルから抽出。
            $posts = Sub_category::where('main_category_id', '=', $main_id)->get();
            //ログイン中のユーザーが登録したメインカテゴリのIDと一致するサブカテゴリを抽出。
            $main_posts = Main_category::where('dictionary_id', '=', $my_dictionary_id)->get();
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
            $sub_category->user_id = Auth::id();
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
