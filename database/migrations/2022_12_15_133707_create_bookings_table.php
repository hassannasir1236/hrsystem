<?php

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
            $table->bigInteger('uid');
            $table->bigInteger('hid');
            $table->bigInteger('oid');
            $table->string('status');
            $table->string('payment_status')->nullable();
            $table->string('txno')->nullable(); 
            $table->string('amount')->nullable();
            $table->string('people');
            $table->string('message')->nullable();
            $table->bigInteger('roomno')->nullable();
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
