<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        for($i = 0; $i < 15; $i++){

            $newPost = new Post;

            $newPost->title = 'Post numero ' . ($i + 1);
            $newPost->slug = Str::slug($newPost->title, '-');
            $newPost->description = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iure ipsum officia numquam deleniti odit laboriosam magni laudantium cupiditate, fugiat non a necessitatibus cumque totam nihil quia quasi! Rem, debitis voluptate?. Questa è la descrizione realtiva al post numero ' . ($i + 1);
            $newPost->author = 'Igor il magnifico';

            $newPost->save();
        }

        
    }
}
