<?php

namespace App\Models\iptbm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IptbmExtensionAdoptorContact extends Model
{
    use HasFactory;
    protected $fillable=[
        'extension_adoptor_id',
        'type',
        'contact'
    ];
}
