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
            $table->string("name");
            $table->string("size");
            $table->string("image")->nullable();
            $table->text("description");
            $table->text("how_to_use");
            $table->text("benefits")->nullable();
            $table->text("highlights")->nullable();

            $table->unsignedBigInteger("price");
            $table->unsignedBigInteger("quantity");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("subcategory_id")->nullable();
            $table->unsignedBigInteger("manufacturer_id");
            $table->unsignedBigInteger("prescription_required");
            $table->string("status")->default("pending");

            $table->timestamps();

            $table->foreign('category_id')
            ->references('id')
            ->on('categories');
            $table->foreign('subcategory_id')
            ->references('id')
            ->on('subcategories');
            $table->foreign('manufacturer_id')
            ->references('id')
            ->on('manufacturers');
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
