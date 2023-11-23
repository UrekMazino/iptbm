<?php

namespace App\Rules;

use App\Models\iptbm\IptbmExtensionPathway;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Sample implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $extension = IptbmExtensionPathway::where('technology_id',)->exists();
    }
}
