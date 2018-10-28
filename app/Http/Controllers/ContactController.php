<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{

    /**
     * ContactController constructor.
     */
    public function __construct()
    {
    }

    public function index(){
        $page_title = 'Contact Us';
        $page_description = 'Contact us';
        $page_keywords = 'contact,our contacts';
        return view('pages.contact',compact('page_title','page_description','page_keywords'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'phone' => 'numeric',
            'email' => 'required|email',
            'subject' => 'required|min:2|max:255',
            'message' => 'required|min:5',
        ]);
        $contact = Contact::create($data);
        if($contact->id != ''){
            return response(['success'=>'Your message has been sent!.Thank you, We\'ll respond as soon as possible']);
        }
        return back();
    }
}
