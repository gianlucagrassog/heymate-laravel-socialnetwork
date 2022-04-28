<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mvcpost extends Model
{
    protected $table="mvcposts";
    protected $fillable = [
        'user_id','title','url_img', 'description', 'password','service','likes'
    ]; 
    protected $hidden = [
        'user_id',
    ];
   public function user(){
        return $this->belongsTo("App\User");//1--N
    }
    public function users(){
    return $this->belongsToMany("App\User","Mvclikes");
}
}
