<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    use HasFactory;

    protected $fillable = [
        'author', 
        'author_email', 
        'title', 
        'category',
        'status',
        'priority',
        'description',
    ];

    public function comments()
    {

        return $this->belongsToMany(Comment::class);

    }

    public function categories()
    {

        return $this->belongsToMany(Category::class);

    }

    public function priorities()
    {

        return $this->belongsToMany(Priority::class);

    }

}
