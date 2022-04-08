<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKeysForPatientCards extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patient_cards', function (Blueprint $table) {
            $table->foreign('research_type')
                ->references('id')
                ->on('research_types');
            $table->foreign('body_part')
                ->references('id')
                ->on('body_parts');
            $table->foreign('technician')
                ->references('id')
                ->on('users');
            $table->foreign('appointed_doctor')
                ->references('id')
                ->on('users');
            $table->foreign('mkb')
                ->references('id')
                ->on('mkb_registers');
            $table->foreign('mkbonko')
                ->references('id')
                ->on('mkbonko_registers');
            $table->foreign('department')
                ->references('id')
                ->on('departments');
            $table->foreign('medical_center')
                ->references('id')
                ->on('medical_centers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
