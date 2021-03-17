<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unnax_payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('omburequest_id')->nullable(false);
            $table->foreign('omburequest_id')->references('id')->on('ombu_solicitudes')->onDelete('cascade');
            $table->integer('amount');
            $table->string('currency');
            $table->string('customer_code');
            $table->string('concept')->nullable(true);
            $table->string('destination_account');
            $table->string('owner');
            $table->string('customer');
            $table->softDeletes();
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
        Schema::dropIfExists('unnax_payouts');
    }
}
