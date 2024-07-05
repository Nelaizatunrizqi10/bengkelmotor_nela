<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' =>bcrypt('password')
        ]);
        $admin->assignRole('admin');

        $customer=User::create([
            'name' => 'Nagatami',
            'email' => 'nagatami@gmail.com',
            'password' =>bcrypt('password')
        ]);
        $customer->assignRole('customer');
    }
}
