<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;

class Post extends Model {

    use HasApiTokens;

    protected $fillable = [
        'user_id',
        'description',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}