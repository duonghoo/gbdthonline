<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\InternalLink;
use App\Models\Post;
use App\Models\Category;

class FixLinkOut extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'interlink:fix';

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
        preg_match_all('/href="(.*?)"/', $content, $match);
        foreach ($match[1] as $link) {
            $slug = $this->getSlugPost($link, 'gamebaidoithuong');
            $this->info($slug);
            $content = preg_replace('/<a\b[^>]*href="'. preg_quote($slug, '/') .'".*?>(.*?)<\/a>/i', '<span>$1</span>', $content);
            $data=['content'=>$content];
            Post::updateOrInsert(['id' => $id], $data);
        } 
        return 0;  
    }

    private function getSlugPost($url, $match){
        if (strstr(parse_url($url,PHP_URL_HOST),$match))
        {
           return null;
        }
        else
        return $url;
    }

}
