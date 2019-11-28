<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableProductsInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_invoices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('quantity');

            $table->bigInteger('products_id')->unsigned();
            $table->foreign('products_id')->references('id')->on('products');

            $table->bigInteger('sale_invoices_id')->unsigned();
            $table->foreign('sale_invoices_id')->references('id')->on('sale_invoices');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_invoices');
    }
}
