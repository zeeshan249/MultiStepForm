<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMultiStepFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multi_step_form', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('company_name')->nullable();;
            $table->string('company_stage')->nullable();;
            $table->string('company_phone')->nullable();;
            $table->string('country_name')->nullable();;
            $table->string('city_name')->nullable();;
            $table->string('website_name')->nullable();;
            $table->string('contact_name')->nullable();;
            $table->string('contact_email')->nullable();;
            $table->string('contact_phone')->nullable();;
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
        Schema::dropIfExists('multi_step_forms');
    }
}
