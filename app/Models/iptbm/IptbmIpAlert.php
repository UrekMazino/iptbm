<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class IptbmIpAlert extends Model
{
    use HasFactory;
    protected $fillable=[
        'technology_id',
        'ip_type_id',
        'application_number',
        'date_of_filing',
        'protection_status',
        'abstract',
        'agent_name',
        'address',
     //   'ip_total_cost'
    ];

    public function expenses(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IptbmIpApplicationExpencess::class,'iptbm_ip_alerts_id','id');
    }

    function technology(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmTechnologyProfile::class,"technology_id","id");
    }

    function protectionStatus():  \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return $this->belongsTo(IptbmTechProtectionStatus::class,'protection_status','id');
    }

    function ip_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IpType::class,"ip_type_id","id");
    }

    function patent_agent(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IptbmPatentAgent::class,'ip_alert_id','id');
    }

    function ip_task(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(IptbmIpAlertTask::class,"ip_alert_id","id");
    }

}
