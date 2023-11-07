<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmIndusPartner extends Model
{
    use HasFactory;
    protected $fillable=[
        'industry_partners_id',
        'type',
        'contact'
    ];
}
