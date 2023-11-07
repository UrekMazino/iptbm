<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmIpTaskInchargeUnit extends Model
{
    use HasFactory;
    protected $fillable=[
        'ip_alert_task_id',
        'name'
    ];
}
