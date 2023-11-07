<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmIpTaskStage extends Model
{
    use HasFactory;
    protected $fillable=[
        'ip_task_id',
        'stage_name'
    ];


    function task(): BelongsTo
    {
        return $this->belongsTo(IptbmIpTask::class,"ip_task_id","id");
    }

    function applications(): HasMany
    {
        return $this->hasMany(IptbmIpAlertTask::class,"stage_id","id");
    }
}
