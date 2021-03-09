<?php

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
        // $this->call(UserSeeder::class);
        $data=[
        	'name'=>'Nghĩa',
        	'email'=>'nghiatran1791@gmail.com',
        	'password'=>bcrypt('nghia12345'),
        	'created_at'=>new Datetime(),
        ];
        DB::table('admins')->insert($data);
    }
}
