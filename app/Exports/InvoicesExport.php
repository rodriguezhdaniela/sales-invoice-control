<?php

namespace App\Exports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

    class InvoicesExport implements FromQuery, WithHeadings
{
    use Exportable;


    public function query()
    {
        return Invoice::query();
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
