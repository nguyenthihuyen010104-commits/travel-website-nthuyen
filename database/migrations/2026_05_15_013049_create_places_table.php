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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên địa điểm
            $table->text('description'); // Mô tả
            $table->string('address'); // Địa chỉ
            $table->string('image')->nullable(); // Hình ảnh (cho phép trống ban đầu)
            $table->boolean('status')->default(1); // 1: Hiển thị, 0: Ẩn
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
