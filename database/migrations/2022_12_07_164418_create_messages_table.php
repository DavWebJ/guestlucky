<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained('users');
            $table->unsignedBigInteger('message_id');
            $table->unsignedInteger('booking_id')->nullable()->constrained("bookings");
            $table->unsignedInteger('room_id')->nullable();
            $table->unsignedInteger('property_id')->nullable()->constrained("properties");
            $table->dateTime('time')->default(Carbon::now());
            $table->boolean('read')->default(false);
            $table->longText('message')->nullable();
            $table->string('source')->default('guest');
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
        Schema::dropIfExists('messages');
    }
}

