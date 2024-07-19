<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SetJam extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'jam_kerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kd_jam',
        'nama_jam',
        'awal_jam',
        'jam_masuk',
        'akhir_jam',
        'jam_pulang',
    ];
}
