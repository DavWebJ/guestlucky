<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->integer('masterId')->nullable();
            $table->unsignedBigInteger('property_id')->nullable()->constrained("properties");
            $table->integer('room_id')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('roomQty');
            $table->integer('offer_id')->nullable();
            $table->enum('status', ['confirmed', 'request', 'new','cancelled','black','inquiry'])->default('new');
            $table->date('arrival')->default(Carbon::now()->format('Y-m-d'));
            $table->date('departure')->default(Carbon::now()->add(1,'day')->format('Y-m-d'));
            $table->integer('numAdult')->default(0);
            $table->integer('numChild')->default(0);
            $table->string('title')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('postcode')->nullable();
            $table->string('country')->default('fr');
            $table->string('comments')->nullable();
            $table->string('notes')->nullable();
            $table->string('messages')->nullable();
            $table->string('statusCode')->default('0');
            $table->string('lang')->default('fr');
            $table->string('referer')->default('Airbnb');
            $table->string('apiSourceId')->nullable();
            $table->string('apiSource')->nullable();
            $table->string('apiReference')->nullable();
            $table->float('price');
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
        Schema::dropIfExists('bookings');
    }
}
