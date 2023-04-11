<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Post_Category;
use Sunra\PhpSimple\HtmlDomParser;

class ConvertController extends Controller
{
    public function post() {
        for ($i = 43; $i > 0; $i--) {
            $url = 'https://doithuongonline.club/wp-json/wp/v2/posts?page='.$i.'&per_page=10';
            $content_api = file_get_contents($url);
            $posts = json_decode($content_api);
            foreach ($posts as $post) {
                foreach ($post->categories as $key => $category_id) {
                    $data_update_post_category = [
                        'post_id' => $post->id,
                        'category_id' => $category_id
                    ];
                    if ($key == 0) $data_update_post_category['is_primary'] = 1;
                    Post_Category::insert($data_update_post_category);
                }
                #
                $check_exist = Post::find($post->id);
                if ($check_exist) continue;
                if ($post->status != 'publish') continue;
                #
                $content = $post->content->rendered;
                $content = HtmlDomParser::str_get_html($content);
                $content_remove = $content->find('.kk-star-ratings', 0);
                $content = str_replace($content_remove, '', $content);
                #
                $content_remove = $content->find('#ez-toc-container', 0);
                $content = str_replace($content_remove, '', $content);
                #
                $data_update = [];
                $data_update['id'] = $post->id;
                $data_update['title'] = $post->title->rendered;
                $data_update['slug'] = $post->slug;
                $data_update['description'] = '';
                $data_update['content'] = $content;
                $data_update['thumbnail'] = $post->yoast_head_json->og_image[0]->url;
                $data_update['meta_title'] = $post->yoast_head_json->og_title;
                $data_update['meta_description'] = !empty($post->yoast_head_json->description) ? $post->yoast_head_json->description : '';
                $data_update['meta_keyword'] = '';
                $data_update['created_time'] = date('Y-m-d H:i:s', strtotime($post->date));
                $data_update['updated_time'] = date('Y-m-d H:i:s', strtotime($post->modified));
                $data_update['displayed_time'] = date('Y-m-d H:i:s', strtotime($post->date));
                $data_update['category_id'] = $post->categories[0];
                $data_update['user_id'] = $post->author;
                $data_update['status'] = 1;
                Post::insert($data_update);
            }
        }
    }

    public function category() {
        $url = 'https://doithuongonline.club/wp-json/wp/v2/categories?page=1&per_page=100';
        $content = file_get_contents($url);
        $categories = json_decode($content);
        foreach ($categories as $category) {
            $check_exist = Category::find($category->id);
            if ($check_exist) continue;
            if ($category->taxonomy != 'category') continue;
            $data_update = [];
            $data_update['id'] = $category->id;
            $data_update['parent_id'] = $category->parent;
            $data_update['title'] = $category->name;
            $data_update['slug'] = $category->slug;
            $data_update['description'] = '';
            $data_update['content'] = $category->description;
            $data_update['thumbnail'] = '';
            $data_update['meta_title'] = $category->yoast_head_json->og_title;
            $data_update['meta_description'] = !empty($category->yoast_head_json->description) ? $category->yoast_head_json->description : '';
            $data_update['meta_keyword'] = '';
            $data_update['status'] = 1;
            Category::insert($data_update);
        }
    }

    public function topGame() {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        echo $id;
        $post = Post::where('id', '>', $id)->whereNull('optional')->orderBy('id', 'ASC')->limit(1)->first();
        $url = 'https://doithuongonline.club/'.$post->slug.'/';
        $content = HtmlDomParser::file_get_html($url);
        if ($content->find('.top-game-post .game_logo img', 0)) {
            $logo = $content->find('.top-game-post .game_logo img', 0)->src;
            $title_des = $content->find('.top-game-post .game_meta h3', 0)->innertext();
            $title_des = explode(' - ', $title_des);
            $title = $title_des[0];
            $des = $title_des[1];
            $link = $content->find('.top-game-post .game_button a.btn_bet', 0)->href;
            if ($link == 'https://bethu.club/') $link = '';
            $data['name'] = $title;
            $data['logo'] = $logo;
            $data['link'] = $link;
            $data['description'] = $des;
            Post::where('id', $post->id)->update(['optional'=> json_encode($data)]);
        }
        header("Refresh:0; url=/admin/convert/topGame?id=".$post->id);
    }

    public function removeMucLuc() {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        echo $id;
        $post = Post::where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->first();
        $content = HtmlDomParser::str_get_html($post->content);
        if ($content->find('#ez-toc-container', 0)) {
            $content_remove = $content->find('#ez-toc-container', 0);
            $post->content = str_replace($content_remove, '', $post->content);
            Post::where('id', $post->id)->update(['content'=> $post->content]);
        }
        header("Refresh:0; url=/admin/convert/removeMucLuc?id=".$post->id);
    }
    //UPDATE post SET thumbnail = REPLACE(thumbnail, 'https://i0.wp.com/doithuongonline.club/wp-content/uploads', '/upload')
    //update post set thumbnail = replace(thumbnail, 'https://doithuongonline.club/wp-content/uploads', '/upload')

    public function fixImage() {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        echo $id;
        $post = Post::where('id', '>', $id)->orderBy('id', 'ASC')->limit(1)->first();
        $thumbnail = $post->thumbnail;
        $thumbnail = explode('?', $thumbnail);
        $thumbnail = $thumbnail[0];
        Post::where('id', $post->id)->update(['thumbnail'=> $thumbnail]);
        header("Refresh:0; url=/admin/convert/fixImage?id=".$post->id);
    }

    public function fixTopGame() {
        $id = !empty($_GET['id']) ? $_GET['id'] : 0;
        echo $id;
        $post = Post::where('id', '>', $id)->whereNotNull('optional')->orderBy('id', 'ASC')->limit(1)->first();
        $optional = $post->optional;
        $optional = str_replace('https:\/\/doithuongonline.club\/wp-content\/uploads', '\/upload', $optional);
        Post::where('id', $post->id)->update(['optional'=> $optional]);
        header("Refresh:0; url=/admin/convert/fixTopGame?id=".$post->id);
    }
}
