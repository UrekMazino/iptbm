<?php

namespace App\Rules\iptbm;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ContactCounter implements ValidationRule
{
    public $max;
    public $table;
    public $column;
    public $message;
    public $contactType;
    public $columnTypeName;

    public function __construct($max, $table, $column, $columnTypeName, $contactType, $message)
    {
        $this->max = $max;
        $this->table = $table;
        $this->column = $column;
        $this->message = $message;
        $this->contactType = $contactType;
        $this->columnTypeName = $columnTypeName;
    }

    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = DB::table($this->table)
            ->where($this->columnTypeName, $this->contactType)
            ->count($this->column);
        if ($count == $this->max) {
            $fail($this->message);
        }

    }
}
