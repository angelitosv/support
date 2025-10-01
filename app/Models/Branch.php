<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasUuids;

    protected $keyType = 'string';

    protected $fillable = [
        'letter',
        'name',
    ];

    public function branches(): HasMany
    {
        return $this->hasMany(Plate::class, 'branch_id', 'id');
    }
}
