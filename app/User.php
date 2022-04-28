<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','username', 'email', 'password','photo','password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',//Carbon
    ];

    //relazioni
    public function post(){
        return $this->hasMany("App\Models\Mvcpost");
        //return $this->hasMany(Post::class); stessa cosa
    }
    public function posts(){
        return $this->belongsToMany("App\Mvcpost","mvclikes");
    }
    public function mvcfollowers_seguito(){
        return $this->belongsToMany("App\User","mvcfollowers", "user_id_seguito","user_id_follower");
    }
    public function mvcfollowers_follower(){
        return $this->belongsToMany("App\User","mvcfollowers", "user_id_follower","user_id_seguito");
    }
    


    public function setPhotoAttribute($value){
        $path=Storage::disk("public")->put("userimage",$value);
        $this->attributes["photo"] = $path;
    }
    public function getFullNameAttribute(){
        return "$this->name  $this->surname";
    }
    public function getPhotoAttribute($value){
        return $value ? Storage::disk("public")->url($value) : asset("images\default.png");
    }


     public function scopeNotme($query)
    {
        return $query->where('users.username', '<>', $user->username);
    }
}
