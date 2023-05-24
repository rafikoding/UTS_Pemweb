<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';
    protected $primaryKey = 'ID_pasien';
    public $timestamps = false;

    protected $fillable = [
        'Nama',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
    ];
}
