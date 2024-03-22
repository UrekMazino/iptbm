<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;


class IptbmTechnologyProfile extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'iptbm_profile_id',
        'title',
        'year_developed',
        'tech_desc',
        'tech_photo',
        'tech_owner',
        'tech_research_proj',
        'tech_agency_res_donor',
        'tech_res_amount',
        'tech_trans_plan',
    ];
    public function getTechPhotoAttribute($value): string
    {

        if($value)
        {
            return Storage::exists($value)? $value:'public/temp.jpg';
        }else{
            return  'public/temp.jpg';
        }

    }


    function iptbmprofiles(): BelongsTo
    {
        return $this->belongsTo(IptbmProfile::class, 'iptbm_profile_id', 'id');
    }

    function owner(): HasMany
    {
        return $this->hasMany(IptbmTechOwner::class, 'iptbm_technology_profiles_id', 'id');
    }

    function industries(): HasMany
    {
        return $this->hasMany(IptbmTechIndustry::class, 'iptbm_technology_id', 'id');
    }

    function statuses(): HasMany
    {
        return $this->hasMany(IptbmTechStatus::class, "iptbm_technology_profile_id", "id");
    }

    function techgenerators(): HasMany
    {
        return $this->hasMany(IptbmTechInventor::class, "iptbm_technology_id", "id");
    }

    function researchprojects(): HasMany
    {
        return $this->hasMany(IptbmTechResearchProject::class, "iptbm_technology_id", "id");
    }

    function full_description(): HasOne
    {
        return $this->hasOne(IptbmFullTechDescription::class, "iptbm_technology_profile_id", "id");
    }

    function ip_applications(): HasMany
    {
        return $this->hasMany(IptbmIpAlert::class, "technology_id", "id");
    }


    function pre_commercialization(): HasMany
    {
        return $this->hasMany(IptbmCommercializationPrecom::class, 'technology_id', 'id');
    }

    function commercial_adopters(): HasMany
    {
        return $this->hasMany(IptbmCommercializationAdopter::class, "technology_id", "id");
    }

    function deployment(): hasMany
    {
        return $this->hasMany(IptbmDeploymentPathway::class, 'technology_id', 'id');
    }

    function extension(): hasMany
    {
        return $this->hasMany(IptbmExtensionPathway::class, 'technology_id', 'id');
    }

}
