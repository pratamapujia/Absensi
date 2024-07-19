<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Departemen extends Model
{
    use HasFactory, Notifiable;

    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';
    protected $fillable = [
        'kd_departemen',
        'nama_departemen',
    ];
}
