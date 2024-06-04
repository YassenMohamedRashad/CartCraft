<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("images");
            $table->string("name");
            $table->string("description");
            $table->float("price");
            $table->float("rate");
            $table->integer("stock");
            $table->integer("offer");
            $table->integer("no_rates");
            $table->unsignedBigInteger("seller_id");
            $table->unsignedBigInteger("category_id");


            $table->foreign('seller_id')->references('id')->on('sellers');
            $table->foreign('category_id')->references('id')->on('products_categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
