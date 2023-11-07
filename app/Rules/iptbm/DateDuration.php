<?php

namespace App\Rules\iptbm;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class DateDuration implements ValidationRule
{
    public  $startingDate;

    public $message;
    public function __construct($startingDate,$message)
    {

        $this->startingDate = Carbon::parse($startingDate);
        $this->message=$message;
    }
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        try {
            $date = Carbon::parse($value);

            // Check if the date is valid
            if (!$date->isValid()) {
                $fail($this->message);
            }
        } catch (\Exception $e) {
            $fail($this->message);
        }


        $val= Carbon::createFromFormat('F-d-Y',$value);
       // $date=$val->format('Y-m-d');

        if($val->lt($this->startingDate))
        {
            $fail($this->message);
        }

    }
}
