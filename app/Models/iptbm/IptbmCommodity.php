<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IptbmCommodity extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];

    public function industry(): BelongsTo
    {
        return $this->belongsTo(IptbmIndustry::class,'iptbm_industry_id','id');
    }
}
