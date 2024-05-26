<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Models\Pelanggan;

class PelangganUserProvider implements UserProvider
{
    public function retrieveById($identifier)
    {
        return Pelanggan::find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        // Implementasikan jika diperlukan
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
        // Implementasikan jika diperlukan
    }

    public function retrieveByCredentials(array $credentials)
    {
        // Implementasi pencarian pengguna berdasarkan kredensial
        return Pelanggan::where('username', $credentials['username'])->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        // Implementasi validasi kredensial
        return $user->getAuthPassword() === $credentials['password'];
    }
}
