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
        Schema::table('appointment_test_reports', function (Blueprint $table) {
            $table->enum('report_status',['Report Awaited','Report Generated'])->after('appointment_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment_test_reports', function (Blueprint $table) {
            $table->dropColumn('report_status');
        });
    }
};
