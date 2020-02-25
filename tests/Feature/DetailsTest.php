<?php

namespace Test\Feature;

use App\Invoice;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailsTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUnauthenticatedUserCannotCreateDetails()
    {
        $invoice = factory(Invoice::class)->create();

        $this->get(route('details.create', $invoice))

            ->assertRedirect(route('login'));

    }

    public function testDetailCanBeCreated()
    {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();

        $response = $this->actingAs($user)->get(route('details.create', $invoice));

        $response->assertSuccessful();
        $response->assertSeeText('Products');
        $response->assertViewIs('invoices.details.create');

    }

    public function testUnauthenticatedUserCannotAddDetails(){

        $invoice = factory(Invoice::class)->create();
        $product = factory(Product::class)->create();


        $this->post(route('details.store', $invoice), [

            'invoice_id' => $invoice->id,
            'product_id' => $product->id,
            'quantity' => '1'

        ])
            ->assertRedirect(route('login'));
    }

    public function testDetailsCanBeAdded(){

        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();
        $product = factory(Product::class)->create();

        $this->actingAs($user)->post(route('details.store', $invoice),[

            'invoice_id' => $invoice->id,
            'product_id' => $product->id,
            'quantity' => '1'

        ])

            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('invoice_product', [
            'invoice_id' => $invoice->id,
            'quantity' => '1',
        ]);
    }



    public function testInvoiceContainsAListOfDetails(){

        $invoice = factory(Invoice::class)->create();
        $user = factory(User::class)->create();

        $response = $this->ActingAs($user)->get(route('invoices.show', $invoice));

        $response->assertSuccessful();
        $response->assertSeeText('Details');
        $response->assertViewIs('invoices.show');

    }

    public function testUnauthenticatedUserCannotDeleteDetails (){

        $invoice = factory(Invoice::class)->create();
        $product = factory(Product::class)->create();

        $this->delete(route('details.destroy', [$invoice, $product]))
            ->assertRedirect(route('login'));

        $this->assertDatabaseMissing('invoice_product', [
           'invoice_id' => $invoice->id,
           'quantity' => '1',
        ]);

    }

   /* public function testDetailsCanBeDeleted(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();
        $product = factory(Product::class)->create();


        $this->actingAs($user)->delete(route('details.destroy', [$invoice, $product]))
            ->assertRedirect(route('invoices.show', $invoice))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('invoice_product', [
            'invoice_id' => $invoice->id,
            'product_id' => $product->id,
            'quantity' => '1',
        ]);

    }*/




}
