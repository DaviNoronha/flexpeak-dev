<?php

namespace App\Services;

use App\User;

class UserService
{
    public static function list()
    {
        return User::all();
    }

    public static function store($request)
    {
        $request['password'] = bcrypt($request['password']);
        return User::create($request);
    }

    public static function update($request, $user)
    {
        $request['password'] = bcrypt($request['password']);
        $user->update($request);
        return $user;
    }

    public static function destroy($user)
    {
        return $user->delete();
    }
}
