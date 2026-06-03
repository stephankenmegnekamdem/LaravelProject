<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->text('detail')->nullable();
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock')->default(0);
            $table->integer('minstock')->default(0);
            $table->integer('discount')->default(0);
            $table->boolean('status')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['user_id']);
            $table->dropColumn([
                'category_id', 'user_id', 'title', 'keywords',
                'description', 'detail', 'image', 'price',
                'stock', 'minstock', 'discount', 'status'
            ]);
        });
    }
};
