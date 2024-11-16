<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;

/*class DatabaseSeeder extends Seeder
/*{
    /**
     * Seed the application's database.
     */
   /* public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
   /* }
}*/

class DatabaseSeeder extends Seeder
{
    public function run()
        {
            Task::create([
                /*'id'=> '2',*/
                'name' => 'lista 2',
               /* 'is_completed' => 'false),
              /*  'created_at' => '',
                'updated_at' => '', */
            ]);
        }
}