<?php

use App\Models\Pelaksanaan;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelaksanaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('indikator_id')->constrained('indikator');
            $table->date('tanggal')->default(now());
            $table->text('uraian')->nullable();
            $table->string('dokumen')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelaksanaan');
    }
};
