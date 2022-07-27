<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Profile::create(['name'=>'super admin']);
        Profile::create(['name'=>'admin']);
        Profile::create(['name'=>'user']);
        User::create([
            'email'=>'superadmin@gmail.com',
            'password'=>'passer',
            'entreprise_id'=>null,
            'profile_id'=> Profile::where('name', 'super admin')->get()->first()->id
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
