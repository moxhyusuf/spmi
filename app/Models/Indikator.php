<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['standard_id', 'pernyataan', 'no_iku', 'nama', 'target'])]
#[Hidden([])]

class Indikator extends Model
{
    use SoftDeletes;
    protected $table = 'indikator';

    public function standar(): BelongsTo
    {
        return $this->belongsTo(Standar::class, 'standard_id');
    }

    public function pelaksanaan(): HasMany
    {
        return $this->hasMany(Pelaksanaan::class, 'indikator_id');
    }
}
