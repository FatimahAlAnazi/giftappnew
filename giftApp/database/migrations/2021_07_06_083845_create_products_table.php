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
            $table->integer('category_id')->nullable()->unsigned()->index();
            $table->string('name');
            $table->string('product_image');
            $table->longText('description');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('stock');
            $table->string('color')->nullable();
            $table->string('warp_paper')->nullable();
            $table->longText('card')->nullable();
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
        Schema::dropIfExists('products');
    }
}
