<?php

namespace app\models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string name
 * @property string password
 */
class User extends Model
{
    protected $table = 'users';

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->save();
    }

    public function verifyPassword(string $password)
    {
        return password_verify($password, $this->password);
    }
}
