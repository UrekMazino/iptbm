<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbhRegion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rrdcc_chair',
        'consortium',
        'consortium_director',
    ];

    function agencies(): HasMany
    {
        return $this->hasMany(AbhAgency::class,'abh_region_id','id');
    }


}
