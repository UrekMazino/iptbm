<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmDeploymentPathway extends Model
{
    use HasFactory;

    protected $fillable = [
        'technology_id',
        'adoptor_name',
        'address'
    ];

    function Technology(): BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class, 'technology_id', 'id');
    }

    function contacts(): HasMany
    {
        return $this->hasMany(IptbmDeploymentAdoptorContact::class, 'deployment_adopters_id', 'id');
    }

}
