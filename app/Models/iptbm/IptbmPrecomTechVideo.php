<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmPrecomTechVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'commercialization_precoms_id',
        'thumbnail',
        'description',
        'type',
        'url'
    ];

    public function precom()
    {
        return $this->belongsTo(IptbmCommercializationPrecom::class, 'commercialization_precoms_id', 'id');
    }

}
