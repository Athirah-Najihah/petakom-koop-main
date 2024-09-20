<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('receipt_products', function (Blueprint $table) {
            $table
                ->foreign('receipt_id')
                ->references('id')
                ->on('receipts')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receipt_products', function (Blueprint $table) {
            $table->dropForeign(['receipt_id']);
            $table->dropForeign(['product_id']);
        });
    }
};
