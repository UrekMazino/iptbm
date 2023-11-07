<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmIpTaskAttachement extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'file',
        'description'
    ];
    public function ip_task(): BelongsTo
    {
       return $this->belongsTo(IptbmIpAlertTask::class,'iptbm_ip_alert_tasks_id','id');
    }
}
