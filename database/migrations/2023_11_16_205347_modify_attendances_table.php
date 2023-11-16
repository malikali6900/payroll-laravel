<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attendances', function (Blueprint $table) {
            $table->dropColumn('date'); // Drop the existing 'date' column

            $table->integer('total_present')->default(0);
            $table->integer('total_absent')->default(0);
            $table->integer('total_days')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attendances', function (Blueprint $table) {
            // Reverse the changes made in the 'up' method
            $table->date('date')->nullable();
            $table->dropColumn('total_present');
            $table->dropColumn('total_absent');
            $table->dropColumn('total_days');
        });
    }
}
