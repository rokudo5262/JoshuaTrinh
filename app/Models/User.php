<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Task;
use App\Models\Status;
use App\Models\Logging;
use App\Models\Comment;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class User extends Authenticatable
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'full_name',
        'address',
        'phone_number',
        'profile_picture',
        'email',
        'password',
        'is_admin',
        'is_deleted',
        'date_of_birth',
        'created_at', 
        'update_at',
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
        'date_of_birth',
        'created_at', 
        'update_at', 
    ];
    protected $appends = [
        'full_name',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function loggings() {
        return $this->hasMany(Logging::class,'user_id');
    }

    public function posts() {
        return $this->hasMany(Post::class,'user_id');
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function statuses() {
        return $this->hasMany(Status::class)->orderBy('order');
    }

    public function first_post() {
        return $this->belongsTo(Post::class);   
    }

    public function scopeWithFirstPost($query) {
        $query->AddSelect(['first_post_id'=>Post::select('id')
        ->whereColumn('user_id','users.id')
        ->orderBy('created_at','asc')
        ->take(1)
        ])->with('first_post');
    }


    public function getFullNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    public function getCreatedAtAttribute($value) {
        // return Carbon::parse($value)->format('d-m-Y');
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getUpdateAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getDateOfBirthAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getFirstNameAttribute($value) {
        return ucfirst($value);
    }

    public function getLastNameAttribute($value) {
        return ucfirst($value);
    }

}
?>