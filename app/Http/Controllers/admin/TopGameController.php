<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Request;
use Redirect;
// use App\Models\TopGame;
use App\Models\TopGameInfo;
use App\Models\Post;
use App\Models\TopGameNew as Topgame;
// use App\Models\TopGame

class TopGameController extends Controller
{
    public function __construct()
    {

    }

    public function index() {
        $data['listItem'] = TopGame::orderBy('order_by', 'ASC')->get();

        return view('admin.top_game.list', $data);
    }

    public function category($category_id = 0){
        $data['listItem'] = TopGame::with('post')->where('category_id', $category_id)->orderBy('order_by', 'ASC')->get();
        $data['category_id'] = $category_id;
        $data['listCategory'] = Category::all()->sortByDesc('displayed_time');
        if (!empty(Request::post())) {
            $topgame_id = Request::post()['post_id'] ?? null;
            TopGame::where('category_id', $category_id)->delete();
            if ($topgame_id) foreach($topgame_id as $k => $tid){
                $post = Post::find($tid);
                $optional = json_decode($post->optional);
                $name = $optional->name ?? '';
                TopGame::updateOrInsert(['post_id' => $tid, 'category_id' => $category_id], ['name' => $name, 'order_by' => $k + 1, 'home_feature' => 0]);
            }
            
            return Redirect::to('/admin/top_game/category/916');
        }
        return view('admin.top_game.category', $data);
    }
    public function update($id = 0,$home_feature = 0) {
        $data['category_select_id'] = 0;
        $data['home_feature'] =  $home_feature;
        if (!empty($type)){
            $data['category_select_id'] = $type;
        }
        if ($id > 0) {
            $oneItem = TopGame::findOrFail($id);
            $data = json_decode($oneItem->content, 1);
            $data['category_select_id'] = $oneItem->type;
            $data['home_feature'] = $oneItem->home_feature;
            $data['oneItem'] = $oneItem;
        }
        // dd($data);
        $data['category'] = Category::all()->sortByDesc('displayed_time');

        if (!empty(Request::post())) {
            $post_data['content'] = json_encode(Request::post()['content']);
            if(!empty(Request::post()['category']))
            {
                $post_data['type'] = Request::post()['category'];
                
            }else
            {
                $post_data['type'] = 0;  
            }
            $post_data['name'] = Request::post()['name'];
            // $post_data['post_id'] = Request::post()['post_id'];
            $post_data['order_by'] = Request::post()['order_by'];
            $post_data['home_feature'] = $home_feature;
            TopGame::updateOrInsert(['id' => $id], $post_data);
            if($data['home_feature']!=null)
            {
                return Redirect::to('/admin/top_game/home_feature');
            }
            return Redirect::to('/admin/top_game/category/916');
        }
        return view('admin.top_game.update', $data);
    }
    public function delete($id) {
        TopGame::destroy($id);
        return back();
    }
    public function home(){
        $data['listItem'] = TopGame::with('post')->whereNotNull('home_feature')->whereNotIn('home_feature', [0])->orderBy('home_feature', 'ASC')->get();

        if (!empty(Request::post())) {
            $topgame_id = Request::post()['post_id'];
            foreach($topgame_id as $k => $tid){
                TopGame::updateOrInsert(['id' => $tid], ['home_feature' => $k +1]);
            }
            
            return Redirect::to('/admin/top_game/home_feature');
        }
        
        return view('admin.top_game.index', $data);
    }
}
