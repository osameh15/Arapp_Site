<?php namespace App\Models;

use Core\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable =
        [
            'id',
            'type',
            'mobile',
            'email',
            'name',
            'password',
            'service',
            'salt',
            'avatar',
            'education',
            'bio',
            'province',
            'city',
            'notification_receiver',
            'verified_code',
            'verified_at',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

    public function advertises()
    {
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}