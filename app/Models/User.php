<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,HasRoles;

    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'isLogginAllowed',
        'isAdminVerified',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile() 
    {
        return $this->hasOne(UserProfile::class,'user_id','user_id');
    }
    public function address() 
    {
        return $this->hasOne(UserAddress::class,'user_id','user_id');
    }
    public function experience() 
    {
        return $this->hasOne(UserExperience::class,'user_id','user_id');
    }
    public function documents() 
    {
        return $this->hasOne(UserDocuments::class,'user_id','user_id');
    }
    public function requirements() 
    {
        return $this->hasMany(Requirements::class,'user_id','user_id');
    }

}
