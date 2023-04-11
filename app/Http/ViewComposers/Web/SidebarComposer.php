<?php

namespace App\Http\ViewComposers\Web;

use App\Models\Category;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\BoxNews;
class SidebarComposer
{
    public function compose(View $view)
    {
        // $data['categoryTree'] = Category::getTree();
        $data['new_post'] = Post::where('status', 1)->orderBy('id', 'desc')->limit(5)->get();
        
        $oneItem = BoxNews::find(3);
        if (!empty($oneItem)) {
            $oneItem = json_decode($oneItem->data);
            foreach ($oneItem as $key => $value) {
                $oneItem[$key]->item = Post::with('category')->where('status', 1)->where('category_id', $value->id)->orderBy('id', 'desc')->limit(6)->get();
            }
        }
        $data['sidebar'] = $oneItem;
        $view->with($data);
    }
}
