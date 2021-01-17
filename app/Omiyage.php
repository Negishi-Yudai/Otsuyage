<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Omiyage extends Model
{
     protected $guarded = array('id');

    
    public static $rules = array(
        'tennmei' => 'required',
        'gaiyou' => 'required',
        );
}
