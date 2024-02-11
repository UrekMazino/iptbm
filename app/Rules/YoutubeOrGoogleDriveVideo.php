<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class YoutubeOrGoogleDriveVideo implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        if(!preg_match('/^(https?:\/\/)?(www\.)?(youtube\.com\/embed\/|drive\.google\.com\/file\/d\/)/', $value))
        {
            $fail("The :attribute must be a valid YouTube or Google Drive video URL.");
        }
    }
}
