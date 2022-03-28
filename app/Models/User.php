<?php

namespace App\Models;
use App\Models\Post;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'date_of_birth',
        'profile_picture',
        'email',
        'password',
        'is_admin',
        'is_deleted',
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
    protected $dates = [
        'created_at', 
        'update_at', 
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute(){
        return "{$this->first_name} {$this->last_name}";
    }

    public function post() {
        return $this->hasMany('App\Models\Post');
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdateAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
