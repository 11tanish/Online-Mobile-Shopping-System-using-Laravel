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
        Schema::create('userm', function (Blueprint $table) {
            $table->id('userid');
            $table->text('profilephoto')->nullable(false);
            $table->string('fullname',50);
            $table->string('email',50)->unique();
            $table->string('password',18);           
            $table->boolean('isactive')->default(1);
            $table->string('usertype',20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userm');
    }
};
