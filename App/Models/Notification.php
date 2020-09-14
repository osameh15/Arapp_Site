<?php


namespace App\Models;

use Core\Model;

class Notification extends Model
{
    protected $table = "message";
    protected $fillable =
        [
            'id',
            'title',
            'subtitle',
            'message',
            'image',
            'visible',
            'created_at',
            'updated_at',
            'deleted_at'
        ];
}