<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class AbhTechnologyProfile extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'year_developed',
        'tech_desc',
        'tech_photo'
    ];

    public function profile(): BelongsTo
    {
       return  $this->belongsTo(AbhProfile::class,'abh_profile_id','id');
    }




    public function co_owner(): HasMany
    {
        return $this->hasMany(AbhTechOwner::class,'abh_technology_profile_id','id');
    }
    public function co_owner_name(): HasManyThrough
    {
        return $this->hasManyThrough(AbhAgency::class,AbhTechOwner::class);
    }

    public function status(): HasMany
    {
        return $this->hasMany(AbhTechnologyStatus::class);
    }
    public function industries(): HasMany
    {
        return $this->hasMany(AbhTechnologyIndustry::class);
    }
}
