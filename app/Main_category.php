<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_category extends Model
{
    protected $table = 'main_category';
    public static $rules = array(
        'name' => 'required',
        'dictionary_id' => 'required',
    );
}
