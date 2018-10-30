<?php

namespace App\Jobs;

use App\Events\InvestorForm;
use App\Models\Investor;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class InvestorJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $investor;

    public function __construct(Investor $investor)
    {
        $this->investor =$investor;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        event(new InvestorForm($this->investor));
    }
}