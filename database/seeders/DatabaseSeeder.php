<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Master;
use App\Models\Request;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'test',
            'email' => 'test@mail.ru',
            'password' => bcrypt('test'),
            'role' => 'админ',
        ]);
        Master::factory(5)->create();
        Request::factory(10)->create();
    }
}

