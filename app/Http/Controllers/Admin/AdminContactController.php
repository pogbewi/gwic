<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class AdminContactController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_messages = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.layouts.contact.index', compact('contact_messages'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        $contact->update([
            'read' => true
        ]);
        return view('admin.layouts.contact.show',compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $ids = request()->input('ids');
        if(is_array(explode(",",$ids))){
            $contact = DB::table("contacts")->whereIn('id',explode(",",$ids))->delete();
            //Contact::destroy($ids);
            return response()->json(['success'=>"Contact Deleted successfully."]);
        }else {
            $contact = Contact::findOrFail($ids);
            $contact->delete();
            return response()->json(['success' => "Contact Deleted successfully."]);
        }

    }
}
