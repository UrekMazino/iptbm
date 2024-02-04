<?php

namespace App\Models\iptbm;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'rrdc_chair',
        'consortium_dir',
        'agency_id',
        'office_address',
        'project_leader',
        'manager',
        'year_established',
        'ip_policy',
        'techno_transfer',
        'logo',
        'tag_line',
        // 'user_id'
    ];
    /*
     *
     * public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(User::class,'user_id','id');
     }
     */

    /*
     * public function region()
    {
        return $this->belongsTo(IptbmRegion::class,'region_id','id');
    }
     */
    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'profile_id', 'id');
    }

    public function agency()
    {
        return $this->belongsTo(IptbmAgency::class, 'agency_id', 'id');
    }

    function contact(): HasMany
    {
        return $this->hasMany(IptbmProfileContact::class, 'iptbm_profiles_id', 'id');
    }

    function contact_mobile(): HasMany
    {
        return $this->hasMany(IptbmProfileContact::class, 'iptbm_profiles_id', 'id')
            ->where('contact_type','mobile');
    }
    function contact_phone(): HasMany
    {
        return $this->hasMany(IptbmProfileContact::class, 'iptbm_profiles_id', 'id')
            ->where('contact_type','phone');
    }
    function contact_fax(): HasMany
    {
        return $this->hasMany(IptbmProfileContact::class, 'iptbm_profiles_id', 'id')
            ->where('contact_type','fax');
    }
    function contact_email(): HasMany
    {
        return $this->hasMany(IptbmProfileContact::class, 'iptbm_profiles_id', 'id')
            ->where('contact_type','email');
    }
    function projects(): HasMany
    {
        return $this->hasMany(IptbmProject::class, 'ip_profile_id', 'id');
    }

    function technologies(): HasMany
    {
        return $this->hasMany(IptbmTechnologyProfile::class, 'iptbm_profile_id', 'id')->with("industries", "statuses", "techgenerators");
    }

    function map_location()
    {
        return $this->hasOne(IptbmMapLocation::class, 'iptbm_profiles_id', 'id');
    }

}
