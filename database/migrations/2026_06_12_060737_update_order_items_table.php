<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->foreignId('order_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('product_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->string('product_title');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
        });
    }

    public function down(): void
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['product_id']);
            $table->dropColumn([
                'order_id',
                'product_id',
                'product_title',
                'price',
                'quantity',
                'total',
            ]);
        });
    }
};
