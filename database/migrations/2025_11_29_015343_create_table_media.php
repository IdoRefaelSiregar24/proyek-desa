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
        Schema::create('media', function (Blueprint $table) {
            $table->id('media_id');
            $table->string('ref_table', 100)->nullable();
            $table->unsignedBigInteger('ref_id')->nullable();
            $table->string('file_name', 255);
            $table->text('caption')->nullable();
            $table->string('mime_type', 120)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            // opsional: index untuk performa retrival data
            $table->index(['ref_table', 'ref_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
