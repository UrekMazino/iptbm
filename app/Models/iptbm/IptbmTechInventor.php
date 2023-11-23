<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmTechInventor extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_technology_id',
        'iptbm_inventors_id'
    ];

    function inventor(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmInventor::class, 'iptbm_inventors_id', 'id');
    }

    public function technology(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class, 'iptbm_technology_id', 'id');
    }

}
