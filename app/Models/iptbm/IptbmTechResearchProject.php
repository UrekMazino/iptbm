<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmTechResearchProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_technology_id',
        'title',
        'agency_name',
        'amount'
    ];

    function researchpartners(): HasMany
    {
        return $this->hasMany(IptbmResearchIndustryPartner::class, "iptbm_tech_project_id", "id");
    }

    public function funder(): HasMany
    {
        return $this->hasMany(IptbmTechResearchFunder::class, 'iptbm_tech_research_id', 'id');
    }
}
