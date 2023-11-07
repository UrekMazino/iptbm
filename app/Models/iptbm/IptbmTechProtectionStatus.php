<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmTechProtectionStatus extends Model
{
    use HasFactory;
    protected $fillable=[
        'protection_status'
    ];
}
