<?php

namespace App\Jobs;

use App\Models\BusinessInvestment;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Events\InvestmentRequestForm;
class InvestmentRequestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $investment;

    public function __construct(BusinessInvestment $investment)
    {
        $this->investment =$investment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new InvestmentRequestForm($this->investment));
    }
}
