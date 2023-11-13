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
            $table->bigInteger('brand_id')->index()->unsigned();
            $table->bigInteger('category_id')->index()->unsigned();
            $table->bigInteger('sub_category_id')->index()->unsigned();
            // Set khóa ngoại
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
            // Các trường khác trong product
            $table->string('product_name_en');
            $table->string('product_name_vi');
            $table->string('product_slug_en');
            $table->string('product_slug_vi');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tag_en');
            $table->string('product_tag_vi');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_vi')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_vi');
            $table->string('selling_price')->nullable();
            $table->string('discount_price')->nullable();
            $table->text('short_desciption_en');
            $table->text('short_desciption_vi');
            $table->text('long_desciption_en');
            $table->text('long_desciption_vi');
            $table->text('product_thambnail');
            $table->integer('hot_deals')->nullable()->index();
            $table->integer('featured')->nullable()->index();
            $table->integer('special_offer')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('status')->default(0)->index();
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
