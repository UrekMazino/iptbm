<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmPatentAgentContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'contact'
    ];

    function patent_agent(): BelongsTo
    {
        return $this->belongsTo(IptbmPatentAgent::class, 'patent_agent_id', 'id');
    }
}
