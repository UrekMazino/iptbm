<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhProfileContact extends Model
{
    use HasFactory;

    protected $fillable=[
        'type',
        'contact'
    ];
}
