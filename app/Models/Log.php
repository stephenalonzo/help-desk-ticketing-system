<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Log extends Model
{
    use HasFactory, Sortable;

    public $timestamps = false;

    protected $fillable = [
        'env', 
        'action',
        'message', 
        'timestamp'
    ];

}
