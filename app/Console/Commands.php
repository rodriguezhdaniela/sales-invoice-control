<?php

namespace App\Console\Commands;

use App\Imports\InvoicesImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    protected $signature = 'import:excel';

    protected $description = 'Laravel Excel importer';

    public function handle()
    {
        $this->output->title('Starting import');
        // (new InvoicesImport)->withOutput($this->output)->import('invoices.xlsx');
        $this->output->success('Import successful');
    }
}
