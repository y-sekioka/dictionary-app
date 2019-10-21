<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Word;
class WordController extends Controller
{
    public function add()
        {
            $types = config('type');
            return  view('admin.word.create')->with(['types' => $types]);
        }
    public function create(Request $request)
        {
            $this->validate($request, Word::$rules);
            $word = new Word;
            $form = $request->all();
            unset($form['_token']);
            $word->fill($form);
            $word->save();
            return redirect('admin/word/create');
        }
    public function edit(Request $request)
        {
            $word = Word::find($request->id);
            if (empty($word)) 
                {
                    abort(404);
                }
            return view('admin.word.edit', ['word_form' => $word]);
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
      
            return redirect('admin/word/index');
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
                    $posts = Word::where('type2','PHP')->get();
                }
            return view('admin.word.php_index', ['posts' => $posts, 'cond_title' => $cond_title]);
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
    public function second(Request $request)
        {
            return view('admin.secondLayer.ITdic');
        }
}
