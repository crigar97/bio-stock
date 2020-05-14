<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    Role::create([
        'value' => 'superadministrator'
    ]);
    Role::create([
        'value' => 'administrator'
    ]);
    Role::create([
      'value' => 'collaborator'
    ]);

    User::create([
      'name' => 'Superadministrador',
      'role_id' => 1,
      'email' => 'super@example.com',
      'email_verified_at' => now(),
      'password' => bcrypt('super'),
      'remember_token' => Str::random(10),
    ]);

    User::create([
      'name' => 'Colaborador 1',
      'role_id' => 3,
      'email' => 'col1@example.com',
      'email_verified_at' => now(),
      'password' => bcrypt('col1'),
      'remember_token' => Str::random(10),
    ]);

    User::create([
      'name' => 'Colaborador 2',
      'role_id' => 3,
      'email' => 'col2@example.com',
      'email_verified_at' => now(),
      'password' => bcrypt('col2'),
      'remember_token' => Str::random(10),
    ]);

    User::create([
      'name' => 'Colaborador 3',
      'role_id' => 3,
      'email' => 'col3@example.com',
      'email_verified_at' => now(),
      'password' => bcrypt('col3'),
      'remember_token' => Str::random(10),
    ]);

    User::create([
      'name' => 'Colaborador 4',
      'role_id' => 3,
      'email' => 'col4@example.com',
      'email_verified_at' => now(),
      'password' => bcrypt('col4'),
      'remember_token' => Str::random(10),
    ]);
  }
}
