<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InventorAgencyAffiliation extends Model
{
    use HasFactory;

    protected $fillable = [
        'latest_agency',
        'date_affiliated'
    ];

    public function inventor(): BelongsTo
    {
        return $this->belongsTo(IptbmInventor::class, 'iptbm_inventors_id', 'id');
    }
}
