<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'user_id' => '1',
            'category_id' => '1',
            'title' => 'Travel is key',
            'description' => 'good photo is needed',
            'image' => 'swirl.jpg'
        ]);
        Article::create([
            'user_id' => '1',
            'category_id' => '2',
            'title' => 'Travel is Life',
            'description' => 'good photo is needed',
            'image' => 'swirl.jpg'
        ]);
        Article::create([
            'user_id' => '1',
            'category_id' => '3',
            'title' => 'Travel is Good',
            'description' => 'good photo is needed',
            'image' => 'swirl.jpg'
        ]);
    }
}
