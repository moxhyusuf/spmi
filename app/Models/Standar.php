<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['nomor', 'nama', 'tanggal_perumusan', 'tanggal_pengesahan'])]
#[Hidden([])]

class Standar extends Model
{
    use SoftDeletes;
    protected $table = 'standar';

    protected function casts(): array
    {
        return [
            'tanggal_perumusan' => 'date',
            'tanggal_pengesahan' => 'date',
        ];
    }

    public function indikator(): HasMany
    {
        return $this->hasMany(Indikator::class, 'standard_id');
    }
}
