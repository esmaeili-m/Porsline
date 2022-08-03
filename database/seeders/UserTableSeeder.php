<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $this->createUser();
    }

    private function createUser()
    {
         User::create([
            'name'=> 'mahdiesmaeili',
            'email'=> 'mahdiesmaeili@gmail.com',
            'role'=> 'admin',
            'phone'=> '09193544391',
            'password'=> bcrypt('mahdicfc'),
         ]);
    }

}
