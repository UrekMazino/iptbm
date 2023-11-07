<?php

namespace App\Rules;

use Closure;
use DB;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class FullNameValidation implements ValidationRule
{


    public $firstNameColumn;
    public $middleNameColumn;
    public $lastNameColumn;
    public $suffixColumn;
    public $table;
    public $message;
    public $baseId;
    public function __construct($table, $fullName,$message=null,$baseId=null)
    {
       $this->table=$table;
       $this->firstNameColumn=$fullName['first_name'];
       $this->middleNameColumn=$fullName['middle_name'];
       $this->lastNameColumn=$fullName['last_name'];
       $this->suffixColumn=$fullName['suffixes'];
       $this->message=$message;
       $this->baseId=$baseId;
    }
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query= DB::table($this->table)
            ->where($this->firstNameColumn[0],$this->firstNameColumn[1])
            ->where($this->lastNameColumn[0],$this->lastNameColumn[1]);
        if($this->middleNameColumn[1])
        {
            $query->where($this->middleNameColumn[0],$this->middleNameColumn[1]);
        }
        if($this->suffixColumn[1])
        {
            $query ->where($this->suffixColumn[0],$this->suffixColumn[1]);
        }
        if($this->baseId)
        {
            $query->whereNotIn ('id',[$this->baseId]);
        }
        if($query->exists())
        {
            if($this->message)
            {
                $fail($this->message);
            }else
            {
                $fail("The system found an existing record. please check the name and try again.");
            }
        }
    }
}
