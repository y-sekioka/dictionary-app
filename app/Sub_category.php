<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    protected $table = 'sub_category';
    public static $rules = array(
        'name' => 'required',
        'main_category_id' => 'required',
    );
}
