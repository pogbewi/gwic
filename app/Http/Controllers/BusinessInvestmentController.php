<?php

namespace App\Http\Controllers;

use App\Events\InvestmentRequestForm;
use App\Http\Requests\BusinessOwnerRequests;
use App\Jobs\InvestmentRequestJob;
use App\Models\BusinessInvestment;
use PDF;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;
class BusinessInvestmentController extends Controller
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
        $countries = new Countries();
        $all_countries = $countries->all();
        //dd($all_countries);
/*        foreach ($all_countries as $country){
            dd($country);
        }*/
        return view('pages.enlistments.create', compact('all_countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validateInvestmentForm(BusinessOwnerRequests $businessOwnerRequests){
        $data = $businessOwnerRequests->validate([
            'title' => 'required',
            'firstname' => 'required ',
            'lastname' => 'required ',
            'phone' => 'required ',
            'businessname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'address_two' => 'nullable',
            'nationality' => 'required ',
            'operation_countries' => 'required',
            'city' => 'required ',
            'gender' => 'required',
            'amount_needed' => 'required|regex:/^\d*(\.\d{1,2})?$/',
            'status' => 'required',
            'viewed' => 'nullable'
        ]);
        if(!empty($businessOwnerRequests->session()->get('investment'))){
            $businessOwnerRequests->session()->remove('investment');
        }
        $businessOwnerRequests->session()->put('investment', $data);

        return back();
    }

    public function store(BusinessOwnerRequests $businessOwnerRequests)
    {
        $businessOwnerRequests->validate([
            'agreed' => 'required'
        ]);
        if(!empty($businessOwnerRequests->session()->get('investment'))){
            $data = $businessOwnerRequests->session()->get('investment');
            $operation_countries = json_encode($data['operation_countries']);
            //dd($data);
            if(!empty($data)){
                $result = BusinessInvestment::create([
                    'title' => $data['title'],
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'phone' => $data['phone'],
                    'businessname' => $data['businessname'],
                    'email' => $data['email'],
                    'address' => $data['address'],
                    'address_two' => $data['address_two'],
                    'nationality' => $data['nationality'],
                    'operation_countries' => $operation_countries,
                    'city' => $data['city'],
                    'gender' => $data['gender'],
                    'amount_needed' => $data['amount_needed'],
                    'status' => $data['status'],
                    'agreed' => $businessOwnerRequests->input('agreed') ? 1 : 0
                ]);
                if ($result->id != ''){
                    InvestmentRequestJob::dispatch($result);
                }

                if($result->id != ''){
                    return response(['success'=>'Your Investment Request form has been sent!.Thank you, We\'ll respond as soon as possible']);
                }
            }
        }
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessInvestment $businessInvestment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BusinessInvestment  $businessInvestment
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
     * @param  \App\Models\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessInvestment $businessInvestment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BusinessInvestment  $businessInvestment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessInvestment $businessInvestment)
    {
        //
    }

}
