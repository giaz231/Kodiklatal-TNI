<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pengirim',
        'id_tujuan',
        'tanggal',
        'no_agenda',
        'tanggal_2',
        'no_surat',
        'terima_dari',
        'alamat_aksi',
        'diteruskan',
        'aksi',
        'catatan',
        'perihal_surat',
        'file_surat',
        'dibaca',
        'menggetahui',
        'kasetum',
        'kasubbagminu',
        'kaur_tu',
        'kasetum_kembali',
        'kasubbagminu_kembali',
        'kaur_tu_kembali',
        
    ];
}
