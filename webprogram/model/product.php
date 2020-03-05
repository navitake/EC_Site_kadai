<?php

class Product{
    public $id;
    public $name;
    public $code;
    public $value;
    public $color;
    public $size;
    public $filepath;

    private $productList;

    function openJson($path){
        if(file_exists($path)){
        $json = file_get_contents($path);
        $list = json_decode($json);
        }else{
            $list = [];
        }
        $this->productList = $list;
    }

    function addJson($path){
        array_push($this->productList,$this);
        var_dump($this->productList);
        $json = json_encode($this->productList,JSON_PRETTY_PRINT);
        file_put_contents("json/productList.json",$json);
    }
}

class Products{
    public $productList;

    function openJson($path){
        if(file_exists($path)){
        $json = file_get_contents($path);
        $list = json_decode($json);
        }else{
            $list = [];
        }
        $this->productList = $list;
    }

    function codeColumn(){
        $column = array_column($this->productList,'code');
        return $column;
    }
}