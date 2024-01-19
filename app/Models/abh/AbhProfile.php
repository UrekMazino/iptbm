<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AbhProfile extends Model
{
    use HasFactory;

    protected $fillable = [
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

    public function agency()
    {
        return $this->hasOne(AbhAgency::class,'abh_profile_id','id');

    }

    public function region(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
    {
        return $this->hasOneThrough(
            AbhRegion::class,
            AbhAgency::class,
            'abh_region_id',
            'id',
            'id',
            'abh_region_id',
        );
    }

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
        return $this->hasMany(AbhProfileContact::class)->where('type', 'phone');
    }

    public function contacts_faxes(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class)->where('type', 'fax');
    }

    public function contacts_emails(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class)->where('type', 'email');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(AbhProject::class);
    }

    public function technologies(): HasMany
    {
        return $this->hasMany(AbhTechnologyProfile::class);
    }


}
