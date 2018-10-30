<?php

namespace App\Listeners;

use App\Events\InvestmentRequestForm;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvestmentRequestMail;
class InvestmentRequestFormListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InvestmentRequestForm  $event
     * @return void
     */
    public function handle(InvestmentRequestForm $event)
    {
        $when = now()->addMinutes(10);
        Mail::to('jeremyhuston@globalwealthinvestmentcompany.com')
            ->later($when, new InvestmentRequestMail($event->model));
    }
}
