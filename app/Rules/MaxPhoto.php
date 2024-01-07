<?php

namespace App\Rules;

use Closure;
use DB;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class MaxPhoto implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): PotentiallyTranslatedString  $fail
     */

    public string $table;
    public string $techId;

    public string $message;
    public string $max;
    public string $idColumn;

    public function __construct($table,$techId,$idColumn,$max,$message)
    {
        $this->max=$max;

        $this->message=$message;
        $this->table=$table;
        $this->idColumn=$idColumn;
        $this->techId=$techId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count= DB::table($this->table)->where($this->idColumn,$this->techId)->count();
        if($count==$this->max)
        {
            $fail($this->message);
        }

    }
}
