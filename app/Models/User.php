<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Follow;
use App\Models\Borrow;
use App\Models\Like;
use App\Models\Review;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;
    use SoftDeletes;

    protected $primaryKey = 'user_id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'username',
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
        return $this->hasMany(Follow::class, 'user_id');
    }

    public function borrows() 
    {
        return $this->hasMany(Borrow::class, 'user_id');
    }

    public function liked() 
    {
        return $this->hasMany(Like::class, 'user_id');
    }

    public function reviews() 
    {
        return $this->hasMany(Review::class, 'user_id');
    }


    public function setPasswordAttribute($password) 
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function role($role) {     
        if($role == $this->role) return true;
        return false; 
    }

    public function scopeFullname($query, $fullname)
    {
        return $query->where('fullname', 'LIKE', '%' . $fullname . '%');
    }
    
    public function scopeRole($query, $role)
    {
        return $query->where('role', 'LIKE', '%' . $role . '%');
    }
}
