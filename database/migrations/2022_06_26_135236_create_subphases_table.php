<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubphasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subphases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phase_id');            
            $table->unsignedTinyInteger('possition');            
            $table->string('name')->unique();
            $table->string('description');
            $table->string('action')->nullable();
            $table->integer('data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subphases');
    }
}
