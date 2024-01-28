<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class AbhTechnologyGenerator extends Model
{
    use HasFactory;
    public function technology(): HasOne
    {
        return $this->hasOne(AbhTechnologyProfile::class,'abh_technology_profile_id','id');
    }
}
