<?php
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

    protected $faker;

    public function __construct()
    {
        $this->faker = Faker::create();
    }

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


        foreach(range(1,20) as $index)
        {
            $user = [
                'email' => $this->faker->email,
                'password' => Hash::make('foo')
            ];
            User::create($user);
        }
    }

} 