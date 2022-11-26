<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transkasi extends Model
{
    protected $fillable = [
        'tgl_pembelian', 'nama_pembeli', 'nama_konser', 'jadwal_konser', 'waktu_transaksi', 'jumlah'
    ];
}
