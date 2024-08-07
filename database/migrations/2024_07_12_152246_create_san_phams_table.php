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
        Schema::create('san_phams', function (Blueprint $table) {
            $table->id();
            $table->string('product_code')->unique();
            $table->string('title');
            $table->string('name');
            $table->string('image');
            $table->double('price', 8, 2);
            $table->date('date_add');
            $table->text('description')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('danh_muc_id');

            //tạo khóa ngoại
            $table->foreign('danh_muc_id')->references('id')->on('danh_mucs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('san_phams');
    }
};
