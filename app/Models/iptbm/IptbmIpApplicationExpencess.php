<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmIpApplicationExpencess extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'amount'
    ];

    public function IptbmIpAlert(): BelongsTo
    {
        return $this->belongsTo(IptbmIpAlert::class, 'iptbm_ip_alerts_id', 'id');
    }
}
