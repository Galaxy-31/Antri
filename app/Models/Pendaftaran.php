<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
use HasFactory;

        protected $table = 'pendaftarans';
        protected $primaryKey = 'nik';

        protected $casts = ['nik' => 'bigint'];

        protected $fillable = [
            'nik',
            'nama',
            'tmpt_lhr',
            'tgl_lhir',
            'jenkel',
            'goldarah',
            'alamat',
            'rt',
            'rw',
            'kel',
            'kec',
            'agama',
            'status',
            'pekerjaan',
            'kewarga',
            'berlaku',
            'foto',
        ];
}
