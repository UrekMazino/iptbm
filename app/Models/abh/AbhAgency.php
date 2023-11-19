<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhAgency extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'address'
    ];

    function profile()
    {
        return $this->belongsTo(AbhProfile::class,'abh_profiles_id','id');
    }
}
