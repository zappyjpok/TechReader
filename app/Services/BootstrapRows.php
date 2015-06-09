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
    private $data = [];
    private $parentElement = '<div';
    private $parentElementClose = '</div>';
    private $childElement = '<div';
    private $childElementClose = '</div>';
    private $columnNumber;
    private $rows;
    private $bootstrapClass;
    private $title = false;
    private $titleData = [];
    private $description = false;
    private $descriptionData = [];
    private $image = false;
    private $imageData = [];
    private $price = false;
    private $priceData = [];
    private $errorMessage = [];

    /**
     *  On instantiation set: number of rows for the page, the column numbers and the data to use
     *
     * @param $columnNumber
     * @param $row
     * @param $data
     */
    public function __construct($columnNumber, $row, $data) {
        $this->columnNumber = $columnNumber;
        $this->rows = $row;
        $this->data = $data;
    }

    /**
     * Customise the parent element that will use the class="row"
     *
     * @param $element
     */
    public function setParentElement($element){

        $element = $this->checkElementTags($element);
        $this->parentElement = $element;
        $this->setParentElementClose();
        $this->parentElement = trim($element, '>');
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
        $this->childElement = $element;
        $this->setChildElementClose();
        $this->childElement = trim($element, '>');
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

    /**
     * Set: bootstrap grid class
     *
     * @param $class
     */
    public function setBootstrapClass($class) {
        $this->bootstrapClass = $class;
    }

    /**
     * Creates a title in each grid
     *

     */
    public function addTitle(){
        $this->title = true;
    }

    /**
     * Creates a description in each grid
     *
     */
    public function addDescription() {
        $this->description = true;
    }

    /**
     * Creates a Image for each grid
     *
     */
    public function addImage() {
        $this->image = true;
    }

    /**
     * Creates a price for each grid
     */
    public function addPrice() {
        $this->price = true;
    }

    private function checkValuesAdded() {
        if ($this->title == true || $this->description == true || $this->image == true ) {
            return true;
        } else {
            exit('Please add either a title, description, or image');
        }
    }
    public function createBootstrapGrid(){
        // Loop through the row:
        // Create opening Tag, content, and closing Tag
        for($i = 0; $i <$this->rows; $i++) {
            $this->output .= $this->parentElement . " class='row'>";
            // content of child elements
            $this->output .= $this->createRow();

            $this->output .= $this->parentElementClose;
        }

        return $this->output;
    }

    private function createRow(){
        $string = '';
        // Check a value added
        if ($this->checkValuesAdded() == true) {
            // loop through number of columns
            for ($i = 0; $i < $this->columnNumber; $i++) {
                // create opening tag, output data, closing tag
                $string .= $this->childElement . " class=" . $this->bootstrapClass . '>';
                $string .= $this->createColumn();
                $string .= $this->childElementClose;
            }
        }
        return $string;
    }

    public function getArray() {
        return $this->titleData;
    }

    public function createColumn(){
        $string = '';
        $array= array_shift($this->data);

        if($this->title == true){
            $title = $array->proTitle;
            $string .= '<h3>' . $title . '</h3>';
        }
        if($this->image == true){
            $image = $array->proImagePath;
            $string .= "<img src='" . $image . "' />'";
        }
        if($this->description == true){
            $description = $array->proDescription;
            $string .= '<p>' . $description . '</p>';
        }
        if($this->price == true){
            $price = $array->proPrice;
            $string .= '<p class="price">  Price $' .  $price . '</p>';
        }

        return $string;
    }


}
