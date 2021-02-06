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
        
    public function comments()
    {
      return $this->hasMany('App\Comment', 'omiyage_or_obento_id')->where('syurui', 'omiyage');

    }    
}
