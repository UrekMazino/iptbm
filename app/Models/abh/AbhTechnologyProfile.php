<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbhTechnologyProfile extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'year_developed',
        'tech_desc',
        'tech_photo'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(AbhProfile::class)->where('abh_profiles_id','id');
    }
}
