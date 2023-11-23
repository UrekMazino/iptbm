<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgencyHead extends Model
{
    use HasFactory;

    protected $fillable = [
        'head',
        'designation',
        'email',
        'mobile',
        'fax',
        'tel'
    ];
}
