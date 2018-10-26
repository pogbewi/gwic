<?php
/**
 * Created by PhpStorm.
 * User: ANIMASHAUN DOLAPO
 * Date: 26/10/2018
 * Time: 17:51
 */

namespace App\Http;

use Illuminate\Support\Facades\Request;
use App\Models\LogActivity;
class LogHelper
{
    public static function addToLog($subject)

    {

        $log = [];

        $log['subject'] = $subject;

        $log['url'] = Request::fullUrl();

        $log['method'] = Request::method();

        $log['ip'] = Request::ip();

        $log['agent'] = Request::header('user-agent');

        $log['user_id'] = auth()->check() ? auth()->user()->id : 1;

        LogActivity::create($log);

    }


    public static function logActivityLists()

    {

        return LogActivity::latest()->get();

    }
}
