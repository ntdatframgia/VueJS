<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Topic;
use App\Http\Models\Category;
use App\Http\Models\Comment;

class CategoriesTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Category::class, 5)->create()->each(function($c)
        {
        	$c->topics()->saveMany(
        		factory(Topic::class, 5)->create([
        			'category_id' => $c->id
        		])
        	);
        });
    }
}
