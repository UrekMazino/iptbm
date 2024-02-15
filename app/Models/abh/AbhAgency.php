<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class AbhAgency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'address',
        'head'
    ];

    function profile(): BelongsTo
    {
        return $this->belongsTo(AbhProfile::class,'abh_profile_id','id');
    }

    function region(): BelongsTo
    {
        return $this->belongsTo(AbhRegion::class,'abh_region_id','id');
    }

    public function mobile_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class,'abh_agency_id','id')->where("type", 'mobile');
    }

    public function phone_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class,'abh_agency_id','id')->where("type", 'phone');
    }

    public function fax_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class,'abh_agency_id','id')->where("type", 'fax');
    }

    public function email_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class,'abh_agency_id','id')->where("type", 'email');
    }
    public function contacts(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class,'abh_agency_id','id');
    }

    public function owned_technologies(): HasManyThrough
    {
        return $this->hasManyThrough(AbhTechnologyProfile::class,AbhProfile::class);
    }

    public function co_owned_technology(): HasManyThrough
    {
        return $this->hasManyThrough(AbhTechnologyProfile::class,AbhTechOwner::class);
    }


}
