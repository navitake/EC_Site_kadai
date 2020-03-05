<?php 
//公開修飾子 public
//非公開修飾子 private
class Product{
    public $name;
    public $code;
    public $price;

    function printDetail(){
        print $this->name;
        print $this->code;
        print $this->price;
    }

    function taxPrice($rate){
        return $this->price * $rate;
    }
}

//classはインスタンスを作成しなければ使えない

$irohasu = new Product();
$irohasu->name = 'いろはす';

$ucc_coffee = new Product();
$ucc_coffee->name = 'ucc 珈琲';


$irohasu->printDetail();
$ucc_coffee->printDetail();

$ucc_coffee->price = 120;
echo $ucc_coffee->taxPrice(0.08);
