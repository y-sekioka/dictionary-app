<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Word;
use App\Dictionary_category;
use App\Main_category;
use App\Sub_category;
class WordController extends Controller
{
    public function add()
        {
            $user_id = Auth::id();
            //$main_categories = Main_category::where('user_id',"$user_id")->get();
            $main_categories = Main_category::all();
            $sub_categories = Sub_category::all();
            return view('admin.word.create', ['main_categories' => $main_categories,'sub_categories' => $sub_categories,]);
        }
    public function create(Request $request)
        {
            $this->validate($request, Word::$rules);
            $word = new Word;
            $form = $request->all();
            unset($form['_token']);
            $word->fill($form);
            $word->save();
            return redirect('admin/word/create')->with('flash_message','投稿が完了しました');
        }
    public function json(Request $request)
        {
            $json1= $request->all(); //選択したメインカテゴリのID
            $select_sub_categories = Sub_category::where('main_category_id',$json1)->get();
            return $select_sub_categories;
        }
    public function edit(Request $request)
        {
            $word = Word::find($request->id);
            $main_categories = Main_category::all();
            $sub_categories = Sub_category::all();
            if (empty($word)) 
                {
                    abort(404);
                }
            return view('admin.word.edit', ['word_form' => $word,'main_categories'=>$main_categories,'sub_categories'=>$sub_categories]);
        }
    public function update(Request $request)
        {
            $this->validate($request, Word::$rules);
            $word = Word::find($request->id);
            // 送信されてきたフォームデータを格納する
            $word_form = $request->all();
            unset($word_form['_token']);
            // 該当するデータを上書きして保存する
            $word->fill($word_form)->save();
      
            return redirect('admin/word/hyper_index')->with('flash_message','編集が完了しました');
        }
    public function delete(Request $request)
        {
            $word = Word::find($request->id);
            $word->delete();
            return redirect('admin/word/create');
        }
    public function index(Request $request)
        {
            $cond_title = $request->cond_title;
            if ($cond_title != '')
                {
                    $posts = Word::where('word', 'like', "%$cond_title%")->get();
                }
            else
                {
                    $posts = Word::all();
                }
            return view('admin.word.hyper_index', ['posts' => $posts, 'cond_title' => $cond_title]);
        }
    public function php_index(Request $request)
        {
            $cond_title = $request->cond_title;
            if ($cond_title != '')
                {
                    $posts = Word::where('word', 'like', "%$cond_title%")->get();
                }
            else
                {
                    $posts = Word::where('type2','3')->get();
                }
            return view('admin.word.php_index', ['posts' => $posts, 'cond_title' => $cond_title]);
        }
    public function seo_index(Request $request)
    {
        $cond_title = $request->cond_title;
        if ($cond_title != '')
            {
                $posts = Word::where('word', 'like', "%$cond_title%")->get();
            }
        else
            {
                $posts = Word::where('type','2')->get();
            }
        return view('admin.word.seo_index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    public function top() //get_top_page
        {
            $user_id = Auth::id();
            $posts = Dictionary_category::where('user_id',"$user_id")->get();
            return view('admin.top.home', ['posts'=> $posts]);
        }
    //public function second() //get_second_page
        //{
            //$posts = Main_category::where("dictionary_id","1")->get();
            //return view('admin.secondLayer.ITdic', ['posts'=> $posts]);
        //}
    public function main_category_master(Request $request) //second_page to third_page link
    //「プログラミング言語」等、親カテゴリをクリックしたタイミングで発動
        {
            $data = $request->all();
            $data_name = $request->input('name');
            $data_id = $request->id;
            $dictionary_id = $request->dictionary_id;//navbar用
            $dictionary_name = $request->dictionary_name;//navbar用
            $posts = Sub_category::where("main_category_id","$data_id")->get();
            return view('admin.thirdLayer.index_2',['posts'=>$posts,'data'=> $data,'data_name'=>$data_name,'data_id'=>$data_id,'dictionary_id'=>$dictionary_id,'dictionary_name'=>$dictionary_name]);
        }
    public function dictionary_master(Request $request) //top_page to second_page link
    //「○○辞書」をクリックしたタイミングで発動
        {
            $data = $request->all();
            $data_name = $request->input('name');
            $data_id = $request->id;
            $posts = Main_category::where("dictionary_id","$data_id")->get();
            return view('admin.secondLayer.dictionary', ['data'=>$data,'data_id'=>$data_id, 'data_name'=>$data_name,'posts'=>$posts]);
        }
    public function index_master(Request $request)
    //「PHP言語」等、子カテゴリをクリックしたタイミングで発動
        {
            $data = $request->all();
            $data_name = $request->input('name');
            $data_id = $request->id;
            $type2_id = Sub_category::where("id","$data_id")->first()->id;
            $dictionary_id = $request->dictionary_id;
            $dictionary_name = $request->dictionary_name;
            $posts = Word::where("type2","$type2_id")->get();
            return view('admin.word.index',['data'=>$data,'type2_id'=>$type2_id,'data_name'=>$data_name,'data_id'=>$data_id,'dictionary_id'=>$dictionary_id,'dictionary_name'=>$dictionary_name,'posts'=>$posts]);
        }
    //それぞれのページのnavbarから一つ上に戻るアクションを以下に記載。
    public function index_to_main(Request $request)
        {
            $page_id = $request->id;
            $posts = Sub_category::where("main_category_id","$page_id")->get();
            return view('admin.thirdLayer.index_2',['posts'=>$posts]);
        }
    public function test_date(){
        return view('admin.TEST_folder.test');
    }
}
