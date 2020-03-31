<?php

use Illuminate\Database\Seeder;
use App\Invoice;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Invoice::create([
            'expiration_date' => '2008-07-30',
            'status' => 'new',
            'tax' => '20000',
            'amount' => '456321',
            'total' => '968565',
            'client_id' => '1',
            'seller_id' => '1'
        ]);

        factory(Invoice::class, 20)->create();
    }
}
