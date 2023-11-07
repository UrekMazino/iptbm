<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmIpTask extends Model
{
    use HasFactory;
    protected $fillable=[
        'ip_type_id',
        'task_name'
    ];

    function ip_type(): BelongsTo
    {
        return $this->belongsTo(IpType::class,'ip_type_id','id');
    }

    function stages(): HasMany
    {
        return $this->hasMany(IptbmIpTaskStage::class,"ip_task_id","id");
    }

}
