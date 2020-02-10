<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\PaymentAttempts;
use Illuminate\Http\Request;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class PaymentAttemptsController extends Controller
{
    public function authenticationPtoP(Invoice $invoice, Request $request)
    {
        $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://test.placetopay.com/redirection/',
        ]);


        $reference = $invoice->id;
        $request2 = [
            "locale" => "es_CO",
            "buyer" => [
                "name" => $invoice->client->name,
                "email" => $invoice->client->email,
                "documentType" => $invoice->client->type_id,
                "document" => $invoice->client->personal_id,
                "mobile" => $invoice->client->phone_number,
                "address" => [
                    "street" => $invoice->client->address,
                    "city" => $invoice->client->city,
                    "state" => $invoice->client->state,
                    "postalCode" => $invoice->client->postal_code,
                    "country" => $invoice->client->country,

                ]
            ],

            'payment' => [
                'reference' => $reference,
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('payment.history', $invoice),  //SHOW invoces.show
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent'),
        ];

        $response = $placetopay->request($request2);
        //dd($response);
        if ($response->isSuccessful()) {

            $paymentAttempts = new PaymentAttempts;
            $paymentAttempts->invoice_id = $invoice->id;
            $paymentAttempts->requestId = $response->requestId();
            $paymentAttempts->processUrl = $response->processUrl();
            $paymentAttempts->status = $response->status()->status();
            $paymentAttempts->save();

            return redirect()->away($response->processUrl());

        } else {
            $response->status()->message();
        }

    }

    public function paymentHistory(Invoice $invoice)
    {
       $placetopay = new PlacetoPay([
            'login' => '6dd490faf9cb87a9862245da41170ff2',
            'tranKey' => '024h1IlD',
            'url' => 'https://test.placetopay.com/redirection/',
        ]);


       $paymentAttempts = DB::table('payment_attempts')->first();

        $response = $placetopay->query($paymentAttempts->requestId);

       if ($response->isSuccessful()) {
            // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

           if ($response->status()->isApproved()) {
                // The payment has been approved

                //preguntar porque este código no me da
                /*$paymentAttempts->update([
                'status' => 'approved'
                ]);*/

                DB::table('payment_attempts')
                    ->where('id', $paymentAttempts->id)
                    ->update(['status' => 'approved']);


               DB::table('invoices')
                    ->where('id', $invoice->id)
                    ->update(['status' => 'paid']);
            }
           //dd($paymentAttempts);

           /*return view("invoices.show", [
               'invoice' => $invoice,
               'response' => $response,
                dd($response),
            ]);*/

           /* return redirect()->route('invoices.show', $invoice, ['response' => $response])->With('success', __('Approved transaction'));*/

           return redirect()->route('invoices.show', $invoice)->With('success', __('Approved transaction'));

        } else {
            // There was some error with the connection so check the message
            //print_r
           return redirect()->route('invoices.show', $invoice)->With('error', __('failed transaction, There was some error with the connection'));
        }
    }


}
