<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name = "Jake Petty";
        $user->email = "support@vexcon.net";
        $user->password = Hash::make("adminPassword");
        $user->save();
    }
}
