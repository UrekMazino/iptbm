<?php

namespace App\Rules\iptbm;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class MaxContact implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString $fail
     */

    public $max;
    public $table;
    public $column;
    public $message;
    public $contactType;
    public $columnTypeName;
    public $baseId_name;
    public $baseId_value;

    public function __construct($max, $table, $column, $columnTypeName, $contactType, $baseId_name, $baseId_value, $message)
    {
        $this->max = $max;
        $this->table = $table;
        $this->column = $column;
        $this->message = $message;
        $this->contactType = $contactType;
        $this->columnTypeName = $columnTypeName;
        $this->baseId_name = $baseId_name;
        $this->baseId_value = $baseId_value;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $count = DB::table($this->table)
            ->where($this->columnTypeName, $this->contactType)
            ->where($this->baseId_name, $this->baseId_value)
            ->count($this->column);
        if ($count >=$this->max) {
            $fail($this->message);
        }
    }
}
