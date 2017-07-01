<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['id', 'name', 'email', 'password'];

    public static function search($query)
    {
       return self::select('name','email')->where('email', 'like', '%' . $query . '%')->orWhere('name', 'like', '%' . $query . '%')->get();
    }

    public static function auth($email, $password)
    {
        $user = self::where('email', $email)->first();
        if ($user != null) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return null;
    }
}