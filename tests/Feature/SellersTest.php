<?php

namespace Tests\Feature;

use App\Seller;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

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

        $response = $this->actingAs($user)->get(route('sellers.index'));

        $response->assertSuccessful();
        $response->assertViewHas('sellers');
        $response->assertViewIs('sellers.index');
    }

    public function testUnauthenticatedUserCannotCreateSeller()
    {
        $this->get(route('sellers.create'))

        ->assertRedirect(route('login'));
    }

    public function testSellerCanBeCreated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.create'));

        $response->assertSuccessful();
        $response->assertSeeText('Seller');
        $response->assertViewIs('sellers.create');
    }

    public function testShowTheCreationFormFields()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.create'));

        $response->assertSee(__('Type ID'));
        $response->assertSee(__('Personal ID'));
        $response->assertSee(__('Name'));
        $response->assertSee(__('Last name'));
        $response->assertSee(route('sellers.store'));
    }

    public function testUnauthenticatedUserCannotStoreASeller()
    {
        $this->post(route('sellers.store'), [
            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'last_name' => 'Test Client last Name',
            'address' => 'Test Seller address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
        ])
            ->assertRedirect(route('login'));
    }


    public function testASellerCanBeStored()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();

        $this->actingAs($user)->post(route('sellers.store'), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'last_name' => 'Test Client last Name',
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

    public function testUnauthenticatedUserCannotEditSeller()
    {
        $seller = factory(Seller::class)->create();

        $this->get(route('sellers.edit', $seller))

            ->assertRedirect(route('login'));
    }

    public function testSellerCanBeEdited()
    {
        $user = factory(User::class)->create();
        $seller = factory(Seller::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.edit', $seller));

        $response->assertSuccessful();
        $response->assertSeeText('Edit');
        $response->assertViewIs('sellers.edit');
    }


    public function testUnauthenticatedUserCannotUpdateASeller()
    {
        $seller = factory(Seller::class)->create();

        $this->put(route('sellers.update', $seller), [

            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Seller Name',
            'last_name' => 'Test Client last Name',
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
            'last_name' => 'Test Client last Name',
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

    public function testTheIndexOfSellerHasSellerPaginated()
    {
        factory(Seller::class, 5)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('sellers.index'));

        $this->assertInstanceof(
            LengthAwarePaginator::class,
            $response->original->gatherData()['sellers']
        );
    }

    public function testCanSearchSellersByName()
    {
        $user = factory(User::class)->create();
        $sellerA = factory(Seller::class)->create(['name' => 'Test seller']);

        $response = $this->actingAs($user)->get(route('sellers.index', ['search' => 'Test']));

        $viewSellers = $response->original->gatherData()['sellers'];

        $this->assertTrue($viewSellers->contains($sellerA));
    }

    public function testCanSearchSellersById()
    {
        $user = factory(User::class)->create();
        $sellerA = factory(Seller::class)->create(['personal_id' => '12365489']);

        $response = $this->actingAs($user)->get(route('sellers.index', ['search' => '12365489']));

        $viewSellers = $response->original->gatherData()['sellers'];

        $this->assertTrue($viewSellers->contains($sellerA));
    }
}
