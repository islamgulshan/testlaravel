<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'photo_id', 
        'category_id',
        'title',
        'body',

    ]; 

    public function user(){
    	return $this->belongsTo('App\User');
    }

     public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function photo(){
    	return $this->belongsTo('App\Photo');
    }

    public function category(){
    	return $this->belongsTo('App\Category');
    }


    //
}
