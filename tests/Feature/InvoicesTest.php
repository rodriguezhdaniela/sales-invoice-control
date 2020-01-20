<?php

namespace Tests\Feature;

use App\Client;
use App\Invoice;
use App\Seller;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InvoicesTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUnauthenticatedUserCannotAccessToInvoicesList()
    {
        $response = $this->get(route('invoices.index'));

        $response->assertRedirect(route('login'));
    }

     public function testAuthenticatedUserHasAccessToInvoiceList()
     {
         $user = factory(User::class)->create();

         $this->actingAs($user)->get(route('invoices.index'))->assertSuccessful();

         $this->assertAuthenticatedAs($user);
     }

      public function testInvoiceListContainsAListOfInvoice()
      {
          $user = factory(User::class)->create();

          $response = $this->actingAs($user)->get(route('invoices.index'));

          $response->assertSuccessful();
          $response->assertViewHas('invoices');
          $response->assertViewIs('invoices.index');

      }

     public function testUnauthenticatedUserCannotCreateAInvoice()
     {
         $client = factory(Client::class)->create();
         $seller = factory(Seller::class)->create();

         $this->post(route('invoices.store'), [

             'expiration_date' => now()->addDays(30)->toDateString(),
             'client_id' => $client->id,
             'seller_id' => $seller->id,
             'status' => 'new',

         ])
             ->assertRedirect(route('login'));
     }

     public function testAInvoiceCanBeCreated()
     {
         $user = factory(User::class)->create();
         $client = factory(Client::class)->create();
         $seller = factory(Seller::class)->create();


         $this->actingAs($user)->post(route('invoices.store'), [

             'expiration_date' => now()->addDays(30)->toDateString(),
             'client_id' => $client->id,
             'seller_id' => $seller->id,
             'status' => 'new',

         ])
             ->assertRedirect()
             ->assertSessionHasNoErrors();

         $this->assertDatabaseHas('invoices', [
             'status' => 'new',
             'seller_id' => $seller->id,
         ]);
     }

     public function testUnAuthenticatedUserCannotUpdateAInvoice()
     {


         $client = factory(Client::class)->create();
         $seller = factory(Seller::class)->create();
         $invoice = factory(Invoice::class)->create();

         $this->put(route('invoices.update', $invoice), [

             'expiration_date' => now()->addDays(30)->toDateString(),
             'status' => 'new',
             'client_id' => $client->id,
             'seller_id' => $seller->id,

         ])
             ->assertRedirect(route('login'));

         $this->assertDatabaseHas('invoices', [
             'status' => 'new',
             'seller_id' => $seller->id,
         ]);
     }


    /*public function testAInvoiceCanBeUpdated()
     {
         $client = factory(Client::class)->create();
         $seller = factory(Seller::class)->create();
         $user = factory(User::class)->create();
         $invoice = factory(Invoice::class)->create();

         $this->actingAs($user)->put(route('invoices.update', $invoice),[
             'expiration_date' => now()->addDays(30)->toDateString(),
             'status' => 'new',
             'client_id' => $client->id,
             'seller_id' => $seller->id,
         ])
             ->assertRedirect()
             ->assertSessionHasNoErrors();

         $this->assertDatabaseHas('invoices', [
             'status' => 'new',
             'seller_id' => $seller->id,
         ]);
     }

     public function testUnauthenticatedUserCannotDeleteAInvoice()
     {

        $invoice = factory(Invoice::class)->create();

        $this->delete(route('invoices.destroy', $invoice))
            ->assertRedirect(route('login'));

     }

    public function testAInvoiceCanBEDeleted()
    {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();


        $this->actingAs($user)->delete(route('invoices.destroy', $invoice))
            ->assertRedirect(route('invoices.index'))
            ->assertSessionHasNoErrors();


    }*/


}

