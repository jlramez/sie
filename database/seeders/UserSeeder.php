<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create
        ([
            'name' => 'Esthela Deyanira López García',
            'email' => 'capacitacion@tjlbz.gob.mx',
            'email_verified_at' => now(),
            'password' => '$2y$10$94dK37ifsT.7XN0EfbjRTucAxIkQPveHCC6B9AWXzsPAHsUdWsA7m',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' =>  now()

            ])->assignRole('instructor');
                    
    }
}
