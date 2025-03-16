<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
  public function run()
  {
    // Create the admin role if it doesn't exist already.
    $adminRole = Role::firstOrCreate(['name' => 'admin']);

    // Create an admin user.
    $admin = User::create([
      'name'        => 'Admin Albukerki',
      'nim'         => 'admin000',
      'prodi'       => 'Administration',
      'tahun_lulus' => 2012,
      'fakultas'    => 'Admin Faculty',
      'password'    => Hash::make('admin000'),
    ]);

    $admin->assignRole($adminRole);

    // Create an admin user.
    $alumni = User::create([
      'name'        => 'Alumni Pinkman',
      'nim'         => 'alumni000',
      'prodi'       => 'Kimia 101',
      'tahun_lulus' => 2021,
      'fakultas'    => 'Los Pollos',
      'password'    => Hash::make('alumni000'),
    ]);

    $alumni->assignRole('alumni');
  }
}
