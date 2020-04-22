<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        [
        'name'=>'SuperAdmin',
        'email'=>'admin@mail.ru',
        'password'=> Hash::make('123'),
        'email_verified_at'=>now(),
        'remember_token'=> Str::random(10),
        'isAdmin'=>true
        ]
        ]);

        factory(User::class, 5)->create();
    }
}
