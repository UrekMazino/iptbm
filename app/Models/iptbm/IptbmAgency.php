<?php

namespace App\Models\iptbm;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class IptbmAgency extends Model
{
    use HasFactory;
    protected $fillable=[
        'iptbm_region_id',
        'name',
        'address',
        'verified_at'
    ];
    public function region(): BelongsTo
    {
        return $this->belongsTo(IptbmRegion::class,"iptbm_region_id","id");
    }
    public function head(): HasOne
    {
       return $this->hasOne(AgencyHead::class,'iptbm_agency_id','id');
    }

    public function Users(): HasMany
    {
        return $this->hasMany(User::class,'agency_id','id');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(AgencyContact::class,'iptbm_agency_id','id');
    }

    public function profiles(): HasOne
    {
       return $this->hasOne(IptbmProfile::class,'agency_id','id');
    }


}
