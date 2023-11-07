<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IpType extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    function tasks(): HasMany
    {
        return $this->hasMany(IptbmIpTask::class,"ip_type_id","id");
    }
}
