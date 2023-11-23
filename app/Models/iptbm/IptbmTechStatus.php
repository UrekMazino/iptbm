<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmTechStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_technology_profile_id',
        'status'
    ];

    public function technology_profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class, "iptbm_technology_profile_id", "id");
    }
}
