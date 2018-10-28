<?php
/**
 * Created by PhpStorm.
 * User: ANIMASHAUN DOLAPO
 * Date: 11/10/2018
 * Time: 11:38
 */

namespace App\Http;


class SettingsHelper
{
    public function settings($key, $default){
        $setting = Setting::where('key', $key)->first();
        if($setting != null){
            return $setting->value;
        };
        return $default;
    }
}
