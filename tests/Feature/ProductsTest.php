<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;
    use withFaker;

    public function testUnauthenticatedUserCannotAccessToProductsList()
    {
        $response = $this->get(route('products.index'));

        $response->assertRedirect(route('login'));
    }

    public function testAuthenticatedUserHasAccessToProductList()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user)->get(route('products.index'))->assertSuccessful();
        $this->assertAuthenticatedAs($user);
    }

    public function testProductListContainsAListOfProducts()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.index'));

        $response->assertSuccessful();
        $response->assertViewHas('products');
        $response->assertViewIs('products.index');

    }

    public function testUnauthenticatedUserCannotCreateProduct()
    {

        $this->get(route('products.create'))

            ->assertRedirect(route('login'));

    }

    public function testProductCanBeCreated()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->get(route('products.create'));

        $response->assertSuccessful();
        $response->assertSeeText('Product');
        $response->assertViewIs('products.create');

    }

    public function testUnauthenticatedUserCannotStoreAProduct()
    {
        $this->post(route('products.store'), [
            'type_id' => 'Test type id',
            'personal_id' => 'test personal id',
            'name' => 'Test Product Name',
            'address' => 'Test Product address',
            'phone_number' =>  '4561234',
            'email' => 'test@email.com',
        ])
            ->assertRedirect(route('login'));
    }

    public function testAProductCanBeStored()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $this->actingAs($user)->post(route('products.store'), [

            'name' => 'Test Product Name',
            'description' => 'test personal id',
            'price' => '50',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

        $this->assertDatabaseHas('products', [
                'name' => $product->name,
                'description' => $product->description,
        ]);
    }

    public function testUnauthenticatedUserCannotUpdateAProduct()
    {
        $product = factory(Product::class)->create();

        $this->put(route('products.update', $product), [

            'name' => 'Test Product Name',
            'description' => 'test personal id',
            'price' => '1000',
        ])
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'description' => $product->description,
        ]);
    }

    public function testAProductCanBeUpdated()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $this->actingAs($user)->put(route('products.update', $product), [

            'name' => 'Test Product Name',
            'description' => 'test personal id',
            'price' => '50',

        ])
            ->assertRedirect()
            ->assertSessionHasNoErrors();

    }

    public function testUnauthenticatedUserCannotEditSeller()
    {
        $product = factory(Product::class)->create();

        $this->get(route('products.edit', $product))

            ->assertRedirect(route('login'));

    }

    public function testSellerCanBeEdited()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $response = $this->actingAs($user)->get(route('products.edit', $product));

        $response->assertSuccessful();
        $response->assertSeeText('Edit');
        $response->assertViewIs('products.edit');

    }

    public function testUnauthenticatedUserCannotDeleteAProduct()
    {
        $product = factory(Product::class)->create();

        $this->delete(route('products.destroy', $product))
            ->assertRedirect(route('login'));

        $this->assertDatabaseHas('products', [
            'name' => $product->name,
            'description' => $product->description,
        ]);
    }

    public function testAProductCanBeDeleted()
    {
        $user = factory(User::class)->create();
        $product = factory(Product::class)->create();

        $this->actingAs($user)->delete(route('products.destroy', $product))
            ->assertRedirect(route('products.index'))
            ->assertSessionHasNoErrors();
    }


}

