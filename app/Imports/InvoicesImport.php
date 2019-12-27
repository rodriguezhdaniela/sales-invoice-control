<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;

abstract class InvoicesImport implements ToModel, WithProgressBar
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([

            'id' => $row[0],
            'expedition_date' => $row[1],
            'receipt_date' => $row[2],
            'expiration_date' => $row[3],
            'status' => $row[4],
            'tax' => $row[5],
            'amount' => $row[6],
            'total' => $row[7],
            'client_id' => $row[8],
            'seller_id' => $row[9],

        ]);
    }
}
