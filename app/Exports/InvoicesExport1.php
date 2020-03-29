<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoicesExport1 implements FromQuery, shouldQueue, WithHeadings
{
    use Exportable, Queueable, Dispatchable, InteractsWithQueue, SerializesModels;

    private $invoices;

    public function __construct($invoices)
    {
        $this->invoices = $invoices;
    }

    public function __sleep()
    {
        return[];
    }

    public function __wakeup()
    {
        $this->invoices = app()->make(Invoice::class);
    }


    public function query()
    {

        return $this->invoices;

    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
          'id',
          'Expiration Date',
          'Status',
          'Tax',
            'Amount',
            'total',
            'client id',
            'seller id',
            'expedition date',
            'received date'

        ];
    }

}
