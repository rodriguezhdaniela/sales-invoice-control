<?php

namespace App\Imports;

use App\Invoice;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class InvoicesImport implements ToModel,  WithHeadingRow, WithValidation
{
    use Importable;

    /**
     * @param array $row
     *
     * @return Invoice|null
     */
    public function model(array $row)
    {
        return new Invoice([
            'expiration_date' => $row['expiration_date'],
            'status' => $row['status'],
            'tax' => $row['tax'],
            'amount' => $row['amount'],
            'total' => $row['total'],
            'client_id' => $row['client_id'],
            'seller_id' => $row['seller_id'],

        ]);
    }



    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return[

            'expiration_date' => 'required|after:tomorrow',
            'status' => 'required|string|in:new,received,paid,cancelled',
            'tax' => 'required|numeric|min:50',
            'amount' => 'required|numeric|min:50',
            'total' => 'required|numeric|min:50',
            'client_id' => 'required|numeric|exists:clients,id',
            'seller_id' => 'required|numeric|exists:sellers,id',

        ];
    }
}
