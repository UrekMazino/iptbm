<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmIpTaskNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_alert_task_id',
        'frequency',
        'notification_details',
        'day_of_week',
        'time_of_day'
    ];

    public function ip_task_stage(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlertTask::class, 'ip_alert_task_id', 'id');
    }
}
