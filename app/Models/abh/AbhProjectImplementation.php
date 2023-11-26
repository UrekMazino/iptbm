<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhProjectImplementation extends Model
{
    use HasFactory;
    protected $fillable=[
        'date_started',
        'duration',
        'extended_duration',
        'budget'
    ];
}
