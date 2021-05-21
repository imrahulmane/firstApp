<?php


namespace App\controllers;


//use App\services\TestService;

class TestController
{
    public function addNum($num1, $num2) {
        $addition =  $num1 + $num2;
        return ["Sum is " => $addition];
    }

    public function subtract($num1, $num2) {
        $sub = $num1 - $num2;
        return ['Subtraction is ' => $sub];
    }

    public function multiply($num1, $num2) {
        $mul = $num1 * $num2;
        return ['Multiplication is ' => $mul];
    }

    public function divide($num1, $num2) {
        $div = $num1 / $num2;
        return ['Division is ' => $div];
    }

    public function modulo($num1, $num2) {
        $mod = $num1 % $num2;
        return ['Mod is ' => $mod];
    }
}