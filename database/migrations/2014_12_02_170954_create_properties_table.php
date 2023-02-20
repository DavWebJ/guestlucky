<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained("users");
            $table->longText('name');
            $table->bigInteger('propId');
            $table->tinyInteger('propTypeId');
            $table->bigInteger('ownerId');
            $table->string('currency')->default('EUR');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('FR');
            $table->string('postcode');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('room_name');
            $table->integer('qty')->default(0);
            $table->bigInteger('roomId');
            $table->float('minPrice');
            $table->integer('maxPeople');
            $table->tinyInteger('maxAdult');
            $table->tinyInteger('maxChildren');
            $table->string('unitAllocationPerGuest');
            $table->string('unitNames');
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
        Schema::dropIfExists('properties');
    }
}
