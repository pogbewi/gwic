<?php

namespace App\Mail;

use App\Events\InvestmentRequestForm;
use App\Models\BusinessInvestment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;
use Carbon\Carbon;
class InvestmentRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private  $investment;

    public function __construct(BusinessInvestment $investment)
    {
        $this->investment = $investment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $request = $this->investment;
        $pdf = PDF::loadView('admin.email.business-request', compact('request'))->stream();
        return $this->markdown('emails.custom-form.form-notify')
            ->with([
                'title' => $this->investment->title,
                'firstname' => $this->investment->firstname,
                'lastname' => $this->investment->lastname,
                'phone' => $this->investment->phone,
                'businessname' => $this->investment->businessname,
                'email' => $this->investment->email,
                'address' => $this->investment->address,
                'address_two' => $this->investment->address_two,
                'nationality' => $this->investment->nationality,
                'operation_countries' => $this->investment->operation_countries,
                'city' => $this->investment->city,
                'gender' => $this->investment->gender,
                'amount_needed' => $this->investment->amount_needed,
                'status' => $this->investment->status,
                'agreed' => $this->investment->agreed ? 'Yes' : 'No',
            ])->attachData($pdf, 'investment-rrequest.pdf', [
                'mime' => 'application/pdf'
            ]);
    }
}
