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
        Eloquent::unguard();
        
        // Just precaution because UserTableSeeder may not be included
        //  for security reasons
        try {
            $this->call(UserTableSeeder::class);
        } catch (Exception $e) {
            
        }
        
        $this->call(PostTableSeeder::class);
    }
}
