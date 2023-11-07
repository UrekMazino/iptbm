<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmFullTechPhoto extends Model
{
    use HasFactory;
    protected $fillable=[
        'file_type',
        'file_description',
        'file',
    ];
    function full_tech_description(): BelongsTo
    {
        return $this->belongsTo(IptbmFullTechDescription::class,'iptbm_full_tech_descriptions_id','id');
    }
}
