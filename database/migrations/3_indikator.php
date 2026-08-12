<?php

use App\Models\Indikator;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indikator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('standard_id')->constrained('standar');
            $table->text('pernyataan');
            $table->string('no_iku');
            $table->string('nama');
            $table->string('target');
            $table->enum('unit', Indikator::UNIT)->default('Pusat Penjaminan Mutu');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indikator');
    }
};
