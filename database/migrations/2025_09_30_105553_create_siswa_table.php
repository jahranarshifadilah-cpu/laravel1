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
        Schema::create(table: 'siswa',callback: function (Blueprint $table): void {
            $table->id();
            $table->string(column: 'nama')->inique();
            $table->text(column: 'kelas');
            $table->text(column: 'alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(table: 'siswa');
    }
};
