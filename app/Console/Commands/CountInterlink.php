<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\InternalLink;
use App\Models\Post;
use App\Models\Category;

class CountInterlink extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'interlink:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get count interlink';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $data = Post::all()->sortByDesc('displayed_time');
        foreach($data as $d){
            echo $d->title." create interlink\n";
            $this->update($d->id, $d->content);
            
        }
        return 0;
    }

    private function update($id, $content){
        InternalLink::where('post_id', $id)->delete();
        preg_match_all('/href="(.*?)"/', $content, $match);
        foreach ($match[1] as $link) {
            $slug = $this->getSlugPost($link, 'gamebaidoithuong');
            $this->info($slug);
            if($slug == '' || $slug == '/' || !$slug)
            {
                $id_post = 10000;
                $this->info('Trang chủ');
                InternalLink::insert(['post_id' => $id, 'post_id_out' => $id_post]);
            }
            if($slug){
                $post = Post::where('slug', $slug)->first();
                if(!$post){

                    $post = Category::where('slug', $slug)->first();
                    if(!$post)
                    {
                        $this->error('Khong the tim thay slug post!');
                        continue;
                    }
                    else
                    {
                        $id_post = $post->id + 10000; // if id>10000 -> category
                    }
                    
                }
                else
                {
                    $id_post = $post->id;
                }

                InternalLink::insert(['post_id' => $id, 'post_id_out' => $id_post]);
                $this->info($post->title. " -- interlink successfully!");
            }
        } 
        Post::updateOrInsert(['id' => $id],['count_link_out' => InternalLink::where('post_id', $id)->count()]);
        $this->info(InternalLink::where('post_id', $id)->count());
        return 0;  
    }

    private function getSlugPost($url, $match){
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
