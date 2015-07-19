<?php
/**
 * Created by PhpStorm.
 * User: thuyshawn
 * Date: 7/06/2015
 * Time: 10:40 PM
 */

namespace App\library;


class BootstrapRows {

    private $output = '';
    private $data = [];
    private $shiftData = [];
    private $parentElement = '<div';
    private $parentElementClose = '</div>';
    private $childElement = '<div';
    private $childElementClose = '</div>';
    private $columnNumber;
    private $rows;
    private $bootstrapClass = '';
    private $title = false;
    private $titleName = 'title';
    private $description = false;
    private $descriptionInfo;
    private $image = false;
    private $imageName;
    private $price = false;
    private $priceName;
    private $link = false;
    private $linkURL;
    private $errorMessage = [];

    /**
     *  On instantiation set: number of rows for the page, the column numbers and the data to use
     *
     * @param $columnNumber
     * @param $row
     * @param $data
     */
    public function __construct($columnNumber, $row, $data, $class=null, $title = null, $body = null, $price = null, $image=null)
    {
        if(!is_null($class))
        {
            $this->bootstrapClass = $class;
        }
        if(!is_null($title))
        {
            $this->addTitle($title);
        }
        if(!is_null($body))
        {
            $this->addDescription($body);
        }
        if(!is_null($price))
        {
            $this->addPrice($price);
        }
        if(!is_null($image))
        {
            $this->addImage($image);
        }

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
     * Creates a title in each grid
     *

     */
    private function addTitle($title){
        $this->titleName = $title;
        $this->title = true;
    }

    /**
     * Creates a description in each grid
     *
     */
    private function addDescription($body) {

        $this->descriptionInfo = $body;
        $this->description = true;
    }

    /**
     * Creates a Image for each grid
     *
     */
    private function addImage($image) {
        $this->imageName = $image;
        $this->image = true;
    }

    /**
     * Creates a price for each grid
     */
    private function addPrice($price) {
        $this->priceName = $price;
        $this->price = true;
    }

    /**
     * Creates a link for each grid
     *
     * @param $url
     */
    public function addLink($url){
        $this->linkURL = $url;
        $this->link = true;
    }

    /**
     * Check if any values were added
     *
     * @return bool
     */
    protected function checkValuesAdded() {
        if ($this->title == true || $this->description == true || $this->image == true ) {
            return true;
        } else {
            exit('Please add either a title, description, or image');
        }
    }

    /**
     * Creates the grid
     *
     * @return string
     */
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

    /**
     * Creates the rows
     *
     * @return string
     */
    public function createRow(){
        $string = '';
        // Check if value added
        if ($this->checkValuesAdded() == true) {
            // loop through number of columns
            for ($i = 0; $i < $this->columnNumber; $i++) {
                // create opening tag, output data, closing tag
                $string .= $this->childElement . " class=" . $this->bootstrapClass . "> \n";
                // create shift
                $this->shiftData = array_shift($this->data);
                if(!is_null($this->shiftData['discount']))
                {
                    $string .= $this->createSalesColumn();
                }
                else
                {
                    $string .= $this->createColumn();
                }
                $string .= $this->childElementClose . "\n";
            }
        }
        return $string;
    }

    /**
     * Creates the rows
     *
     * @return string
     */
    private function createColumn(){
        $string = '';

        if($this->title == true){
            $title = $this->shiftData->title;
            $string .= '<h3>';
            if($this->link == true) {
                $string .= '<a href=' . $this->linkURL . '>';
            }
            $string .= $title . "</h3>";
            if($this->link == true) {
                $string .= "</a>\n";
            }
        }
        if($this->image == true){
            $image = $this->shiftData->image;
            $string .= "<img src='" . $image . "' />" . "\n";
        }
        if($this->description == true){
            $description = $this->shiftData->description;
            $string .= '<p>' . $description . '</p>';
        }
        if($this->price == true){
            $price = $this->shiftData->price;
            $string .= '<p class="priceTitle">  Price ';
            $string .= '<span class="price">' . '$' . $price . '</span></p>';
        }

        return $string;
    }

    public function createSalesColumn(){
        $string = '';

        if($this->title == true){
            $title = $this->shiftData->title;
            $string .= '<h3>';
            if($this->link == true) {
                $string .= '<a href=' . $this->linkURL . '>';
            }
            $string .= $title . "</h3>";
            if($this->link == true) {
                $string .= "</a>\n";
            }
        }
        if($this->image == true){
            $image = $this->shiftData->image;
            $string .= "<img src='" . $image . "' />" . "\n";
        }
        if($this->description == true){
            $description = $this->shiftData->description;
            $string .= '<p>' . $description . '</p>';
        }
        if($this->price == true){
            $price = $this->shiftData->price;
            $string .= '<p class="priceCut">  Original Price $';
            $string .= $price . '</p>';
            $string .= "<span class='priceTitle'> Sale Price </span>";
            $string .= "<span class='price'>" . $this->discountPrice($price, $this->shiftData->discount);
            $string .= "</span>";
        }

        return $string;
    }

    /**
     *Create Discount Price
     *
     * @param $price
     * @param $discount
     * @return int|string
     */
    private function discountPrice($price, $discount){
        $discount = (1 - $discount) * $price;
        $discount = number_format($discount, 2);
        return $discount;
    }

    public function getValue() {
        $this->shiftData = array_shift($this->data);
        return gettype($this->data);

    }

}
