<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('subphase_id')->default(1);
            $table->foreignId('referee_id')->default(1);
            $table->date('dob');
            $table->text('address');
            $table->string('city');
            $table->string('gender');
            $table->string('country');
            $table->string('cell');
            $table->string('identity');
            $table->string('avatar')->unique()->nullable();
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
        Schema::dropIfExists('subscribers');
    }
}
