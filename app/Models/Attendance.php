<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['nisn', 'nama_santri', 'kamar_kelas', 'status', 'keterangan'];
}