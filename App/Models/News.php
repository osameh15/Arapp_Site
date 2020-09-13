<?php


namespace App\Models;

use Core\Model;

class News extends Model
{
    protected $table = "news";
    protected $fillable =
        [
            'id',
            'user_id',
            'banner',
            'description',
            'show',
            'created_at',
            'updated_at',
            'deleted_at'
        ];
}