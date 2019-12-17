<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type_id');
<<<<<<< HEAD
            $table->string('personal_id')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('phone_number');
            $table->string('e_mail')->unique();
=======
            $table->integer('personal_id')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('address');
            $table->integer('phone_number');
            $table->string('e-mail')->unique();
>>>>>>> Creación tabla clients
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
        Schema::dropIfExists('clients');
    }
}
