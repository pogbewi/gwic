<?php

namespace App\Http\Controllers;

use App\Events\InvestorForm;
use App\Http\Requests\InvestorRequests;
use App\Jobs\InvestorJob;
use App\Models\Investor;
use Illuminate\Http\Request;
use PDF;
class InvestorController extends Controller
{
    /**
     * BusinessInvestmentController constructor.
     */
    public function __construct()
    {
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.investors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(InvestorRequests $investorRequests)
    {
        $data = $investorRequests->validate([
            'title' => 'required',
            'firstname' => 'required ',
            'lastname' => 'required ',
            'phone' => 'required ',
            'email' => 'required|email',
            'nationality' => 'required ',
            'gender' => 'required',
            'amount' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'viewed' => 'nullable'
        ]);
        //dd($request);
        $result = Investor::create($data);
        if($result->id != ''){
            InvestorJob::dispatch($result);
            return response(['success'=>'Your Investment Request form has been sent!.Thank you, We\'ll respond as soon as possible']);
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function show(Investor $investor)
    {
        //
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
    public function destroy(Investor $investor)
    {
        //
    }
}
