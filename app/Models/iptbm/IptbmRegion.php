<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmRegion extends Model
{
    use HasFactory;

    protected $fillable = [

        'rrdcc_chair',
        'name',
        'consortium',
        'consortium_director',
    ];

    public function agencies(): HasMany
    {
        return $this->hasMany(IptbmAgency::class, 'iptbm_region_id', 'id');
    }

    public function iptbms()
    {
        return $this->hasManyThrough(IptbmProfile::class,IptbmAgency::class,'iptbm_region_id','agency_id','id','id');
    }
}
