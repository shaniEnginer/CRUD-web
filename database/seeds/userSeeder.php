<?php

use Illuminate\Database\Seeder;
use DB;
class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    Db::table('users')->insert([

'name'=>str_random(10),
'email'=>str_random(10).'gmail.com',
'password'=>bcrypt('secret'),

    ]);
    
    }
}
