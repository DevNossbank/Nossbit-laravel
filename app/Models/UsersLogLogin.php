<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersLogLogin extends Model
{
    protected $table = 'users_log_logins';
    public $timestamps = false;

    public static function logLogin($userId, $ipAddress)
    {
        $userLogLogin = new self();
        $userLogLogin->user_id = $userId;
        $userLogLogin->ip_address = $ipAddress;
        $userLogLogin->save();
    }
}