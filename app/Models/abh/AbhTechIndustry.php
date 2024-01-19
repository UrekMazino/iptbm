<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhTechIndustry extends Model
{
    use HasFactory;
    protected $fillable=['name'];

    public function commodities(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AbhTechCommodity::class);
    }
}
