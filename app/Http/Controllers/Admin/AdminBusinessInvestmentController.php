<?php

namespace App\Http\Controllers\Admin;

use App\Logic\InvestmentRequestExport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessInvestment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
class AdminBusinessInvestmentController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investment_requests = BusinessInvestment::orderBy('created_at', 'desc')->get();
        return view('admin.layouts.requests.index', compact('investment_requests'));
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
        $request = BusinessInvestment::find($id);
        $request->update([
            'viewed' => true
        ]);
        return view('admin.layouts.requests.show',compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessInvestment $businessInvestment)
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
    public function update(Request $request, BusinessInvestment $businessInvestment)
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
            $requests = DB::table("business_investments")->whereIn('id',explode(",",$ids))->delete();
            //Contact::destroy($ids);
            return response()->json(['success'=>"Business Investment Request Deleted successfully."]);
        }else {
            $request = Contact::findOrFail($ids);
            $request->delete();
            return response()->json(['success' => "Business Investment Request Deleted successfully."]);
        }
        //return response()->json(['error' => "Ooops error occured,try again."]);
    }

    public function toExcel(Request $request)
    {
        $ids = $request->input('ids');
        $reqs = DB::table('business_investments')->whereIn('id', $ids)->get();
        $reqData = [];
        foreach ($reqs as $req) {
            $reqData[] = [
                'ID' => $req->id,
                'Title' => $req->title,
                'First Name' => $req->firstname,
                'Last Name' => $req->lastname,
                'Phone' => $req->phone,
                'Business Name' => $req->businessname,
                'Email' => $req->email,
                'Address' => $req->address,
                'Address Two' => $req->address_two,
                'Nationality' => $req->nationality,
                'Countries Of Operations' => implode(',', json_decode($req->operation_countries)),
                'City' => $req->city,
                'Gender' => $req->gender,
                'Amount Needed' => $req->amount_needed,
                'Business Status' => $req->status,
                'Accepted Terms' => $req->email ? 'Accepted' : 'Rejected',
                'Date Sent' => Carbon::parse($req->created_at)->diffForHumans()
            ];

        }
        return (new Collection($reqData))->downloadExcel(
            'investment_request.xlsx',
            $writerType = null,
            $headings = true
        );
    }
}
