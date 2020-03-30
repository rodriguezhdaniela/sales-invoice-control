<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Invoice;

class PaymentAttemptsTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUnauthenticatedUserCannotStoreAPaymentAttempt()
    {
        $invoice = factory(Invoice::class)->create();

        $response = $this->post(route('payment', $invoice), [

            "locale" => "es_CO",
            'ipAddress' => "4556516",

            'payment' => [
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total,
                ],
            ],

        ]);

        $response->assertRedirect(route('login'));
    }

    public function testAPaymentAttemptCanBeStored()
    {
        $invoice = factory(Invoice::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post(route('payment', $invoice), [

            "locale" => "es_CO",
            'ipAddress' => "4556516",
            'invoice_id' => $invoice->id,

            'payment' => [
                'amount' => [
                    'currency' => 'COP',
                    'total' => $invoice->total,
                ],
            ],

        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();

        $this->assertDatabaseHas('payment_attempts', [
            'invoice_id' => $invoice->id,
            'status' => 'ok',
        ]);
    }

    public function testUnauthenticatedUserCannotAccessToCallback()
    {
        $invoice = factory(Invoice::class)->create();

        $response = $this->get(route('payment.callback', $invoice));

        $response->assertRedirect(route('login'));
    }

    /* public function testAuthenticatedUserCanAccessToCallback()
     {
         $this->withoutExceptionHandling();

         $invoice = factory(Invoice::class)->create();
         $user = factory(User::class)->create();

         $response = $this->actingAs($user)->get(route('payment.callback', $invoice));

         $response->assertOk();
     }*/
}
