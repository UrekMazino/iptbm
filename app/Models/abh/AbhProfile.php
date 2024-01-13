<?php

namespace App\Models\abh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AbhProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'rrdc_chair',
        'consortium_dir',
        'office_address',
        'project_leader',
        'manager',
        'year_established',
        'ip_policy',
        'techno_transfer',
        'logo',
        'tag_line',
    ];

    public function agency(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(AbhAgency::class, 'abh_profiles_id', 'id');
    }

    public function contacts_mobiles(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class, 'abh_profiles_id', 'id')->where('type', 'mobile');
    }

    public function contact(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class,'abh_profiles_id','id');
    }
    public function contacts_phones(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class, 'abh_profiles_id', 'id')->where('type', 'phone');
    }

    public function contacts_faxes(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class, 'abh_profiles_id', 'id')->where('type', 'fax');
    }

    public function contacts_emails(): HasMany
    {
        return $this->hasMany(AbhProfileContact::class, 'abh_profiles_id', 'id')->where('type', 'email');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(AbhProject::class, 'abh_profiles_id', 'id');
    }


}
