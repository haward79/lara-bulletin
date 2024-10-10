<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulletin extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'type',
        'title',
        'content',
        'enabled',
        'lastUpdated',
        'created'
    ];
}
