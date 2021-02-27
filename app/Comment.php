<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
        'post_id',
        'is_active', 
        'auther',
        'photo',
        'email',
        'body',

    ];


    public function reply(){
    	  return $this->hasMany('App\CommentReply');
    } 

    public function post(){
    	  return $this->belongsTo('App\Post');	
    }

    //
}
