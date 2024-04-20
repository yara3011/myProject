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
        Schema::create('suggestions', function (Blueprint $table) {
        
                $table->id();
                $table->enum('product_condition', ['support', 'owned']);
                $table->text('product_name_ar');
                $table->text('product_name_en');
                $table->string('manufacturer_company');
                $table->integer('phone_num')->nullable();
                $table->enum('status', ['pending', 'approved', 'declined'])->default('pending');
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggestions');
    }
};
