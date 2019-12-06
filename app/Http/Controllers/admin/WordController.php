<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Word;
use App\Main_category;
use App\Sub_category;
class WordController extends Controller
{
    public function add()
        {
            $main_categories = Main_category::all();
            $sub_categories = Sub_category::all();
            //$json1 = $request->all();
            //$mainId = $request->mainId;
            //$select_sub_categories = Sub_category::where('main_category_id',$mainId)->get()->toArray();
            //$data = response()->json($select_sub_categories);
            return view('admin.word.create', ['main_categories' => $main_categories,'sub_categories' => $sub_categories,]);//'select_sub_categories'=> $select_sub_categories,'$data'=> $data]);
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
            $json1= $request->all();
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
      
            return redirect('admin/word/index')->with('flash_message','編集が完了しました');
        }
    public function delete(Request $request)
        {
            $word = Word::find($request->id);
            $word->delete();
            return redirect('admin/word/index');
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
            return view('admin.word.index', ['posts' => $posts, 'cond_title' => $cond_title]);
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
    public function top(Request $request)
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
            return view('admin.top.home', ['posts'=> $posts, 'cond_title'=> $cond_title]);
        }
    public function second()
        {
            $posts = Main_category::where('dictionary_id','1')->get();
            return view('admin.secondLayer.ITdic', ['posts'=> $posts]);
        }
    public function index_master(Request $request)
        {
            $data = $request->all();
            return view('admin.word.index_2',['data'=> $data]);
        }
}
