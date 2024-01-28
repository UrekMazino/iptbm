<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbhGeneratorAffiliation extends Model
{
    use HasFactory;
    protected $fillable=['abh_agency_id'];

    public function agency(): BelongsTo
    {
        return $this->belongsTo(AbhAgency::class,'abh_agency_id','abh_agencies');
    }

    public function generator(): BelongsTo
    {
        return $this->belongsTo(AbhGenerator::class,'abh_generator_id','id');
    }
}
