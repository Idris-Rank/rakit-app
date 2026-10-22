<?php

defined('DS') or exit('No direct script access.');

class Admin_User extends \System\Database\Facile\Model
{
    public static $table = 'users';
    public static $fillable = ['name', 'email', 'role', 'password'];
    public static $hidden = ['password'];
}
