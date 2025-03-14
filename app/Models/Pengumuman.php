<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
  use HasFactory;

  protected $table = 'pengumuman'; // Sesuai dengan nama tabel di database

  protected $fillable = [
    'judul_pengumuman',
    'deskripsi_pengumuman',
    'gambar',
  ];

  protected $casts = [
    'gambar' => 'array',
  ];
}

