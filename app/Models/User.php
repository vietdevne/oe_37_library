<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'user_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'fullname',
        'birthday',
        'phone',
        'email', 
        'gender',
        'role',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function follows() 
    {
        return $this->hasMany(Follow::class);
    }

    public function borrows() 
    {
        return $this->hasMany(Borrow::class);
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class);
    }

    public function setPasswordAttribute($password) 
    {
        $this->attributes['password'] = md5($password);
    }
}