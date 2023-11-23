<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbhAgency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'head'
    ];

    function profile(): BelongsTo
    {
        return $this->belongsTo(AbhProfile::class, 'abh_profiles_id', 'id');
    }

    function region(): BelongsTo
    {
        return $this->belongsTo(AbhRegion::class, 'abh_regions_id', 'id');
    }

    public function mobile_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class, 'abh_agencies_id', 'id')->where("type", 'mobile');
    }

    public function phone_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class, 'abh_agencies_id', 'id')->where("type", 'phone');
    }

    public function fax_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class, 'abh_agencies_id', 'id')->where("type", 'fax');
    }

    public function email_contact(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class, 'abh_agencies_id', 'id')->where("type", 'email');
    }
    public function contacts(): HasMany
    {
        return $this->hasMany(AbhAgencyContact::class,'abh_agencies_id','id');
    }
}
