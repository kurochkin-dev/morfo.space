<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_cards', function (Blueprint $table) {
            $table->id();
            $table->string('incoming_number')->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->bigInteger('medical_center')->unsigned()->nullable();
            $table->bigInteger('department')->unsigned()->nullable();
            $table->string('create_by_doctor')->default('');
            $table->text('diagnosis')->nullable();
            $table->date('research_date')->nullable();
            $table->bigInteger('technician')->unsigned()->nullable();
            $table->bigInteger('body_part')->unsigned()->nullable();
            $table->integer('blocks_count')->default(0);
            $table->integer('glasses_count')->default(0);
            $table->bigInteger('research_type')->unsigned()->nullable();
            $table->text('color')->nullable();
            $table->bigInteger('mkb')->unsigned()->nullable();
            $table->bigInteger('mkbonko')->unsigned()->nullable();
            $table->text('macro_description')->nullable();
            $table->bigInteger('appointed_doctor')->unsigned()->nullable();
            $table->text('micro_description')->nullable();
            $table->text('conclusion')->nullable();
            $table->text('note')->nullable();
            $table->enum('status', [
                'created',
                'cutting',
                'cutting_completed',
                'clipping',
                'clipping_completed',
                'send_to_doctor',
                'completed',
            ])->default('created');
            $table->boolean('email_send')->default(0);
            $table->enum('research_area', ['gist', 'cit'])->default('gist');
            $table->date('shipment_date')->nullable();
            $table->integer('customer_id')->nullable();
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
        Schema::dropIfExists('patient_cards');
    }
}
