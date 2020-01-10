<?php

namespace Tests\Feature;

use App\Seller;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SellersTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUnauthenticatedUserCannotAccessToSellersList()
    {
        $response = $this->get(route('sellers.index'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserHasAccessToSellerList()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user)->get(route('sellers.index'))->assertSuccessful();
        $this->assertAuthenticatedAs($user);
    }

    public function testSellerListContainsAListOfSellers()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.index'));

        $response->assertSuccessful();
        $response->assertViewHas('sellers');
        $response->assertViewIs('sellers.index');

    }

    public function testUnauthenticatedUserCannotCreateASeller()
    {
        $this->post(route('sellers.store'), [
            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'address' => 'Test Seller address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
        ])
            ->assertRedirect(route('login'));
    }

    public function testASellerCanBeCreated()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();

        $this->actingAs($user)->post(route('sellers.store'), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'address' => 'Test Seller address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('sellers', [
                'name' => $seller->name,
                'email' => $seller->email,
        ]);
    }

    public function testUnauthenticatedUserCannotUpdateASeller()
    {
        $seller = factory(Seller::class)->create();

        $this->put(route('sellers.update', $seller), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'address' => 'Test Seller address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('sellers', [
            'name' => $seller->name,
            'email' => $seller->email,
        ]);
    }

    public function testASellerCanBeUpdated()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();

        $this->actingAs($user)->put(route('sellers.update', $seller), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'address' => 'Test Seller address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

    }

    public function testUnauthenticatedUserCannotDeleteASeller()
    {
        $seller = factory(Seller::class)->create();

        $this->delete(route('sellers.destroy', $seller))
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('sellers', [
            'name' => $seller->name,
            'email' => $seller->email,
        ]);
    }

    public function testASellerCanBeDeleted()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();

        $this->actingAs($user)->delete(route('sellers.destroy', $seller))
            ->assertRedirect(route('sellers.index'))
            ->assertSessionHasNoErrors();
    }


}

