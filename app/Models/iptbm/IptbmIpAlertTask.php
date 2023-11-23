<?php

namespace App\Models\iptbm;

use App\Models\DeadlineEndTask;
use App\Models\IptbmSendNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Scout\Searchable;

class IptbmIpAlertTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ip_alert_id',
        'stage_id',
        'task_group_name',
        'priority',
        'task_status',
        'deadline',
        'description',
        'attachment',
    ];


    function ip_alert(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlert::class, 'ip_alert_id', 'id');
    }

    function stage(): BelongsTo
    {
        return $this->belongsTo(IptbmIpTaskStage::class, 'stage_id', 'id');
    }

    function personnel(): HasMany
    {
        return $this->hasMany(IptbmIpTaskPersonel::class, 'ip_alert_task_id', 'id');
    }

    function units(): HasMany
    {
        return $this->hasMany(IptbmIpTaskInchargeUnit::class, 'ip_alert_task_id', 'id');
    }

    function task_deadline(): HasOne
    {
        return $this->hasOne(TaskDeadline::class, 'ip_alert_task_id', 'id');
    }

    function ip_task_stage_notifications(): hasOne
    {
        return $this->hasOne(IptbmIpTaskNotification::class, 'ip_alert_task_id', 'id');
    }

    function dailySend()
    {
        return $this->hasOne(IptbmSendNotification::class, 'ipptbm_alert_task_id', 'id');
    }

    function UnfinishedTask(): HasOne
    {
        return $this->hasOne(DeadlineEndTask::class, 'ipptbm_alert_task_id', 'id');
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(IptbmIpTaskAttachement::class, 'iptbm_ip_alert_tasks_id', 'id');
    }

}
