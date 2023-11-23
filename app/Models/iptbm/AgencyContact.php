<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_type',
        'contact',
    ];
}
