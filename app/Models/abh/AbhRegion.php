<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rrdcc_chair',
        'consortium',
        'consortium_director',
    ];

    function agencies(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AbhAgency::class, 'abh_regions_id', 'id');
    }
}
