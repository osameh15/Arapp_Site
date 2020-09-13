<?php


namespace App\Models;

use Core\Model;

class Province extends Model
{
    protected $table = "province";
    protected $fillable =
        [
            'id',
            'name'
        ];
}