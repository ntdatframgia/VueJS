<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create(['name' => 'Nguyen Van A', 'email' => 'test@gmail.com']);
        $this->call(CategoriesTopicsSeeder::class);
    }
}
