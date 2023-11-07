<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmTechnologyAdoptor extends Model
{
    use HasFactory;
    protected $fillable=['adoptor_name'];

    function tech_full_description(): BelongsTo
    {
        return $this->belongsTo(IptbmFullTechDescription::class,'full_tech_id','iptbm_full_tech_descriptions');
    }
}
