<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmCommercializationAdopter extends Model
{
    use HasFactory;
    protected $fillable=[
        'technology_id',
        'company_name',
        'address',
        'company_description',
        'business_structures',
        'business_registration',
        'acquisition_model',
        'for_incubation'
    ];

    public function technology(): BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class,'technology_id','id');
    }

    public function  contacts(): HasMany
    {
        return $this->hasMany(IptbmComercialAdopterContact::class,'commercial_adoptor_id','id');
    }

}
