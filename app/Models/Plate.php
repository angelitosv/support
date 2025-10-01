<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plate extends Model
{
    use HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'plate',
        'branch_id',
        'owner_id',
        'state_id',
        'active',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }
  
    public function registers(): HasMany
    {
        return $this->hasMany(Register::class, 'plate_id', 'id');
    }

}
