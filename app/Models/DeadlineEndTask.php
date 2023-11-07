<?php

namespace App\Models;

use App\Models\iptbm\IptbmIpAlertTask;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeadlineEndTask extends Model
{
    use HasFactory;

    public function ipAlertTask(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmIpAlertTask::class,'ipptbm_alert_task_id','id');
    }
}
