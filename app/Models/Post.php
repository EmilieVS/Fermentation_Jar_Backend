<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{

    use HasApiTokens;
    protected $fillable = [
        'display_name',
        'username',
        'description',
        
    
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
