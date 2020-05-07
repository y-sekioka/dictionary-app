<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Word;
use App\Dictionary_category;
use App\Main_category;
use App\Sub_category;
use App\User;
class UserController extends Controller
{
    //
    public function mypage(){
        $auth = Auth::user();
        return view('admin.user.mypage',[ 'auth' => $auth ]);
    }
    public function edit(){
        $auth = Auth::user();
        return view('admin.user.edit',[ 'auth' => $auth ]);
    }
    public function update(Request $request,$id){
        $form = $request->all();
        $auth = User::find($id);
        unset($form['_token']);
        foreach ($form as $key => $value) {
            // nullの場合更新対象から除外する
            if($value == null) {
            unset($form[$key]);
            }
        }
        $auth->fill($form)->save();
        return redirect('admin/user/mypage');
    }
}