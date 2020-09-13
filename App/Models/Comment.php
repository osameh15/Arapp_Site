<?php
/**
 * Created by PhpStorm.
 * User: Mohammad
 * Date: 16/05/2020
 * Time: 11:07 AM
 */

namespace App\Models;


use Core\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable =
        [
            'user_id',
            'ads_id',
            'parent_id',
            'body',
            'enable_comment',
            'created_at',
            'updated_at',
            'deleted_at'
        ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}