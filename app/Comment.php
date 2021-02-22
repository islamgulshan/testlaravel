<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
        'post_id',
        'is_active', 
        'auther',
        'email',
        'body',

    ];


    public function reply(){
    	  return $this->hasMany('App\CommentReply');
    } 
    //
}
