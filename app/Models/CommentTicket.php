<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentTicket extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'comment_ticket';

    protected $fillable = [
        'comment_id',
        'ticket_id'
    ];

}
