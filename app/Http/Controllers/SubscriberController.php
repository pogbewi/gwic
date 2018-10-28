<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
class SubscriberController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'name' => '',
            'email' => 'required | email'
        ]);

        $subscriber = Subscriber::create($data);
        if(isset($subscriber->id)){
            return response()->json(['success'=>'Subscription successful, You will start receiving updates from us soon']);
        }
        return back();
    }

    public function getUnsubscribe(){
        $page_title = 'Contact Us';
        $page_description = 'Contact us';
        $page_keywords = 'contact,our contacts';
        return view('emails.unsubscribed',compact('page_title','page_description','page_keywords'));
    }

    public function unsubscribe(Request $request){
        $email = $request->input('email');
        if($email != ''){
            $subscriber = Subscriber::where('email', $email)->first();
            if($subscriber != ''){
                $subscriber->delete();
                return back()->with('unsubscriber-success', 'Your email has been removed from our system,you can re-add again at anytime');
            }
            return back()->with('error', 'Gush!,Email not in our system');
        }
        return back();
    }
}
