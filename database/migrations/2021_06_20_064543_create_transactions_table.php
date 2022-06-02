<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id');
            $table->integer('total_price');
            $table->string('transaction_status');
            $table->string('name');
            $table->string('email');
            $table->string('address_one');
            $table->string('address_two');
            $table->string('notes_address');
            $table->string('province');
            $table->string('courier');
            $table->string('zip_code');
            $table->string('phone');
            $table->string('code');
            $table->string('evidence')->nullable();
            $table->enum('method',['auto','manual'])->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
