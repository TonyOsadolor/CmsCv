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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_me_id')->constrained('about_me')->onDelete('cascade');
            $table->string('type');
            $table->string('degree_type');
            $table->string('institute');
            $table->string('course')->nullable();
            $table->string('institute_town');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->boolean('till_present')->default(false);
            $table->string('equivalent');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
