<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.show']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.destroy']);

        //Roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.show']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.destroy']);

        //Invoices
        Permission::create(['name' => 'invoices.index']);
        Permission::create(['name' => 'invoices.show']);
        Permission::create(['name' => 'invoices.create']);
        Permission::create(['name' => 'invoices.edit']);
        Permission::create(['name' => 'invoices.destroy']);

        //Details
        Permission::create(['name' => 'details.store']);
        Permission::create(['name' => 'details.create']);
        Permission::create(['name' => 'details.destroy']);

        //Products
        Permission::create(['name' => 'products.index']);
        Permission::create(['name' => 'products.show']);
        Permission::create(['name' => 'products.create']);
        Permission::create(['name' => 'products.edit']);
        Permission::create(['name' => 'products.destroy']);

        //Payment
        Permission::create(['name' => 'payment']);
        Permission::create(['name' => 'payment.callback']);

        //Sellers
        Permission::create(['name' => 'sellers.index']);
        Permission::create(['name' => 'sellers.show']);
        Permission::create(['name' => 'sellers.create']);
        Permission::create(['name' => 'sellers.edit']);
        Permission::create(['name' => 'sellers.destroy']);

        //Clients
        Permission::create(['name' => 'clients.index']);
        Permission::create(['name' => 'clients.show']);
        Permission::create(['name' => 'clients.create']);
        Permission::create(['name' => 'clients.edit']);
        Permission::create(['name' => 'clients.destroy']);

        //Admin
        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo([
            'roles.index',
            'roles.edit',
            'roles.show',
            'roles.create',
            'roles.destroy',
            'clients.index',
            'clients.edit',
            'clients.show',
            'clients.create',
            'clients.destroy',
            'sellers.index',
            'sellers.edit',
            'sellers.show',
            'sellers.create',
            'sellers.destroy',
            'invoices.index',
            'invoices.edit',
            'invoices.show',
            'invoices.create',
            'invoices.destroy',
            'products.index',
            'products.edit',
            'products.show',
            'products.create',
            'products.destroy',
            'users.index',
            'users.show',
            'users.edit',
            'users.destroy',
            'details.store',
            'details.create',
            'details.destroy',
            'payment',
            'payment.callback'
        ]);


        //Supervisor
        $supervisor = Role::create(['name' => 'Supervisor']);
            //agregar impotacion,exportacion
        $supervisor->givePermissionTo([
            'users.index',
            'users.edit',
            'users.destroy',
            'products.index',
            'products.edit',
            'products.show',
            'products.create',
            'products.destroy',
            'sellers.index',
            'sellers.edit',
            'sellers.create',
            'sellers.destroy',
            'clients.index',
            'clients.edit',
            'clients.show',
            'clients.create',
            'clients.destroy',
            'invoices.index',
            'invoices.edit',
            'invoices.show',
            'invoices.create',
            'invoices.destroy',
            'details.store',
            'details.create',
            'details.destroy',
            'payment',
            'payment.callback'
        ]);

        //Seller
        $seller = Role::create(['name' => 'Seller']);

        $seller->givePermissionTo([
            'clients.index',
            'clients.edit',
            'clients.show',
            'clients.create',
            'clients.destroy',
            'invoices.index',
            'invoices.edit',
            'invoices.show',
            'invoices.create',
            'products.index',
            'details.store',
            'details.create',
            'details.destroy',
        ]);

        //Client
        $client = Role::create(['name' => 'Client']);

        $client->givePermissionTo([
            'invoices.index',
            'invoices.show',
            'payment',
            'payment.callback'
        ]);

        //Guest
        $guest = Role::create(['name' => 'Guest']);


        //User Admin
        $user = User::find(1); //Daniela
        $user->assignRole('Admin');

        //User Client
        $user = User::find(2); //Manuela
        $user->assignRole('Client');

        //User Supervisor
        $user = User::find(3); //Ana Maria
        $user->assignRole('Supervisor');

        //User Seller
        $user = User::find(4); //Liliana
        $user->assignRole('Seller');



    }

}
