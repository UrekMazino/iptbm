<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbhGeneratorStatus extends Model
{
    use HasFactory;

    protected $fillable=['status'];

    public function generator(): BelongsTo
    {
        return $this->belongsTo(AbhGenerator::class,'abh_generator_id','id');
    }
}
