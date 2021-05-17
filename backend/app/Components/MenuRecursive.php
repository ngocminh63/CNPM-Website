<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecursive {

        private $html;

        public function __construct(){
            $this->html = '';
        }

        public function MenuRecursiveAdd($parentId = 0, $subMark = ''){
            $data = Menu::where('parent_id', $parentId)->get();
            foreach($data as $dataItem){
                $this->html .= "<option value = '".$dataItem['id']."'>".$subMark.$dataItem['name']."</option>";
                $this->MenuRecursiveAdd($dataItem['id'], $subMark.'--');
            }
            return $this->html;
        }

        public function MenuRecursiveEdit($parentIdMenuEdit, $parentId = 0, $subMark = ''){
            $data = Menu::where('parent_id', $parentId)->get();
            foreach($data as $dataItem){
                if($parentIdMenuEdit == $dataItem['id']){
                    $this->html .= "<option selected value = '".$dataItem['id']."'>".$subMark.$dataItem['name']."</option>";
                }else{    
                    $this->html .= "<option value = '".$dataItem['id']."'>".$subMark.$dataItem['name']."</option>";
                }
                $this->MenuRecursiveEdit($parentIdMenuEdit, $dataItem['id'], $subMark.'--');
            }
            return $this->html;
        }
    }


?>