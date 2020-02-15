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

    public function testUnauthenticatedUserCannotCreateInvoice()
    {

        $this->get(route('invoices.create'))

            ->assertRedirect(route('login'));

    }

    public function testInvoiceCanBeCreated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('invoices.create'));

        $response->assertSuccessful();
        $response->assertSeeText('Invoice');
        $response->assertViewIs('invoices.create');
    }


     public function testUnauthenticatedUserCannotStoreAInvoice()
     {
         $client = factory(Client::class)->create();
         $seller = factory(Seller::class)->create();

         $this->post(route('invoices.store'), [

             'client_id' => $client->id,
             'seller_id' => $seller->id,
             'expiration_date' => now()->addDays(30)->toDateString(),
             'status' => 'new',

         ])
             ->assertRedirect(route('login'));
     }

     public function testAInvoiceCanBeStored()
     {
         $user = factory(User::class)->create();
         $client = factory(Client::class)->create();
         $seller = factory(Seller::class)->create();


         $this->actingAs($user)->post(route('invoices.store'), [

             'client_id' => $client->id,
             'seller_id' => $seller->id,
             'expiration_date' => now()->addDays(30)->toDateString(),
             'status' => 'new',

         ])
             ->assertRedirect()
             ->assertSessionHasNoErrors();
     }


    public function testUnauthenticatedUserCannotEditInvoice()
    {
        $invoice = factory(Invoice::class)->create();

        $this->get(route('sellers.edit', $invoice))

            ->assertRedirect(route('login'));

    }

    public function testInvoiceCanBeEdited()
    {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();

        $response = $this->actingAs($user)->get(route('invoices.edit', $invoice));

        $response->assertSuccessful();
        $response->assertSeeText('Edit');
        $response->assertViewIs('invoices.edit');

    }


     public function testUnanthenticatedUserCannotUpdateAInvoice(){

       $invoice = factory(Invoice::class)->create();
       $client = factory(Client::class)->create();
       $seller = factory(Seller::class)->create();

       $this->put(route('invoices.update', $invoice), [
           'client_id' => $client->id,
           'seller_id' => $seller->id,
           'expiration_date' => now()->addDays(30)->toDateString(),
           'status' => 'new',
       ])
           ->assertRedirect()
           ->assertSessionHasNoErrors();

       $this->assertDatabaseHas('invoices', [
           'client_id' => $invoice->client_id,
           'status' => $invoice->status,
       ]);

     }

     public function testInvoiceCanBeUpdated()
     {

       $user = factory(User::class)->create();
       $invoice = factory(Invoice::class)->create();
       $client = factory(Client::class)->create();
       $seller = factory(Seller::class)->create();

       $this->actingAs($user)->put(route('invoices.update', $invoice), [
           'client_id' => $client->id,
           'seller_id' => $seller->id,
           'expiration_date' => now()->addDays(30)->toDateString(),
           'status' => 'new',
       ])
           ->assertRedirect()
           ->assertSessionHasNoErrors();
     }

     public function testUnautheticatedUserCannotDeleteAInvoice()
     {
         $invoice = factory(Invoice::class)->create();

         $this->delete(route('invoices.destroy', $invoice))
             ->assertRedirect(route('login'));

         $this->assertDatabaseHas('invoices', [
            'client_id' => $invoice->client_id,
             'status' => $invoice->status,
         ]);
     }

     public function testAInvoiceCanBeDeleted()
     {
        $user = factory(User::class)->create();
        $invoice = factory(Invoice::class)->create();

        $this->actingAs($user)->delete(route('invoices.destroy', $invoice))
            ->assertRedirect(route('invoices.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('invoices', [
            'client_id' => $invoice->client_id,
            'status' => $invoice->status,
        ]);
     }

     public function testUnauthenticatedUserCannotSeeDetailOfAInvoice()
    {

       $invoice = factory(Invoice::class)->create();

       $response = $this->get(route('invoices.show', $invoice));

       $response->assertRedirect(route('login'));

    }

     public function testCanSeeDetailsOfAInvoice()
     {
         $user = factory(User::class)->create();
         $invoice = factory(Invoice::class)->create();

         $response = $this->actingAs($user)->get(route('invoices.show', $invoice));

         $response->assertSuccessful();
         $response->assertSeeText($invoice->client->name);
         $response->assertSeeText($invoice->seller->name);

     }

}

