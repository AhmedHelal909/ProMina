<?php

namespace App\Models;


use App\Models\Models\Active;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];
    protected $guard_name = 'web';
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
  
    protected $appended=['image_path'];
    public function getImagePathAttribute()
    {
        return $this->image !=null ? asset('uploads/users/'.$this->image) : asset('uploads/users/default.png');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'branch_id'=>'array'
    ];
    public function active()
    {
        return $this->hasMany(Active::class);
    }
     

  
    
}
