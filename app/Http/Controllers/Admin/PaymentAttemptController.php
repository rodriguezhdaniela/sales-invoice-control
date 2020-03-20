<?php

namespace App\Http\Controllers\Admin;

use App\Invoice;
use App\PaymentAttempt;
use Dnetix\Redirection\Exceptions\PlacetoPayException;
use Dnetix\Redirection\PlacetoPay;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentAttemptController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param Invoice $invoice
     * @param Request $request
     * @param PlacetoPay $placetopay
     * @return RedirectResponse
     * @throws PlacetoPayException
     */
    public function paymentAttempt(Invoice $invoice, Request $request, PlacetoPay $placetopay)
    {
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
                    "city" => strval($invoice->client->city),
                    "state" => $invoice->client->state,
                    "postalCode" => $invoice->client->postal_code,
                    "country" => strval($invoice->client->country),
                ]
            ],

            'payment' => [
                'reference' => strval($reference),
                'amount' => [
                    'currency' => 'COP',
                    'total' =>$invoice->total,
                ],
            ],
            'expiration' => date('c', strtotime('+2 days')),
            'returnUrl' => route('payment.callback', $invoice),
            'ipAddress' => $request->ip(),
            'userAgent' => $request->header('User-Agent'),
        ];

        //store new instance of model PaymentAttempt
        $response = $placetopay->request($request2);
        //dd($response);

        $paymentAttempt = new PaymentAttempt;
        $paymentAttempt->invoice_id = $invoice->id;
        $paymentAttempt->requestId = $response->requestId();
        $paymentAttempt->processUrl = $response->processUrl();
        $paymentAttempt->status = 'pending';
        $paymentAttempt->save();


        //dd($response);
        if ($response->isSuccessful()) {
            $paymentAttempt->update([
                'status' => $response->status()->status(),
            ]);

            return redirect()->away($response->processUrl());
        } else {
            $response->status()->message();
        }
    }

    public function callBack(PlacetoPay $placetopay, Invoice $invoice)
    {
        $paymentAttempt = PaymentAttempt::where('invoice_id', $invoice->id)
            ->get();

        $paymentAttempt = end($paymentAttempt);
        $paymentAttempt = end($paymentAttempt);

        $response = $placetopay->query($paymentAttempt->requestId);

        $paymentAttempt->update([
            'status' => ucfirst(strtolower($response->status()->status()))
        ]);


        if ($response->isSuccessful()) {
            // In order to use the functions please refer to the Dnetix\Redirection\Message\RedirectInformation class

            if ($response->status()->isApproved()) {
                // The payment has been approved

                $invoice->update([
                    'status' => 'Paid'
                ]);

                return redirect()->route('invoices.show', $invoice)->With('success', __('Approved transaction'));
            } else {
                return redirect()->route('invoices.show', $invoice)->With('error', __('failed transaction'));
            }
        }
    }
}
