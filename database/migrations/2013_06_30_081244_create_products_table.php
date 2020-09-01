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
            $table->string('title')->nullable();
            $table->string('description',1000)->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->string('image')->nullable();
            $table->string('link_image')->nullable();
            $table->string('category')->nullable();
            $table->string('material')->nullable();
//            $table->unsignedInteger('stock');
            $table->string('size')->nullable();
            $table->string('status')->default('unavailable')->nullable();
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
        Schema::dropIfExists('product');
    }
}
