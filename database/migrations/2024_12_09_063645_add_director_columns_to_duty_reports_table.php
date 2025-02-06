<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDirectorColumnsToDutyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('duty_reports', function (Blueprint $table) {
            $table->after('created_at', function (Blueprint $table) {
                $table->string('ddSignature')->nullable();
                $table->string('ddNumber')->nullable();
                $table->string('ddRank')->nullable();
                $table->string('ddName')->nullable();
                $table->string('directorSignature')->nullable();
                $table->string('directorNumber')->nullable();
                $table->string('directorRank')->nullable();
                $table->string('directorName')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('duty_reports', function (Blueprint $table) {
            $table->dropColumn([
                'ddSignature',
                'ddNumber',
                'ddRank',
                'ddName',
                'directorSignature',
                'directorNumber',
                'directorRank',
                'directorName',
            ]);
        });
    }
}
