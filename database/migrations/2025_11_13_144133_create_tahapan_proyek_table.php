<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tahapan_proyek', function (Blueprint $table) {
            $table->bigIncrements('tahap_id');
            $table->foreignId('proyek_id')
                ->constrained('proyek', 'proyek_id')
                ->onDelete('cascade');
            $table->string('nama_tahap');
            $table->decimal('target_persen', 5, 2)->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tahapan_proyek');
    }
};
