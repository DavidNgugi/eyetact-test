<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\BcryptHasher;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' 	        => 'User A',
                'email' 		=> 'usera@eyetact.com',
                'password' 	    => (new BcryptHasher())->make('password')
            ],
            [
                'name' 	        => 'User B',
                'email' 		=> 'userb@eyetact.com',
                'password' 	    => (new BcryptHasher())->make('password')
            ],
            [
                'name' 	        => 'User C',
                'email' 		=> 'userc@eyetact.com',
                'password' 	    => (new BcryptHasher())->make('password')
            ]
        ];

        User::create(
            [
                'name' 	        => 'Super Admin',
                'email' 		=> 'superadmin@eyetact.com',
                'password' 	    => (new BcryptHasher())->make('password')
            ]
       )->assignRole('super-admin');

       User::create(
            [
                'name' 	        => 'Admin',
                'email' 		=> 'admin@eyetact.com',
                'password' 	    => (new BcryptHasher())->make('password')
            ]
        )->assignRole('admin');
        
        foreach($users as $user) {
            User::create($user)->assignRole('user');
        }

    }
}
