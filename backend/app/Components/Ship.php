<?php
namespace App\Components;

class Ship {

    function address($address){
        
        $arr_address = explode(" ", $address);
        $str_address= "%" . implode("%", $arr_address) . "%";
        return $str_address;
    }

}

?>