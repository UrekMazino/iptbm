<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhMapLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'long'
    ];

    public function abh_profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AbhProfile::class,'abh_profiles_id','id');
    }
}
