<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Category
    public function CategoryName()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Created
    public function CreatedName()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    // public function comment()
    // {
    //     return $this->hasMany(Comment::class, 'post_id', 'id');
    // }
}
