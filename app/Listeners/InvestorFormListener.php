<?php

namespace App\Listeners;

use App\Events\InvestorForm;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\InvestorRequestMail;
use Illuminate\Support\Facades\Mail;
class InvestorFormListener
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
     * @param  InvestorForm  $event
     * @return void
     */
    public function handle(InvestorForm $event)
    {
        Mail::to('jeremyhuston@globalwealthinvestmentcompany.com')
            ->queue(new InvestorRequestMail($event->model));
    }
}
