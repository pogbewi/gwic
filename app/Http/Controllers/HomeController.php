<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\Blog;
use Carbon\Carbon;
class HomeController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        $posts = Blog::where('published_at','<', Carbon::now())->orWhere('published_at', Carbon::now())->latest()->take(3)->get();
        return view('index',compact('testimonials', 'posts'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function construction()
    {
        return view('pages.construction');
    }

    public function faq()
    {
        return view('pages.faq');
    }

    public function terms()
    {
        return view('pages.terms');
    }
    public function policy()
    {
        return view('pages.policy');
    }

}
