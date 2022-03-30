<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => config('developers.udoy.name'),
            'email' => config('developers.udoy.email'),
            'password' => Hash::make('asdf!@#$')
        ]);

        User::create([
            'name' => config('developers.muttakin.name'),
            'email' => config('developers.muttakin.email'),
            'password' => Hash::make('Afnan2018$')
        ]);
    }
}
