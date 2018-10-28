<?php

namespace App\Http\Controllers\Admin;

use App\Models\Investor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\BusinessInvestment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
class AdminInvestorsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investors = Investor::orderBy('created_at', 'desc')->get();
        return view('admin.layouts.investors.index', compact('investors'));
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
        $request = Investor::find($id);
        $request->update([
            'viewed' => true
        ]);
        return view('admin.layouts.investors.show',compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investor $investor)
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
    public function update(Request $request, Investor $investor)
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
            $requests = DB::table("investors")->whereIn('id',explode(",",$ids))->delete();
            //Contact::destroy($ids);
            return response()->json(['success'=>"Business Investor request Deleted successfully."]);
        }else {
            $request = Contact::findOrFail($ids);
            $request->delete();
            return response()->json(['success' => "Business Investment Request Deleted successfully."]);
        }
    }

    public function toExcel(Request $request)
    {
        $ids = $request->input('ids');
        $reqs = DB::table('investors')->whereIn('id', $ids)->get();
        $reqData = [];
        foreach ($reqs as $req) {
            $reqData[] = [
                'ID' => $req->id,
                'Title' => $req->title,
                'First Name' => $req->firstname,
                'Last Name' => $req->lastname,
                'Phone' => $req->phone,
                'Email' => $req->email,
                'Nationality' => $req->nationality,
                'Gender' => $req->gender,
                'Amount Willing' => $req->amount,
                'Date Sent' => Carbon::parse($req->created_at)->diffForHumans()
            ];

        }
        return (new Collection($reqData))->downloadExcel(
            'investor_request.xlsx',
            $writerType = null,
            $headings = true
        );
    }
}
