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
        Schema::create('hospital_test_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_id');
            $table->integer('hospital_test_id')->nullable();
            $table->date('date')->nullable();
            $table->time('master_time')->nullable();
            $table->decimal('grand_total', 10, 2)->nullable();
            $table->integer('no_of_patients')->nullable();
            $table->integer('no_of_test')->nullable();

            
            $table->enum('sample_delivery_type', ['pick_up', 'deliver']);
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
        Schema::dropIfExists('hospital_test_masters');
    }
};
