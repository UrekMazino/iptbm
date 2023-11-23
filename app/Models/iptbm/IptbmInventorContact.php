<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmInventorContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'iptbm_inventor_id',
        'type',
        'contact'
    ];

}
