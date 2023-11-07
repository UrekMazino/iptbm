<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmComercialAdopterContact extends Model
{
    use HasFactory;
    protected $fillable=[
        'commercial_adoptor_id',
        'type',
        'contact'
    ];


}
