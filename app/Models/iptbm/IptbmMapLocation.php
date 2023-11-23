<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmMapLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat',
        'long'
    ];

    function profile(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(IptbmProfile::class, 'iptbm_profiles_id', 'id');
    }
}
