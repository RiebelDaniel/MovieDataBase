<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

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
            'username' => 'Admin',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'admin' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    /*

        \App\User::find(1)->givePermissionTo(Permission::all());

        DB::table('users')->insert([
            'username' => 'Steve',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'creator_id' => 1,
            'UID' => 0,
            'forum_id' => 0,

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        \App\User::find(2)->assignRole('Kommisar');
        \App\User::find(2)->assignRole('Ausbilder');
*/
    }





}
