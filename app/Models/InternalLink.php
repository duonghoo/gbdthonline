<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalLink extends Model
{
    use HasFactory;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = 'internal_link';
    }

    // public static function updateData($id, $content) {
    //     self::where('post_id', $id)->delete();
    //     preg_match_all('/href="(.*?)"/', $content, $match);
    //     foreach ($match[1] as $link) {
    //         if (preg_match('/^((.*?)gamebaidoithuong|\/)(.*?)-p([0-9]+)\.html/', $link, $m)) {
    //             $post_id_out = end($m);
    //             self::insert(['post_id' => $id, 'post_id_out' => $post_id_out]);
    //         }
    //     }
    // }

    public static function updateData($id, $content) {
        self::where('post_id', $id)->delete();
        preg_match_all('/href="(.*?)"/', $content, $match);
        foreach ($match[1] as $link) {
            $slug = self::getSlugPost($link, 'gamebaidoithuong');

            if($slug == '' || $slug == '/' || !$slug)
            {
                $id_post = 10000;
                self::insert(['post_id' => $id, 'post_id_out' => $id_post]);
            }
            if($slug){
                $post = Post::where('slug', $slug)->first();
                if(!$post){
                    $post = Category::where('slug', $slug)->first();
                    if(!$post)
                    {
                        continue;
                    }
                    else
                    {
                        $id_post = $post->id + 10000; 
                    }   
                }
                else
                {
                    $id_post = $post->id;
                }
                self::insert(['post_id' => $id, 'post_id_out' => $id_post]);
            }
        } 
        Post::updateOrInsert(['id' => $id],[ 'count_link_out' => self::where('post_id', $id)->count()]);
        return 0;

    }

      public static function getSlugPost($url, $match){
        if (strstr(parse_url($url,PHP_URL_HOST),$match))
        {
           $slug = explode("/", $url);
           
           $slug = array_filter($slug, function($item) use ($match){
                if($item != 'https:' && !strstr($item, $match) && $item != 'http:') return $item;
           });
           $slug = array_values($slug);
           return !empty($slug) ? $slug[0] : null;
        }
        return null;
    }
}
