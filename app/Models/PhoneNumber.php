<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = [
        'siswa_id',
        'phone_number',
    ];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
