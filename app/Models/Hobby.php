<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    protected $fillable= [
        'name',
    ];

    public function siswas(){
        return $this->belongsToMany(Siswa::class, 'siswa_hobbies', 'hobby_id', 'siswa_id');
    }
}
