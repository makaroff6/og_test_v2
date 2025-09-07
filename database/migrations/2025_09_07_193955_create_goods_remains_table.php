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
        Schema::create('goods_remains', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('good_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->smallInteger('qty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goods_remains');
    }
};
