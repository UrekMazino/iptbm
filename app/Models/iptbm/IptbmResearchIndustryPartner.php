<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmResearchIndustryPartner extends Model
{
    use HasFactory;

    protected $fillable=[
        'iptbm_tech_project_id',
        'industry_name',
        'address',
        'phone',
        'mobile',
        'fax',
        'email'
    ];

    function research_project(): BelongsTo
    {
        return $this->belongsTo(IptbmTechResearchProject::class,"iptbm_tech_project_id","id");
    }
    function research_partners(): HasMany
    {
        return $this->hasMany(IptbmIndusPartner::class,"industry_partners_id","id");
    }

}
