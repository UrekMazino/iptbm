<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmTechOwner extends Model
{

    use HasFactory;
    protected $fillable=[
        'iptbm_agencies_id'
    ];

    public function agency()
    {
        return $this->belongsTo(IptbmAgency::class,'iptbm_agencies_id','id');
    }
    public function technology(): BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class,'iptbm_technology_profiles_id','id');
    }
}
