<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('unique_code');
            $table->integer('quantity');
            $table->string('design_mask')->nullable();
            $table->string('design_front_totebag')->nullable();
            $table->string('design_back_totebag')->nullable();
            $table->string('design_front_tshirt')->nullable();
            $table->string('design_back_tshirt')->nullable();
            $table->string('design_front_mug')->nullable();
            $table->string('design_back_mug')->nullable();
            $table->string('design_backpack')->nullable();
            $table->string('link_goggle_drive')->nullable();
            $table->string('type_fabric')->nullable();
            $table->string('category');
            $table->string('size')->nullable();
            $table->string('material')->nullable();
            $table->string('note')->nullable();
            $table->string('status');
            $table->unsignedInteger('price_fabric')->nullable();
            $table->unsignedInteger('price_mask')->nullable();
            $table->unsignedInteger('price_mug')->nullable();
            $table->unsignedInteger('price_totebag')->nullable();
            $table->unsignedInteger('price_tshirt')->nullable();
            $table->unsignedInteger('price_backpack')->nullable();
            $table->unsignedInteger('total');
            $table->integer('fabric_weight')->nullable();
            $table->integer('mask_weight')->nullable();
            $table->integer('mug_weight')->nullable();
            $table->integer('totebag_weight')->nullable();
            $table->integer('tshirt_weight')->nullable();
            $table->integer('backpack_weight')->nullable();
            $table->unsignedBigInteger('user_id');
//            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade")->onUpdate("cascade");
//            $table->foreign('shipping_address_id')->references('id')->on('shipping_address')->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
