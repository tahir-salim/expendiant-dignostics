<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_tests', function (Blueprint $table) {
            $table->id();
            $table->integer('hospital_test_master_id');
            $table->foreignId('hospital_id');
            $table->string('patient_id')->nullable();
            $table->string('patient_fullname')->nullable();
            $table->string('patient_phone')->nullable();
            $table->integer('patient_age')->nullable();
            $table->enum('patient_gender', ['male', 'female', 'other']);
            $table->enum('sample_delivery', ['pick_up', 'deliver']);
            $table->decimal('sub_total', 10, 2)->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();
            $table->enum('status', ['pending', 'in_process', 'completed']);
            $table->text('address_1');
            $table->text('address_2');
            $table->integer('payment_status')->comment('0=Unpaid, 1=Paid');
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
        Schema::dropIfExists('hospital_tests');
    }
};
