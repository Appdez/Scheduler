<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $admin =   User::create([
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin@admin'), // password
                'remember_token' => Str::random(10),
            ]);
            $atendente =   User::create([
                'name' => 'Atendente',
                'email' => 'atendente@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('atendente@atendente'), // password
                'remember_token' => Str::random(10),
            ]);
         Role::create(['name' => 'admin']);
         Role::create(['name' => 'atendente']);
         Role::create(['name' => 'cliente']);
         
         $admin->assignRole('admin');
         $atendente->assignRole('atendente');

    }
}
