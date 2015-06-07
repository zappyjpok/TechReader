<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 7/06/2015
 * Time: 10:40 PM
 */

namespace App\Services;


class BootstrapRows {

    private $output = '';
    private $parentElement = '<div';
    private $parentElementClose = '</div>';
    private $childElement = '<div';
    private $childElementClose = '</div>';
    private $columnNumber;
    private $rows;
    private $bootstrapSmClass;
    private $bootstrapMdClass;
    private $bootstrapLgClass;

    private $data = [];

    public function __construct($columnNumber, $data) {
        $this->setData($data);
        $this->columnNumber = $columnNumber;
    }

    private function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function setParentElement(){

    }

    private function setParentElementClose(){

    }

    public function setChildElement(){

    }

    private function setChildElementClose(){

    }

    public function setBootstrapSmClass($smallClass) {
        $this->bootstrapSmClass = $smallClass;
    }

    public function setBootstrapMdClass() {

    }

    public function setBootstrapLgClass() {

    }

    public function createRows(){
        for($i = 0; $i<$this->columnNumber; $i++) {
            $this->output .= $this->parentElement . " class='row'>";
            if(!empty($this->data)){
                $a = $this->arrayShift($this->data);
            }
            foreach($a as $b) {
                $this->output .= $this->childElement . " class='$this->bootstrapSmClass'>";
                $this->output .= $b;
                $this->output .= $this->childElementClose;
                unset($a[$b]);
            }
            $this->output .= $this->parentElementClose;
        }

        return $this->output;
    }

    private function arrayShift(){
        $tempArray = [];
        //count the values
        $values = count($this->data);

        //foreach loop remove $row number of values from the array

        //if greater than rows
        if($values >= 4) {
            for($i = 0; $i < $this->columnNumber; $i++){
                $tempArray[$i] = array_shift($this->data);
            }
        }

        return $tempArray;
    }

}