<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
class Like extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id'
    ];
}
