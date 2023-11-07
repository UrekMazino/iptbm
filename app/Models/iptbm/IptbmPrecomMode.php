<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmPrecomMode extends Model
{
    use HasFactory;
    protected $fillable=[
        'commercialization_mode'
    ];

    function precom()
    {
        return $this->belongsTo(IptbmCommercializationPrecom::class,'iptbm_commercialization_precoms_id','id');
    }

}
