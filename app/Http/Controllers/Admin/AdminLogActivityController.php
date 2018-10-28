<?php

namespace App\Http\Controllers\Admin;

use App\Http\LogHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LogActivity;
class AdminLogActivityController extends AdminBaseController
{
    /**

     * Create a new controller instance.

     *

     * @return void

     */

    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function myTestAddToLog()

    {

        LogHelper::addToLog('My Testing Add To Log.');

        dd('log insert successfully.');

    }


    /**

     * Show the application dashboard.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $logs = LogHelper::logActivityLists();
        dd($logs);

        return view('admin.layouts.site-info.index',compact('logs'));

    }
}
