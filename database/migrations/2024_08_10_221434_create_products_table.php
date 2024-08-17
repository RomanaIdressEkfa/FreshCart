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
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('sub_category_id')->constrained('sub_categories')->onDelete('cascade')->nullable();
            $table->foreignId('sub_sub_category_id')->constrained('sub_sub_categories')->onDelete('cascade')->nullable();
            $table->bigInteger('brand_id')->nullable();
            $table->string('name')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('discount')->nullable();
            $table->float('rating')->nullable();
            $table->integer('regular_price')->nullable();
            $table->integer('sale_price')->nullable();
            $table->string('product_status')->nullable();
            $table->string('product_code')->nullable();
            $table->string('key_features')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_url')->nullable();
            $table->text('topbar_heading')->nullable();
            $table->text('topbar_description')->nullable();
            $table->text('bottom_description')->nullable();
            $table->boolean('is_best_seller')->nullable()->default(null);
            $table->timestamp('sale_end_date')->nullable();
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
