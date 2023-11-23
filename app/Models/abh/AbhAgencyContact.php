<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbhAgencyContact extends Model
{
    use HasFactory;
    protected $fillable=['type','contact'];
}
