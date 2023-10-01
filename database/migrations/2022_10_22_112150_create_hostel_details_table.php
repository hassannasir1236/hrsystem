<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostel_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('o_cnic');
            $table->string('h_name'); 
            $table->string('h_phoneno');
            $table->string('h_state');
            $table->string('h_address');
            $table->string('h_details');
            $table->string('h_slug');
            $table->string('h_category');
            $table->string('h_country');
            $table->string('h_city');
            $table->string('h_latitude');
            $table->string('h_longitude');
            $table->string('filenames');
            $table->string('new_filenames');
            // step 2 values
            $table->string('h_rent');
            $table->string('rent_period');
            $table->string('bills_included');
            $table->string('letting_type');
            $table->string('hostel_area');
            $table->string('h_condition');
            $table->string('h_floor');
            $table->string('h_schedule');
            $table->string('h_bathroom');
            $table->string('h_mess');
            $table->string('h_lawn');
            $table->string('h_occopancy');
            // step 3 values
            $table->string('facilities',1000);
            $table->timestamp('email_verified_at')->nullable();
             $table->rememberToken();
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
        Schema::dropIfExists('hostel_details');
    }
}
