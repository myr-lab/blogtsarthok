<?php

namespace App\model\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded = [];
    // protected $fillable = ['title','subtitle','slug','body'];



    public function tags(){
    	return $this->belongsToMany('App\model\user\tag', 'post_tags');
    }


    public function categories(){
    	return $this->belongsToMany('App\model\user\category', 'category_posts');
    }

    public function getRouteKeyName(){ ///Fer getting slug wise data then go to postController

    	return 'slug';

    }


}
