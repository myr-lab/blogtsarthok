<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $guarded = [];

    public function posts(){
    	return $this->belongsToMany('App\model\user\post', 'category_posts')->paginate(5);;
    }

    public function getRouteKeyName(){ ///Fer getting slug wise data then go to postController

    	return 'slug';

    }
}
