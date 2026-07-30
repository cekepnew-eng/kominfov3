<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magang extends Model
{
    protected $fillable = [
        'ticket_number',
        'nama_lengkap',
        'email',
        'no_whatsapp',
        'posisi_diminati',
        'asal_kampus_sekolah',
        'lokasi_magang',
        'bidang_tujuan',
        'lama_magang',
        'surat_cv_path',
        'status'
    ];
}
