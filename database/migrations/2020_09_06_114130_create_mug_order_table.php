<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMugOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mug_order', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->string('design_front');
            $table->string('design_back');
            $table->string('size');
            $table->string('material');
            $table->string('note')->nullable();
            $table->integer('proof_of_transaction');
            $table->integer('status');

            $table->unsignedBigInteger('user_id');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mug_order');
    }
}
