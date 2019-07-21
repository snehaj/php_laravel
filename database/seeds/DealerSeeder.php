<?php

use Illuminate\Database\Seeder;

class DealerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name' => 'Dealer',
            'email' => 'dealer@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('dealer'),
            'dealer' => 1
            
        ]);
    }
}
