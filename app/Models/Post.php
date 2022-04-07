<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model {
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'title',
        'content',
        'slug',
        'user_id',
    ];
    const PUBLISHED = 0;
    const DRAFT = 1;
    const PENDING = 2;
    const PRIVATE = 3;
    const TRASH = 4;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    
    public function comments() {
        return $this->hasMany('App\Models\Comment');
    }
}
