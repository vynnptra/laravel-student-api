<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiswaHobby extends Model
{
    protected $table = 'siswa_hobbies';
    protected $fillable = ['siswa_id', 'hobby_id'];
}
