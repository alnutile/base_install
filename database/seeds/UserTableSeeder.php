<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder {

    public function run()
    {
        $user = [
            'email' => 'admin@foo.com',
            'password' => Hash::make('foo')
        ];

        User::create($user);

        $user = [
            'email' => 'other@foo.com',
            'password' => Hash::make('foo')
        ];

        User::create($user);
    }

} 