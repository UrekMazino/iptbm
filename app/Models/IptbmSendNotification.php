<?php

namespace App\Models;

use App\Models\iptbm\IptbmIpAlertTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmSendNotification extends Model
{
    use HasFactory;

    public function ipAlertTask(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlertTask::class, 'ipptbm_alert_task_id', 'id');
    }
}
