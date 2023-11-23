<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskDeadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_alert_task_id',
        'frequency',
        'description',
        'day_of_week',
        'time_day'
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlertTask::class, 'ip_alert_task_id', 'id');
    }
}
