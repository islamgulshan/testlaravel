<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentReply extends Model
{

	protected $table = "comment_replies";

	protected $fillable = [
        'comment_id',
        'is_active', 
        'auther',
        'photo',
        'email',
        'body',

    ];

    //
}
