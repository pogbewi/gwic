<?php

namespace App\Mail;

use App\Models\Investor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;
class InvestorRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    private  $investor;
    public function __construct(Investor $investor)
    {
        $this->investor = $investor;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = $this->investor;
        $pdf = PDF::loadView('admin.email.investor-request', compact('request'))->stream();
        return $this->markdown('emails.custom-form.form-notify')
            ->with([
                'title' => 'required',
                'firstname' => 'required ',
                'lastname' => 'required ',
            ])->attachData($pdf, $this->investor->firstname.'.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
