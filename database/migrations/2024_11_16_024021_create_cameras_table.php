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
        Schema::create('cameras', function (Blueprint $table) {
            $table->char('id_camera')->primary();
            $table->string('camera_name',225);
            $table->string('brand',50);
            $table->double('price')->default(0.0);
            $table->unsignedInteger('quantity')->default(0);
            $table->boolean('status')->default(false);
            $table->text('description')->nullable();
            $table->text('product_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cameras');
    }
};
