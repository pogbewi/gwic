<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Intervention\Image\Constraint;
class AdminTestimonialsController extends AdminBaseController
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        /*flash()->success('error', 'event created');*/
        return view('admin.layouts.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.layouts.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'from' => 'required',
            'name' => 'required',
            'body' => 'required',
            'meta_description' => 'required|min:3',
            'meta_keywords' => 'required',
            'tag_names' => 'string',
            'status' => 'required',
            'published_at' => 'nullable|date',
            'photo' => 'required',
            'allow_comments' => ''
        ]);
        $published_at = '';
        if($data['status'] == 'PUBLISHED'){
            $published_at= Carbon::now();
        }elseif($data['status'] == 'PENDING'){
            $published_at = Carbon::parse($data['published_at'])->format('Y-m-d H:i');
        }
        $testimony = Testimonial::create([
            'from' => str::title($data['from']),
            'name' => str::title($data['name']),
            'body' => $data['body'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'published_at' => $published_at,
            'photo' => $data['photo'],
            'allow_comments' => request()->input('allow_comments') ? 1 : 0
        ]);

        //dd($data);

        if(isset($testimony->id)){
            $testimony->tag(strtolower($data['tag_names']));
            flash()->success('success', $testimony->subject.'testimony created');
            /*event(new NewsLetter($testimony, 'testimony'));*/
            return redirect()->route('testimonials.index');
        }
        return redirect()->back();

    }

    public function show($slug)
    {
        $testimony = Testimonial::findBySlugOrFail($slug);
        return view('admin.layouts.testimonials.show',compact('testimony'));

    }

    public function edit($slug)
    {
        $testimonial = Testimonial::findBySlugOrFail($slug);
        return view('admin.layouts.testimonials.edit',compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'from' => 'required',
            'name' => 'required',
            'body' => 'required',
            'meta_description' => 'required|min:3',
            'meta_keywords' => 'required',
            'tag_names' => '',
            'status' => 'required',
            'published_at' => 'nullable|date',
            'photo' => 'required',
            'allow_comments' => ''
        ]);
        $published_at = '';
        if($data['status'] == 'PUBLISHED'){
            $published_at= Carbon::now();
        }elseif($data['status'] == 'PENDING'){
            $published_at = Carbon::parse($data['published_at'])->format('Y-m-d H:i');
        }
        $testimony = Testimonial::findBySlugOrFail(request()->input('slug'));
        if($data['photo'] != $testimony->photo){
            $this->removePhoto($testimony);
        }
        $updated= $testimony->update([
            'from' => str::title($data['subject']),
            'name' => str::title($data['name']),
            'body' => $data['body'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'published_at' => $published_at,
            'photo' => $data['photo'],
            'allow_comments' => request()->input('allow_comments') ? 1 : 0
        ]);


        if($updated){
            $testimony->retag(strtolower($data['tag_names']));
            flash()->success('success', $testimony->subject.'testimony updated');
            return redirect()->route('testimonials.index');
        }
        return redirect()->back();
    }

    public function destroy($slug)
    {
        $ids = request()->input('ids');
        if(is_array(explode(",",$ids))){
            $testimony = DB::table("testimonials")->whereIn('id',explode(",",$ids))->delete();
            $this->removePhoto($testimony);
            //Testimony::destroy($ids);
            return response()->json(['success'=>"Testimony Deleted successfully."]);
        }else {
            $testimony = Testimony::findBySlug($slug);
            $this->removePhoto($testimony);
            $testimony->delete();
            return response()->json(['success' => "Testimony Deleted successfully."]);
        }

    }

    public function upload(){
        $file = request()->file;
        $strippedName = str_replace(' ', '', $file->getClientOriginalName());
        $name = date('Y-m-d-H-i-s').'-'.pathinfo($strippedName, PATHINFO_FILENAME);

        $folder = '/uploads/testimonies/images/';
        $small_image = Image::make($file)
            ->resize(540, 480, function (Constraint $constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
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

    public function removePhoto($testimony){
        if(isset($testimony->photo)){
            if(File::exists(public_path('storage/uploads/testimonies/images/'.$testimony->photo))) {
                File::delete(public_path('storage/uploads/testimonies/images/'.$testimony->photo));
            }
            if(File::exists(public_path('storage/uploads/testimonies/images/thumbnails/'.$testimony->photo))) {
                File::delete(public_path('storage/uploads/testimonies/images/thumbnails/'.$testimony->photo));
            }
        }
    }
}
