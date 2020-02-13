<?php

namespace Tests\Feature;

use App\City;
use App\Client;
use App\Country;
use App\State;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUnauthenticatedUserCannotAccessToClientsList()
    {
        $response = $this->get(route('clients.index'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserHasAccessToClientList()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('clients.index'))->assertSuccessful();

        $this->assertAuthenticatedAs($user);
    }

    public function testClientListContainsAListOfClients()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('clients.index'));

        $response->assertSuccessful();
        $response->assertViewHas('clients');
        $response->assertViewIs('clients.index');

    }

    public function testUnauthenticatedUserCannotCreateClient()
    {

        $this->get(route('clients.create'))

            ->assertRedirect(route('login'));

    }

    public function testClientCanBeCreated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('clients.create'));

        $response->assertSuccessful();
        $response->assertSeeText('Client');
        $response->assertViewIs('clients.create');

    }


    public function testUnauthenticatedUserCannotStoreAClient()
    {

        $this->post(route('clients.store'), [
            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Client Name',
            'address' => 'Test Client address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
            'country_id' => '1',
            'state_id' => '1',
            'city_id' => '1',
            'postal_code' => '456123',
        ])
            ->assertRedirect(route('login'));
    }

    public function testAClientCanBeStored()
    {
        $user = factory(User::class)->create();
        $city = factory(City::class)->create();
        $state = factory(State::class)->create();
        $country = factory(Country::class)->create();


        $this->actingAs($user)->post(route('clients.store'), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Client Name',
            'address' => 'Test Client address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
            'city_id' => $city->id,
            'country_id' => $country->id,
            'state_id' => $state->id,
            'postal_code' => '456123',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', [
                'name' => 'Test Client Name',
                'email' => 'test@email.com',
        ]);
    }

    public function testUnauthenticatedUserCannotEditClient()
    {
        $client = factory(Client::class)->create();

        $this->get(route('clients.edit', $client))

            ->assertRedirect(route('login'));

    }

    public function testClientCanBeEdited()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)->get(route('clients.edit', $client));

        $response->assertSuccessful();
        $response->assertSeeText('Edit');
        $response->assertViewIs('clients.edit');

    }


    public function testUnauthenticatedUserCannotUpdateAClient()
    {
        $client = factory(Client::class)->create();

        $this->put(route('clients.update', $client), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Client Name',
            'address' => 'Test Client address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
            'country_id' => '1',
            'state_id' => $client->state_id,
            'city_id' => $client->city_id,
            'postal_code' => '456123',
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('clients', [
            'name' => $client->name,
            'email' => $client->email,
        ]);
    }

    public function testAClientCanBeUpdated()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();


        $this->actingAs($user)->put(route('clients.update', $client), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Client Name',
            'address' => 'Test Client address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
            'country_id' =>  $client->country_id,
            'state_id' => $client->state_id,
            'city_id' => $client->city_id,
            'postal_code' => '456123',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', [
            'name' => 'Test Client Name',
            'email' => 'test@email.com',
        ]);
    }

    public function testUnauthenticatedUserCannotDeleteAClient()
     {
         $client = factory(Client::class)->create();

         $this->delete(route('clients.destroy', $client))
             ->assertRedirect(route('login'));

         $this->assertDatabaseHas('clients', [
             'name' => $client->name,
             'email' => $client->email,
         ]);
     }

    public function testAClientCanBeDeleted()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $this->actingAs($user)->delete(route('clients.destroy', $client))
            ->assertRedirect(route('clients.index'))
            ->assertSessionHasNoErrors();

        $this->assertDatabaseMissing('clients', [
           'name' => $client->name,
            'email' => $client->email,
        ]);
    }


}

