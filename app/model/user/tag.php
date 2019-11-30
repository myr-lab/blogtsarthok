<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    //
    protected $guarded = [];


    public function posts(){
    	return $this->belongsToMany('App\model\user\post','post_tags')->paginate(5);
    }

    public function getRouteKeyName(){ ///Fer getting slug wise data then go to postController

    	return 'slug';

    }
}
