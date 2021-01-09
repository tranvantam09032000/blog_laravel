<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Posts extends Model
{
    
    protected $table="posts";
    protected $fillable = ['title','category_id','image',
    'content','slug','users_id','status'];
    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tags');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
