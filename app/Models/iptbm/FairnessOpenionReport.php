<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FairnessOpenionReport extends Model
{
    use HasFactory;
    protected $fillable=[
        'precom_id',
        'pdf_file'
    ];
    public function pre_commercialization(): BelongsTo
    {
        return $this->belongsTo(IptbmCommercializationPrecom::class,'precom_id','id');
    }
}
