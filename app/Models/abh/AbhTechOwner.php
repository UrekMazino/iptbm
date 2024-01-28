<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbhTechOwner extends Model
{
    use HasFactory;
    protected $fillable=['abh_agency_id'];
    public function technology(): BelongsTo
    {
        return $this->belongsTo(AbhTechnologyProfile::class);
    }
    public function agency(): BelongsTo
    {
        return $this->belongsTo(AbhAgency::class,'abh_agency_id','id');
    }


}
