<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmTechResearchFunder extends Model
{
    use HasFactory;
    protected $fillable=[
        'iptbm_agencies_id'
    ];
    public function technology_research(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmTechResearchProject::class,'iptbm_tech_research_id','id');
    }
    public function agency(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmAgency::class,'iptbm_agencies_id','id');
    }
}
