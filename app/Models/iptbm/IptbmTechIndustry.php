<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmTechIndustry extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_technology_id',
        'iptbm_industry_id'
    ];

    public function industry()
    {
        return $this->belongsTo(IptbmIndustry::class, 'iptbm_industry_id', 'id');
    }

    public function iptbmTechnologies()
    {
        return $this->belongsTo(IptbmTechnologyProfile::class, 'iptbm_technology_id');
    }

    public function commodities(): HasMany
    {
        return $this->hasMany(IptbmTechCommodity::class, 'iptbm_industry_id', 'id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(IptbmTechnologyCategory::class, 'iptbm_industry_id', 'id');
    }
}
