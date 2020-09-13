<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 16/05/2020
 * Time: 04:17 AM
 */

namespace App\Models;


use Core\Model;

class Advertise extends Model
{
    protected $table = "advertise";
    protected $fillable =
        [
            'user_id',
            'province_id',
            'cat_id',
            'title',
            'description',
            'banner',
            'slug',
            'enable_advertise',
            'special',
            'address',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }


}