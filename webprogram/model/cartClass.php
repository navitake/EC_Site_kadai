<?php
//ショッピングカート


class ShoppingCart{

    private $products = [];
    private $totalPrice = 0;

    function addProduct($array){
        array_push($this->products,$array);
        $this->totalPrice += $array['value'];
    }

    function totalPrice(){
        // foreach($this->products as $index => $product){
        //     $t += $product['value'];
        // }
        $t = $this->totalPrice;
        return $t;
    }

    function numberOfProducts(){
        $p = count($this->products);
        return $p;
    }

    function addSession(){

    }

    function outputProducts(){
        $ps = $this->products;
        return $ps;
    }

    function deleteProduct($index){
        $this->totalPrice -= $this->products[$index]['value'] ; 
        array_splice($this->products,$index,1);
    }
}