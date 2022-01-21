<?php

namespace App\Services;

use App\User;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserService
{
    public static function list()
    {
        try {
            return User::with(['tipo_bug', 'perfil'])->get();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function store($request)
    {
        try {
            $request['password'] = bcrypt($request['password']);
            return User::create($request);
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function update($request, $user)
    {
        try {
            $user->update($request);
            return $user;
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }

    public static function destroy($user)
    {
        try {
            return $user->delete();
        } catch (Throwable $th) {
            Log::error([
                'mensagem' => $th->getMessage(),
                'linha' => $th->getLine(),
                'arquivo' => $th->getFile()
            ]);
        }
    }
}
