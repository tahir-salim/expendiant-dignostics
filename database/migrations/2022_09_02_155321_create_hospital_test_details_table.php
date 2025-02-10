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
        Schema::create('hospital_test_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hospital_test_id');
            $table->foreignId('test_id');
            $table->decimal('amount', 10, 2);
            $table->enum('status', ['pending', 'in_process', 'completed']);
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
        Schema::dropIfExists('hospital_test_details');
    }
};
