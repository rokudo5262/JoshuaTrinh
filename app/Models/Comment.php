<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Comment extends Model {
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'post_id',
        'user_id',
        'content',
    ];

    protected $dates = [
        'created_at', 
        'update_at', 
    ];
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdateAtAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
