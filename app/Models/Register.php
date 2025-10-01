<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Register extends Model
{
    use HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'work_date',
        'plate_id',
    ];

    public function plate(): BelongsTo
    {
        return $this->belongsTo(Plate::class, 'plate_id', 'id');
    }
}
