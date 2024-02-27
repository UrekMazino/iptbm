<?php

namespace App\Models\abh;

use App\Models\iptbm\IptbmAgency;
use App\Models\iptbm\IptbmMapLocation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AbhProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_agency_id',
        'rrdc_chair',
        'consortium_dir',
        'office_address',
        'project_leader',
        'manager',
        'year_established',
        'ip_policy',
        'techno_transfer',
        'logo',
        'tag_line',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class,'abh_profile_id','id');
    }

    public function agency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmAgency::class,'iptbm_agency_id','id');
    }
   /*
    * this  was for separated table from ABH agency
    *  public function agency(): HasOne
    {
        return $this->hasOne(AbhAgency::class,'abh_profile_id','id');

    }
    */



    public function contacts_mobiles(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class,'abh_profile_id','id')->where('type', 'mobile');
    }

    public function contact(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class);
    }
    public function contacts_phones(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class,'abh_profile_id','id')->where('type', 'phone');
    }

    public function contacts_faxes(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class,'abh_profile_id','id')->where('type', 'fax');
    }

    public function contacts_emails(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class,'abh_profile_id','id')->where('type', 'email');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(AbhProject::class);
    }



    function map_location(): HasOne
    {
        return $this->hasOne(AbhMapLocation::class, 'abh_profiles_id', 'id');
    }

}
