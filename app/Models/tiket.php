<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    protected $fillable =[
        'kode_tiket','nama_konser','jadwal_konser','deskripsi','lokasi'
    ];
}
