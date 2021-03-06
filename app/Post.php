<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
    protected $table = "posts";
    //primary key field
    public $primaryKey = "id";
    //Timestamps
    public $timestamps = true;

    //a post has a relationship with a user and belongs to a user
    public function user(){
        return $this->belongsTo('App\User');
    }
}
