<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\WebController;
use App\Models\BoxNews;
use App\Models\Category;
use App\Models\Post;
// use App\Models\TopGame;
use App\Models\TopGameInfo;
use App\Models\SiteSetting;
use App\Models\TopGameNew as TopGame;

class HomeController extends WebController
{
    public function index(){
        
        $data['page'] = $page = isset($_GET['page']) ? (int)$_GET['page'] + 1 : 3;

        $oneItem = BoxNews::find(1);
        if (!empty($oneItem->data)) {
            $oneItem = json_decode($oneItem->data);
            foreach ($oneItem as $key => $value) {
                //$oneItem[$key]->item = Post::where('status', 1)->where('category_id', $value->id)->orderBy('id', 'desc')->limit(7)->get();
                if(isset($_GET['page'])){
                    $oneItem[$key]->item = Post::join('post_category', 'post_category.post_id', '=', 'post.id')->where('post.status', 1)->where('post_category.category_id', $value->id)->orderBy('post.id', 'desc')->limit(5)->offset(($page-1)*5)->get();
                }else{
                    $oneItem[$key]->item = Post::join('post_category', 'post_category.post_id', '=', 'post.id')->where('post.status', 1)->where('post_category.category_id', $value->id)->orderBy('post.id', 'desc')->limit(10)->offset(($page-1)*5)->get();
                }
                
            }
            $data['category_homepage'] = $oneItem;
        }

        // $data['post_in_home'] = Post::with(['Category' => function($q) use ($value){
        //     $q->where('category.id', '=', 117);
        // }])->where('status', 1)->orderBy('id', 'desc')->limit(10)->get();
        // dd($data['post_in_home']);

        $oneItem = BoxNews::find(2);
        if (!empty($oneItem->data)) {
            $oneItem = json_decode($oneItem->data);
            foreach ($oneItem as $key => $value) {
                $oneItem[$key]->item = Post::join('post_category', 'post_category.post_id', '=', 'post.id')->where('post.status', 1)->where('post_category.category_id', $value->id)->orderBy('post.id', 'desc')->limit(3)->get();
            }
        }
        $data['home_content'] = SiteSetting::where('setting_key', 'site_content_full')->first();
        $data['sidebar_homepage'] = $oneItem;
        $data['site_setting'] = SiteSetting::all();
        // $data['game_bai'] = TopGame::with('post')->where('type', 1)->orderBy('id', 'ASC')->get();
        $data['top_game_info'] = SiteSetting::get();
        $data['game_bai'] = TopGame::with('post')->whereNotIn('home_feature',[0])->orderByRaw('CONVERT(order_by, SIGNED) asc')->get();
        $data['seo_data'] = initSeoData();
        $data['schema'] = getSchemaLogo().''.getLocalBusiness();
        return view('web.home.index', $data);
    }
}
 