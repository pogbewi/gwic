<?php
if (!function_exists('setting')) {
    function setting($key, $default = null)
    {
        $s = app('App\Http\SettingsHelper');

        if (func_num_args() == 0) {
            return $s;
        }
        return $s->settings($key, $default);
    }

}
function prettyDate($date) {
    return date("M d, Y @h:i:s", strtotime($date));
}

function flash($title = null, $message = null) {
// Set variable $flash to fetch the Flash Class
// in Flash.php
    $flash = app('App\Http\Flash');

// If 0 parameters are passed in ($title, $message)
// then just return the flash instance.
    if (func_num_args() == 0) {
        return $flash;
    }

// Just return a regular flash->info message
    return $flash->info($title, $message);
}



