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
        'enabled'
    ];

    public static function getTypeToChinese(string $type): string
    {
        $types = [
            'activity' => '活動',
            'urgency' => '緊急',
            'staff' => '職員'
        ];

        if(array_key_exists($type, $types))
        {
            return $types[$type];
        }
        else
        {
            return '未知';
        }
    }
}
