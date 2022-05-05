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
        'post_status',
        'user_id',
    ];

    protected $dates = [
        'created_at', 
        'update_at', 
    ];

    const Published = 0;
    const Draft = 1;
    const Pending = 2;
    const Private = 3;
    const Trash = 4;
    
    public function user() {
        return $this->belongsTo('App\Models\User');
    }
    public function author() {
        return $this->belongsTo('App\Models\User');
    }


    public function scopeWithAuthor($query) {
        $query->addSelect(['author' => User::select('id')
        ->whereColumn('id','posts.user_id')])
        ->with('user');
    }
    
    public function comment() {
        return $this->hasMany('App\Models\Comment');
    }

    public function getPostStatusAttribute($value){
        switch($value) {
            case 0;
                return "Published";
                break;
            case 1;
                return "Draft";
                break;
            case 2;
                return "Pending";
                break;
            case 3;
                return "Private";
                break;
            case 4;
                return "Trash";
                break;
            default:
                break;
        }
    }
    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getUpdateAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
?>