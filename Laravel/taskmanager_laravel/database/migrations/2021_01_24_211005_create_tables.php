<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appusers', function(Blueprint $table)
        {
            $table->increments('userid');
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('email', 100);
            $table->string('login', 100)->unique();
            $table->string('password', 100);
            $table->timestamps();
        });
        Schema::create('apptasks', function(Blueprint $table)
        {
            $table->increments('taskid');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('userid')->on('appusers');
            $table->string('title',100);
            $table->string('details',250);
            $table->dateTime('creationdate', $precision = 0)->nullable();
            $table->enum('priority', ['Low','Medium','High'])->default('Low');
            $table->boolean('status')->default(0);            
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
        Schema::drop('appusers');
        Schema::drop('apptasks');
    }
}
