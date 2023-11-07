<?php

namespace App\Http\Controllers\iptbm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordGenerator extends Controller
{


    private mixed $min;
    private mixed $max;
    private mixed $password;
    private mixed $tempPassArray;

    public function __construct($min, $max)
    {
        $this->min=$min;
        $this->max=$max;
        $this->tempPassArray=[];
    }

    public function withNumbers()
    {

    }
    public function withLetters()
    {

    }
    public function withSymbols()
    {

    }


}
