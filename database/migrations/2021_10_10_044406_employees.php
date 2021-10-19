<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('employees', function (Blueprint $table) {
            $table->id('emp_id');
            $table->string('name');
            $table->string('last');
            $table->string('email')->unique()->nullable();;
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('com_id');
            $table->foreign('com_id')->references('com_id')->on('companies');
            $table->rememberToken();
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
       Schema::dropIfExists('employees');
    }
}
