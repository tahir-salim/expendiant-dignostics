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
        Schema::table('hospital_test_masters', function (Blueprint $table) {
            $table->foreignId('hospital_test_id')->after('hospital_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_test_masters', function (Blueprint $table) {
            $table->dropColumn('hospital_test_id');
        });
    }
};
