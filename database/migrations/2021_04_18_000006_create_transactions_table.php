<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->foreignId('user_id')->default(1);  
            $table->decimal('amount', 15, 2)->nullable();
            $table->date('transaction_date')->nullable();
            $table->smallInteger('credit')->nullable();
            $table->string('reference')->unique();
            $table->string('fullname');
            $table->string('email');
            $table->boolean('confirmed')->default(false);
            $table->string('phone')->nullable();
            $table->string('status')->nullable();
            $table->string('purpose')->nullable();
            $table->string('channel')->nullable();
            $table->string('merchanttrace')->unique()->nullable();
            $table->string('hash')->nullable();
            $table->string('pollurl')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
