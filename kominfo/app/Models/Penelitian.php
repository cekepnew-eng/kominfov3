<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $fillable = [
        'ticket_number',
        'nama_lengkap',
        'no_telepon',
        'email',
        'instansi',
        'judul_penelitian',
        'lokasi_penelitian',
        'bidang_tujuan',
        'surat_penelitian_path',
        'surat_kesbangpol_path',
        'status',
        'jurnal_path',
        'jurnal_link',
        'jurnal_status'
    ];
}
