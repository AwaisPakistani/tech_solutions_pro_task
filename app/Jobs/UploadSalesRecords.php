<?php

namespace App\Jobs;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue, SerializesModels};

use App\Imports\SalesImport;
use Maatwebsite\Excel\Facades\Excel;
class UploadSalesRecords implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $filePath
    ) {}

    /**
     * Execute the job.
     */
    public function handle()
    {
        Excel::import(
            new SalesImport(),
            $this->filePath
        );
    }
}
