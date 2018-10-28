<?php
/**
 * Created by PhpStorm.
 * User: ANIMASHAUN DOLAPO
 * Date: 23/10/2018
 * Time: 15:59
 */

namespace App\Http;


class Flash
{
    public function create($title, $message, $level, $key = 'flash_message')
    {
        return session()->flash($key, [
            'title' => $title,
            'message' => $message,
            'level' => $level
        ]);
    }


    /**
     * Display the success flash message icon.
     *
     * @param $title
     * @param $message
     * @return mixed
     */
    public function success($title, $message) {
        return $this->create($title, $message, 'success');
    }


    /**
     * Display the error flash message icon.
     *
     * @param $title
     * @param $message
     * @return mixed
     */
    public function danger($title, $message) {
        return $this->create($title, $message, 'danger');
    }


    public function error($title, $message) {
        return $this->create($title, $message, 'warning');
    }


    /**
     * Display the info flash message icon.
     *
     * @param $title
     * @param $message
     * @return mixed
     */
    public function info($title, $message) {
        return $this->create($title, $message, 'info');
    }

    /**
     * Display the overlay flash message.
     *
     * @param $title
     * @param $message
     * @param string $level
     * @return mixed
     */
    public function overlay($title, $message, $level = 'info') {
        return $this->create($title, $message, $level, 'flash_message_overlay');
    }


    /**
     *  Display the custom overlay Error flash message.
     *
     * @param $title
     * @param $message
     * @param string $level
     * @return mixed
     */
    public function customErrorOverlay($title, $message, $level = 'error') {
        return $this->create($title, $message, $level, 'flash_message_custom_error_overlay');
    }
}
