<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use  Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function allPosts(){

        return cache()->rememberForever('posts.all', function()
        {
           return collect(File::files(resource_path("/posts")))
            ->map (fn($file) => YamlFrontMatter::parseFile($file))
            ->map (fn($document)=> new Post
                (
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                )
            )->sortByDesc('date');
        });
    }
       
    
    /**
     * @param [type] $slug
     * @return $post
     */
    public static function findPost($slug)
    {
        return Post::allPosts()->firstWhere('slug',$slug);
    }

}
