<?php

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
        $user = new \App\User();
        $user->name = 'admin';
        $user->email = 'admin@quizapp.com';
        $user->password = bcrypt('admin@123');
        $user->first_name = 'First Name';
        $user->last_name = 'Last Name';
        $user->gender = 'male';
        $user->type = 'admin';
        $user->status = '1';
        $user->save();
    }
}
