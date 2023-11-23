<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmFullTechDescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_technology_profile_id',
        'narrative',
        'process_flow',
        'requirements',
        'significance_of_technology',
        'limitation_of_technology',
        'application_of_technology',
        'other_application'
    ];

    public function technology_profile(): BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class, "iptbm_technology_profile_id", "id");
    }

    public function adoptors(): HasMany
    {
        return $this->hasMany(IptbmTechnologyAdoptor::class, 'full_tech_id', 'id');
    }

    public function technology_photos(): HasMany
    {
        return $this->hasMany(IptbmFullTechPhoto::class, 'iptbm_full_tech_descriptions_id', 'id');
    }

    public function other_documents(): HasMany
    {
        return $this->hasMany(IptbmFullTechOtherDocs::class, 'full_descriptions_id', 'id');
    }

}
