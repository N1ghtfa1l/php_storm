<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('category_id');
            $table->timestamps();

            $table->index('item_id', 'item_categories_item_id_index');
            $table->index('category_id', 'item_categories_category_id_index');

            $table->foreign('item_id', 'item_categories_item_id_fk')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('category_id', 'item_categories_category_id_fk')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_categories');
    }
};
