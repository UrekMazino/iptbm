<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbhGenerator extends Model
{
    use HasFactory;
    protected $fillable=[
        'first_name',
        'middle_name',
        'last_name',
        'suffix',
        'address'
    ];

    public function profile(): BelongsTo
    {
        return $this->belongsTo(AbhProfile::class,'abh_profile_id','id');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(AbhGeneratorsContac::class,'abh_generator_id','id');
    }

    public function technologies(): HasMany
    {

        return $this->hasMany(AbhTechnologyGenerator::class,'abh_technology_profile_id','id');

    }
    public function expertise(): HasMany
    {
        return $this->hasMany(AbhGeneratorExpertise::class,'abh_generator_id','id');
    }
}
