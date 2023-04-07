<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Users', function (Blueprint $table) {
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('desig_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('fatherName');
            $table->string('cnic');
            $table->string('phone');
            $table->string('offEmail');
            $table->string('perEmail')->nullable();
            $table->string('dob');
            $table->string('joindate');
            $table->string('currAddress');
            $table->string('perAddress')->nullable();
            $table->string('lastDegree');
            $table->string('currDegree')->nullable();
            $table->string('emgContactName')->nullable();
            $table->string('emgContactRelation')->nullable();
            $table->string('emgContactNumber')->nullable();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('desig_id')->references('id')->on('designations');
            $table->foreign('dept_id')->references('id')->on('departments');
            $table->timestamp('last_seen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Users', function (Blueprint $table) {
            //
        });
    }
}
