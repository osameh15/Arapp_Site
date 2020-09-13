<?php


namespace App\Models;

use Core\Model;

class Category extends Model
{
    protected $table = "category";
    protected $fillable =
        [
            'id',
            'title',
            'image'
        ];
}