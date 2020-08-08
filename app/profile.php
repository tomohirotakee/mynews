<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $guarded = array ('id');
    
    public static $rules = array(
        'name' => 'recuired',
        'gender' => 'recuired',
        'hoby' => 'recuired',
        'introduction' => 'recuired',
    );
    
}
