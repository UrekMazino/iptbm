<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbhTechnologyStatus extends Model
{
    use HasFactory;
    protected $fillable=['status_name'];
    public function technology(): BelongsTo
    {
        return $this->belongsTo(AbhTechnologyProfile::class);
    }
}
