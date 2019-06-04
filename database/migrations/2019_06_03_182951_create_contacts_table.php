<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->timestamps();
        });

        DB::table('contacts')->insert([
            [
                'nom' => 'Muyshond',
                'prenom' => 'Daniel',
                'email' => 'daniel.muyshond@gmail.com',
                'phone' => '0471 / 541 363'
            ],
            [
                'nom' => 'John',
                'prenom' => 'Doe',
                'email' => 'j.doe@gmail.com',
                'phone' => '0473 / 463 728'
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
