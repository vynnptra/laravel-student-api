<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'name',
    ];

    public function nisn(){
        return $this->hasOne(Nisn::class, 'siswa_id', 'id');
    }

    public function phoneNumbers(){
        return $this->hasMany(PhoneNumber::class, 'siswa_id', 'id');
    }

    public function hobbies(){
        return $this->belongsToMany(Hobby::class, 'siswa_hobbies', 'siswa_id', 'hobby_id');
    }
}
