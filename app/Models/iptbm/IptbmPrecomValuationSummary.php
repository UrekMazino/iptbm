<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmPrecomValuationSummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'file_type',
        'file'
    ];

    function commercialization_precom()
    {
        return $this->belongsTo(IptbmCommercializationPrecom::class, 'iptbm_precoms_id', 'id');
    }
}
