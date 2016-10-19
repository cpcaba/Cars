<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
          'name' => "Usuario1",
          'usertype' => 'admin',
          'email' => "usuarioAdmin".'@gmail.com',
          'password' => bcrypt('123123'),
      ]);

      DB::table('users')->insert([
          'name' => "Usuario2",
          'usertype' => 'salesman',
          'email' => "usuarioSalesman".'@gmail.com',
          'password' => bcrypt('123123'),
      ]);
    }
}
