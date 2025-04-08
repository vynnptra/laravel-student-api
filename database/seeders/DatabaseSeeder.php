<?php

namespace Database\Seeders;

use App\Models\Hobby;
use App\Models\Nisn;
use App\Models\PhoneNumber;
use App\Models\Siswa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Siswa::create([
            'name' => 'Test'
        ]);

        Nisn::create([
            'siswa_id' => 1,
            'nisn' => 123456789123456789
        ]);

        PhoneNumber::create([
            'siswa_id' => 1,
            'phone_number' => 567895678967
        ]);

        PhoneNumber::create([
            'siswa_id' => 1,
            'phone_number' => 345678987654
        ]);

        Hobby::create([
            'name' => 'berlari'
        ]);

        Hobby::create([
            'name' => 'bernyanyi'
        ]);


    }
}
