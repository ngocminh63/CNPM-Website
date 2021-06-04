<?php
namespace App\Components;

class CheckSearch {

    private $table;
    function checkSearch($keyword){
        
        $arr_keyword = explode(" ", $keyword);
        $str_keyword = "%" . implode("%", $arr_keyword) . "%";
        return $str_keyword;
    }

    function checkChoose($choose){
        if($choose=='cate_name'){
            $table = 'categories';
        }else{
            $table = 'products';
        }
        return $table;
    }
    
    function checkState($choose,$keyword){
        if($choose=='state'){
            if($keyword =='còn hàng'){
                $keyword=1;
            }elseif($keyword=='hết hàng'){
                $keyword=0;
            }else{
                $keyword=2;
            }
        }
        return $keyword;
    }


}

?>