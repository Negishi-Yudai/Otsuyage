<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obento extends Model
{
    protected $guarded = array('id');

    
    public static $rules = array(
        'tennmei' => 'required',
        'gaiyou' => 'required',
        );
}
