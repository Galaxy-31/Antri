<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;
    protected $table = 'daftars';
    protected $fillable = [
        'nik',
        'nama',
        'tmpt_lhr',
        'tgl_lhir',
        'jenkel',
        'goldarah',
        'alamat',
        'agama',
        'status',
        'pekerjaan',
        'kewarga',
    ]; 
}
