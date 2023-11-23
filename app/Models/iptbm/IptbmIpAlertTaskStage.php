<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmIpAlertTaskStage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_alert_task_id',
        'ip_task_stage_id'
    ];


    function ip_alert_task(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlertTask::class, 'ip_alert_id', 'id');
    }
}
