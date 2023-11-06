<?php

namespace App\Utilities;

class Constant
{
    const user_level_admin = 0;
    const user_level_user = 1;
    public static $user_status = [
        self::user_level_admin => 'admin',
        self::user_level_user => 'client',
     ];
}
