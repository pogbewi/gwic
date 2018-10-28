<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
class TestimonyController extends Controller
{
    public function index(){
        $testimonials = Testimonial::where('published_at','<', Carbon::now())->orWhere('published_at', Carbon::now())->latest()->paginate(10);
        $page_title = 'Testimonies';
        $page_description = 'Testimonies From Individuals';
        $page_keywords = 'testimonies,miracles,upliftment,promotions,blessings,graced';
        return view('pages.testimony.index',
            compact(
                'testimonials','page_title',
                'page_description','page_keywords'
            ))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show($slug){
        $testimonial = Testimonial::findBySlugOrFail($slug);
        $testimonial_id = 'testimonial_'.$testimonial->id;
        if(!Session::has($testimonial_id)){
            $testimonial->increment('views');
            Session::put($testimonial_id, 1);
        }
        $popular = Testimonial::where('views', '>', 10)->latest()->take(5)->get();
        $latest = Testimonial::where('id', '!=', $testimonial->id)->latest()->take(5)->get();
        $page_title = $testimonial->name;
        $page_description = str_limit($testimonial->meta_description, 75, '...');
        $page_keywords = $testimonial->meta_keywords;
        return view('pages.testimonies.show',
            compact(
                'testimonial', 'popular','latest',
                'page_title','page_description',
                'page_keywords'
            ));
    }
}
