<?php
/**
 * Created by PhpStorm.
 * User: ANIMASHAUN DOLAPO
 * Date: 10/10/2018
 * Time: 11:29
 */

namespace App\Http\Controllers\Admin;


class DashboardController extends AdminBaseController
{

    public function index(){
        return view("admin.index");
    }

}
