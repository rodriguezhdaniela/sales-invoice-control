<?php

namespace Tests\Feature;

use App\Client;
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
        $client = factory(Client::class)->create();

        $response = $this->actingAs($user)->get(route('clients.index'));

        $response->assertSuccessful();
        $response->assertViewHas('clients');
        $response->assertViewIs('clients.index');

    }

    public function testUnauthenticatedUserCannotCreateAClient()
    {
        $this->post(route('clients.store'), [
            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Client Name',
            'address' => 'Test Client address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
        ])
            ->assertRedirect(route('login'));
    }

    public function testAClientCanBeCreated()
    {
        $user = factory(User::class)->create();
        $client = factory(Client::class)->create();

        $this->actingAs($user)->post(route('clients.store'), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Client Name',
            'address' => 'Test Client address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('clients', [
                'name' => $client->name,
                'email' => $client->email,
        ]);
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

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

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
    }


}

