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
    private $errorMessage;

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

    /**
     * Customise the parent element that will use the class="row"
     *
     * @param $element
     */
    public function setParentElement($element){

        $element = $this->checkElementTags($element);
        $this->parentElement = trim($element, '>');
        $this->setParentElementClose();
        return $this->parentElement;
    }

    /**
     * Creates a closing tag for the parent element
     */
    private function setParentElementClose(){
        $closeElement = $this->parentElement;
        $this->parentElementClose = str_replace('<', '</', $closeElement);
    }

    /**
     * Customise the parent element that will use the class="bootstrap-class"
     *
     * @param $element
     */
    public function setChildElement($element){
        $element = $this->checkElementTags($element);
        $this->childElement = trim($element, '>');
        $this->setChildElementClose();
    }

    /**
     * Creates a closing tag for the child element
     */
    private function setChildElementClose(){
        $closeElement = $this->childElement;
        $this->childElementClose = str_replace('<', '</', $closeElement);
    }

    /**
     * Checks if the element has an opening and closing tag
     *
     * @param $element
     * @return string
     */
    private function checkElementTags($element)
    {
        $strlen = strlen($element);
        $opening = $element[0];
        $closing = $element[$strlen-1];

        if($opening !='<') {
            $element = '<' . $element;
        }
        if ($closing != '>'){
            $element = $element . '>';
        }
        if ($this->checkElementType($element) == True) {
            return $element;
        } else {
            return false;
        }
    }

    /**
     * Checks if the element is an HTML element
     *
     * @param $element
     * @return bool
     */
    private function checkElementType($element){
        $acceptedValues = ['div', 'section', 'article', 'summary', 'header', 'main'];
        $lastChar = strlen($element) -1;

        $element = trim($element, '>');

        $element = trim($element, '<');

        if(in_array($element, $acceptedValues)) {
            return True;
        } else {
            exit('Not an acceptable Element!');
        }

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