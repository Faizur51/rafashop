<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('regular_price',8,2);
            $table->decimal('sale_price',8,2)->nullable();
            $table->string('sku');
            $table->boolean('stock_status')->default(true);
            $table->boolean('featured')->default(true);
            $table->unsignedInteger('quantity')->nullable();
            $table->string('color')->default('[]');
            $table->string('size')->default('[]');
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->cascadeOnDelete();
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
};
