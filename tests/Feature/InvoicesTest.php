<?php

namespace Tests\Feature;

use App\Invoice;
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
         $this->post(route('invoices.store'), [

             'expedition_date' => '28/12/2019',
             'client_id' => 'personal id',
             'seller_id' => 'personal id',
             'expiration_date' => '29/12/2019',
             'status' => 'new',

         ])
             ->assertRedirect(route('login'));
     }

     public function testAInvoiceCanBeCreated()
     {
         $user = factory(User::class)->create();


         $this->actingAs($user)->post(route('invoices.store'), [

             'expedite_date' => '30/12/2019',
             'client_id' => '45678945',
             'seller_id' => '45612315',
             'expiration_date' => '31/12/2019',
             'status' => 'new',

         ])
             ->assertRedirect()
             ->assertSessionHasNoErrors();
     }

}

