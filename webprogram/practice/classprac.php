<?php
//電卓を表す
//2つの数値を内部にもつ
//足し算メソッド
//引き算メソッド
//掛け算メソッド
//割り算メソッド

class Calc{
    public $a;
    public $b;

    function input($a,$b){
        $this->a = $a;
        $this->b = $b;
    }

    function add(){
        return $this->a+$this->b;
    }

    function sub(){
        return $this->a-$this->b;
    }

    function mult(){
        return $this->a*$this->b;
    }

    function div(){
        return $this->a/$this->b;
    }
}

//
//
//
//