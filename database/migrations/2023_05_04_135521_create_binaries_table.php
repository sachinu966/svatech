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
        Schema::create('binaries', function (Blueprint $table) {
            $table->id();
            $table->string('value')->comment('value of root');
            $table->string('left_child')->default(0)->comment('value of root');
            $table->string('right_child')->default(0)->comment('value of root');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binaries');
    }
};
