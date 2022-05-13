<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'login',
        'login_ip',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getCreatedAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }

    public function getUpdateAtAttribute($value) {
        return Carbon::parse($value)->format('Y-m-d');
    }
}
