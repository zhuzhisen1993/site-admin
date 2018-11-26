<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\admin\Admin', 10)->create([
            'password' => bcrypt('123456')
        ]);
    }
}
