<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];

    public function users()
    {

        return $this->belongsToMany(User::class);

    }

    public function tickets()
    {

        return $this->belongsToMany(Ticket::class);

    }

}
