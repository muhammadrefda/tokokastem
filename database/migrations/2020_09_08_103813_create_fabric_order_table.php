<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFabricOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fabric_order', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->char('link_goggle_drive');
            $table->char('type');
            $table->integer('length');
            $table->integer('width');
            $table->string('design');
            $table->string('size');
            $table->string('material');
            $table->string('note')->nullable();
            $table->integer('proof_of_transaction')->nullable();
            $table->integer('status')->default('pending');

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
        Schema::dropIfExists('fabric_order');
    }
}
