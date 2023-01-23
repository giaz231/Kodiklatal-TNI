<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telegram extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jenis_surat',
        'id_unit',
        'id_pengirim',
        'id_tujuan',
        'perihal_surat',
        'no_surat',
        'no_agenda',
        'tanggal',
        'password',
        'disposisi',
        'file_surat',
        'dibaca',
        'klasifikasi',
        'derajat',
    ];
}
