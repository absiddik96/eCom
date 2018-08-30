<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('product_code',17);
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->text('key_features');
            $table->integer('type_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('barcode');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
