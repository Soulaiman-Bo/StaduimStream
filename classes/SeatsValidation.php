<?php 


class SeatsValidation extends Exception
{
    private $parramArray = [];

    public function __construct($parramArray, $message)
    {
        parent::__construct($message);
        $this->parramArray = $parramArray;

    }

    public function getCustomMessage(){
        if($this->parramArray['seats_left'] === 0){
            return $this->parramArray['category'] . " category is Sold Out";
        }else {
            return "Invalid Input: Only " . $this->parramArray['seats_left'] . " Tickets Left in The Basic Category";
        }
    }
    
}