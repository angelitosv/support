<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class State extends Model
{
    use HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
    ];

    public function states(): HasMany
    {
        return $this->hasMany(Plate::class, 'state_id', 'id');
    }
}
