<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Pelanggan extends Authenticatable implements AuthenticatableContract
{
    use Notifiable;
    use HasFactory;

    protected $guarded = ['id'];

    public function rekening()
    {
        return $this->hasOne(Rekening::class, 'id_pelanggan');
    }

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_pelanggan');
    }
}
