<?php

namespace App\User;

use App\Core\AbstractModel;


class UserModel extends AbstractModel
{
    public $uid;
    public $username;
    public $email;
    public $password;
    public $user_created_at;
    public $user_changed_at;
    public $user_role;
    public $user_description;
}