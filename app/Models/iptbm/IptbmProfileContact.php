<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmProfileContact extends Model
{
    use HasFactory;
    protected $fillable=[
        'iptbm_profiles_id',
        'contact_type',
        'contact'
    ];

    public function profile()
    {
        return $this->belongsTo(IptbmProfile::class,'iptbm_profiles_id','id');
    }
}
