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
        Schema::create('industry', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('sub_parent_id')->default(0);
            $table->unsignedInteger('main_parent_id')->default(0);
            $table->unsignedInteger('main')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industries');
    }
};
