<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Intervention\Image\Constraint;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Comment;
class AdminPostsController extends AdminBaseController
{
    public function index(){
        $posts = Blog::latest()->take(5)->published()->get();
        return view('admin.layouts.posts.index',compact('posts'));
    }

    public function show($slug){
        $post = Blog::findBySlugOrFail($slug);
        //dd($post->author->name);
        return redirect()->route('post.show',$slug);
    }

    public function create(){
        $categories = Category::all();
        return view('admin.layouts.posts.create',compact('categories'));
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'meta_description' => 'required|min:3',
            'meta_keywords' => 'required',
            'photo' => 'required',
            'published_at' => 'nullable|date',
            'status' => 'required',
            'category_id' => 'required',
            'tag_names' => 'required',
            'featured' => '',
        ]);
        $published_at = '';
        if($data['status'] == 'PUBLISHED'){
            $published_at= Carbon::now();
        }elseif($data['status'] == 'PENDING'){
            $published_at = Carbon::parse($data['published_at'])->format('Y-m-d H:i');
        }

        $post = Blog::create([
            'title' => str::title($data['title']),
            'body' => $data['body'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'photo' => $data['photo'],
            'category_id' => $data['category_id'],
            'published_at' => $published_at,
            'featured' => isset($data['featured'])? 1 : 0,
            'allow_comments' => request()->input('allow_comments') ? 1 : 0
        ]);

        if($post->id != ""){
            $post->tag(strtolower($data['tag_names']));
            flash()->success('success', 'Post Added');
            /*event(new NewsLetter($post, 'post'));*/
            return redirect()->route('posts.index');
        }
        if(isset($data['photo'])){
            if(File::exists(public_path('storage/uploads/posts/photos/'.$data['photo']))) {
                File::delete(public_path('storage/uploads/posts/photos/'.$data['photo']));
            }
            if(File::exists(public_path('storage/uploads/posts/photos/thumbnails/'.$data['photo']))) {
                File::delete(public_path('storage/uploads/posts/photos/thumbnails/'.$data['photo']));
            }
        }
        return back();
    }

    public function edit($slug){
        $post = Blog::findBySlugOrFail($slug);
        $category = Category::pluck('name','id');
        return view('admin.layouts.posts.edit',compact('post','category'));
    }

    public function update(Request $request){
        $data = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'meta_description' => 'required|min:3',
            'meta_keywords' => 'required',
            'photo' => '',
            'published_at' => 'nullable|date',
            'status' => 'required',
            'category_id' => 'required',
            'tag_names' => '',
            'featured' => '',
        ]);
        $published_at = '';
        if($data['status'] == 'PUBLISHED'){
            $published_at= Carbon::now();
        }elseif($data['status'] == 'PENDING'){
            $published_at = Carbon::parse($data['published_at'])->format('Y-m-d H:i');
        }
        $post = Blog::findBySlugOrFail(request()->input('slug'));
        //dd($data['photo'] != $post->photo);
        if($data['photo'] != $post->photo){
            $this->removePhoto($post);
        }
        $updated = $post->update([
            'title' => str::title($data['title']),
            'body' => $data['body'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'photo' => $data['photo'],
            'category_id' => $data['category_id'],
            'published_at' => $published_at,
            'featured' => isset($data['featured'])? 1 : 0,
            'allow_comments' => $request->input('allow_comments') ? 1 : 0
        ]);
        dd($data);
        if($updated){
            $post->retag(strtolower($data['tag_names']));
            flash()->success('success', 'Post Updated');
            return redirect()->route('posts.index');
        }
        if(isset($data['photo'])){
            if(File::exists(public_path('storage/uploads/posts/photos/'.$data['photo']))) {
                File::delete(public_path('storage/uploads/posts/photos/'.$data['photo']));
            }
            if(File::exists(public_path('storage/uploads/posts/photos/thumbnails/'.$data['photo']))) {
                File::delete(public_path('storage/uploads/posts/photos/thumbnails/'.$data['photo']));
            }
        }
        return back();
    }

    public function destroy(){
        $ids = request()->input('ids');
        if(is_array(explode(",",$ids))){
            $post = DB::table("posts")->whereIn('id',explode(",",$ids))->delete();

            $this->removePhoto($post);
            $post->detag();
            //Post::destroy($ids);
            return response()->json(['success'=>"Posts Deleted successfully."]);
        }else {
            $post = Post::findOrFail($ids);
            $this->removePhoto($post);
            $post->detag();
            $post->delete();
            return response()->json(['success' => "Post Deleted successfully."]);
        }
    }

    public function upload(){
        $file = request()->file;
        $strippedName = str_replace(' ', '', $file->getClientOriginalName());
        $name = date('Y-m-d-H-i-s').'-'.pathinfo($strippedName, PATHINFO_FILENAME);

        $folder = '/uploads/posts/photos/';
        $small_image = Image::make($file)
            ->resize(640, 460)
            ->encode($file->getClientOriginalExtension(), 75);

        Storage::disk('public')->put($folder.'thumbnails/'.$name, $small_image, 'public');
        $large_image = Image::make($file)
            ->resize(960, 960, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->encode($file->getClientOriginalExtension(), 75);
        Storage::disk('public')->put($folder.$name, $large_image, 'public');
        $file_path = $folder.'thumbnails/'.$name;
        if(file_exists(public_path('storage/'.$folder.'thumbnails/'.$name))){
            return response()->json(['success'=>'Successfully uploaded new file!', 'file'=>$name, 'path'=>$file_path]);
        }
        return response()->json(['msg' => 'Unable to upload your file.']);
    }

    public function removePhoto($post){
        if(isset($post->photo)){
            if(File::exists(public_path('storage/uploads/posts/photos/'.$post->photo))) {
                File::delete(public_path('storage/uploads/posts/photos/'.$post->photo));
            }
            if(File::exists(public_path('storage/uploads/posts/photos/thumbnails/'.$post->photo))) {
                File::delete(public_path('storage/uploads/posts/photos/thumbnails/'.$post->photo));
            }
        }
    }

    public function comment(){
        $comments = Comment::where('commentable_type', 'posts')->latest()->get();
        return view('admin.layouts.post.comment',compact('comments'));
    }

    public function toggleComment(Request $request){
        $post = Post::find($request->input('id'));
        $checked = $request->get('isChecked');
        //dd($checked);
        if($checked == 'true'){
            //dd($checked);
            $update = $post->update([
                'allow_comments'=>false
            ]);
            // dd($update);
            return response()->json(['success' => "Comment Closed!."]);
        }else{
            //dd($checked);
            $post->update([
                'allow_comments'=>true
            ]);
            return response()->json(['success' => "Comment enabled!."]);
        }
    }
}
