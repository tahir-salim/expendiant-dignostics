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
        Schema::table('hospital_test_details', function (Blueprint $table) {
            $table->enum('report_status',['Report Awaited','Report Generated'])->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hospital_test_details', function (Blueprint $table) {
            $table->dropColumn('report_status');
        });
    }
};
