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
        Schema::create('prodm', function (Blueprint $table) {
            $table->id('proid');
           // $table->unsignedBigInteger('userId')->nullable(); // Add userId column
           // $table->foreign('userId')->references('userid')->on('userm')->onDelete('cascade'); // Add foreign key constraint
            $table->text('prodphoto')->nullable();
            $table->string('proname',50);
            $table->string('brand',20);
            $table->string('color',20);
            $table->integer('instock');
            $table->decimal('original_price', 10, 2);
            $table->decimal('discounted_price', 10, 2);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodm');
    }
};
