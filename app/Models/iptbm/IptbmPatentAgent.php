<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmPatentAgent extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'address'
    ];
    function ip_alert(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlert::class,'ip_alert_id','id');
    }

    function agent_contact(): HasMany
    {
        return $this->hasMany(IptbmPatentAgentContact::class,'patent_agent_id','id');
    }
}
