<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        User::create([
            'name'=> 'admin',
            'email'=> 'newadmin@gmail.com',
            'password' => Hash::make('Tantrafenix1!'),
            'address'=> 'earth',
            'phone_number'=> '09273072133',
        ]);        
    }
}
