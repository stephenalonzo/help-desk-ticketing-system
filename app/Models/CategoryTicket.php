<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTicket extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $table = 'category_ticket';

    protected $fillable = [
        'category_id',
        'ticket_id'
    ];

}
