<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary_category extends Model
{
    protected $guarded = array('id');
    protected $table = 'dictionary_category';
    public static $rules = array(
        'name' => 'required',
    );
}
