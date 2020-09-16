<?php

namespace App\Models;

use Core\Model;

class Rate extends Model
{
    protected $table = "ads_rate";
    protected $fillable =
        [
            "user_id",
            "ads_id",
            "rate",
            "created_at",
            "updated_at"
        ];



}