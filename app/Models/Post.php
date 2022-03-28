<?php

namespace App\Models;
use App\Models\User;
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
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
