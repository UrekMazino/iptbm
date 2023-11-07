<?php

namespace App\Rules\iptbm;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class ValueExistsInTable implements ValidationRule
{

    protected array $tableColumnMap;
    private string $attributeName;
    private mixed $message;


    public function __construct(array $tableColumnMap,$attribName,$message = null)
    {
        $this->tableColumnMap = $tableColumnMap;
        $this->attributeName = $attribName;
        $this->message = $message;
    }

    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $attribute = $this->attributeName ?: 'attribute';
        foreach ($this->tableColumnMap as $tableName => $columnName) {
            $count = DB::table($tableName)
                ->where($columnName, $value)
                ->count();
            if ($count > 0) {

                if($this->message){
                    $fail($this->message);

                }else{
                    $fail('The '.$attribute.' is already exists in one of the specified tables.');
                }


            }
        }
    }
}
