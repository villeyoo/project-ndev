<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
 public function up()
{
    Schema::create('lowongans', function (Blueprint $table) {
        $table->id();
        $table->string('judul');       // contoh: "SCRIPTER - DESA INDO"
        $table->date('mulai');         // contoh: 2025-06-12
        $table->date('selesai');       // contoh: 2025-06-29
        $table->text('deskripsi');     // contoh: "Membantu dalam scripting..."
        $table->enum('status', ['open', 'closed'])->default('open');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
