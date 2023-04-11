<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\InternalLink;
use App\Models\Post;
use App\Models\Category;
use App\Models\TopGame;
use App\Models\TopGameNew;

class ConvertTopgame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'topgame:convert {option}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'convert top game';

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
        $option = $this->argument('option');

        if($option == 'category'){
            $data_raw = TopGame::whereNotNull('category_id')->get();
        }else{
            $data_raw = TopGame::whereNotNull('type')->get();
        }

        
        foreach($data_raw as $rw){
            $post = Post::where('id', $rw->post_id)->first();
            $category = Category::where('id', $rw->category_id)->first();
            print_r('-> post_id: '.$rw->post_id."\n");

            if(!empty($post) && !empty($category)){
                $optional = json_decode($post->optional);
                if(!empty($optional)){
                    $data = [
                        'name' => isset($optional->name) ? $optional->name : $post->title,
                        'type' => $category->id,
                        'post_id' => $post->id,
                        'content' => json_encode(['logo' => $optional->logo, 'description' => $optional->description, 'link_cuocngay' => $optional->link, 'link' => getUrlPost($post, 0)]),
                    ];
                }else{
                    $data = [
                        'name' => $post->title,
                        'type' => $category->id,
                        'post_id' => $post->id,
                    ];
                }
                
                $topgame = TopGameNew::where('post_id', $post->id)->first();

                if(!empty($topgame)){
                    TopGameNew::updateOrInsert(['id' => $topgame->id],$data);
                }else{
                    TopGameNew::insert($data);
                }
                
                $this->info("Convert succesfully!\n-------\n");
            }else if(!empty($post)){
                $optional = json_decode($post->optional);
                if(!empty($optional)){
                    $data = [
                        'name' => isset($optional->name) ? $optional->name : $post->title,
                        'post_id' => $post->id,
                        'content' => json_encode(['logo' => $optional->logo, 'description' => $optional->description, 'link_cuocngay' => $optional->link,  'link' => getUrlPost($post, 0)]),
                    ];
                }else{
                    $data = [
                        'name' => $post->title,
                        'post_id' => $post->id,
                    ];
                }
                
                $topgame = TopGameNew::where('post_id', $post->id)->first();

                if(!empty($topgame)){
                    TopGameNew::updateOrInsert(['id' => $topgame->id],$data);
                }else{
                    TopGameNew::insert($data);
                }
                
                $this->info("Convert succesfully!\n-------\n");


            }else{
                continue;
            }
        }
        
    }


}
