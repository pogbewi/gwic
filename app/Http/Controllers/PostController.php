<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Cviebrock\EloquentTaggable\Models\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class PostController extends Controller
{
    public function index(){

        $posts = Blog::where('published_at','<', Carbon::now())->orWhere('published_at', Carbon::now())->latest()->paginate(10);
        $popular = Blog::where('views', '>', 10)->latest()->take(5)->get();
        //dd($sermon->media->first()->type);
        $page_title = 'Church Blog Posts';
        $page_description = 'church blog posts';
        $page_keywords = 'blog,posts,inspirational,teaching,upliftment,development';
        return view('pages.blog.index',
            compact(
                'posts','popular','page_title',
                'page_description','page_keywords'
            ))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($slug){
        $post = Blog::findBySlugOrFail($slug);
        $post_id = 'testimony_'.$post->id;
        if(!Session::has($post_id)){
            $post->increment('views');
            Session::put($post_id, 1);
        }
        $popular = Blog::where('views', '>', 10)->latest()->take(5)->get();
        $latest = Blog::where('id', '!=', $post->id)->latest()->take(5)->get();
        $page_title = $post->title;
        $page_description = str_limit($post->meta_description, 75, '...');
        $page_keywords = $post->meta_keywords;
        $comments = $post->comments;
         $model = $post;
        return view('pages.blog.show',
            compact(
                'post','popular','latest','comments','model',
                'page_title','page_description','page_keywords'
            ));
    }

    public function tag($slug){
        $posts = Tag::findByName($slug)->posts->paginate(10);
        $page_title = 'Tag Posts';
        $page_description = 'Posts associated with'.Tag::findByName($slug)->name;
        $page_keywords = Tag::findByName($slug)->name;
        return view('pages.posts.tags',
            compact(
                'posts', 'slug','page_title',
                'page_description','page_keywords'
            ))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function comment(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'body' => 'required',
        ]);
        //dd(request()->all());

        $post = Blog::findBySlugOrFail(request()->input('slug'));
        $query = $post->comments()->create([
            'name' => $data['name'] ? $data['name'] : 'anonymous',
            'email' => $data['email'],
            'body' => $data['body']
        ]);
        if($query){
            return back()->with('success', 'Your comment Posted, waiting for moderation.Thank you!');
        }
        return back();
    }
}
