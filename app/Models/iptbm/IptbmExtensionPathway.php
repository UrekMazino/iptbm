<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IptbmExtensionPathway extends Model
{
    use HasFactory;

    protected $fillable = [
        'technology_id',
        'adoptor_name',
        'address',
    ];

    function technology()
    {
        return $this->belongsTo(IptbmTechnologyProfile::class, 'technology_id', 'id');
    }

    function contacts(): HasMany
    {
        return $this->hasMany(IptbmExtensionAdoptorContact::class, 'extension_adoptor_id', 'id');
    }
}
