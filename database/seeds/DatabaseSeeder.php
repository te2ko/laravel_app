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
        // $this->call(UsersTableSeeder::class);
        //シーダークラスのプロパティを引数に入れている
        $this->call(TodosTableSeeder::class);
    }
}
