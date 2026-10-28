<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table    = 'Portofolio_1183';
    protected $fillable = [
        'judul', 'tentang_saya', 'data_diri', 'pendidikan',
        'pengalaman_kerja', 'kemampuan', 'kontak', 'sosial_media', 'gambar',
    ];
}
