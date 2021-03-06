<?php

namespace NetsSdk;

class Price {
    
    protected $_amount;
    protected $_currency;
    
    public function __construct($amount = false, $currency = false){
        if($amount)   { $this->setAmount($amount); }
        if($currency) { $this->setCurrency($currency); }
    }
    
    
    public function getAmount() {
        return $this->_amount;
    }

    public function getCurrency() {
        return $this->_currency;
    }
    
    /**
     * Set the price amount. 
     * Use punctuation (.) instead of comma (,) on decimals.
     * For example 9 dollars and 99 cents is expressed 9.99.
     * 
     * @param float $amount
     * @return $this
     */
    public function setAmount($amount) {
        $this->_amount = floatval($amount);
        return $this;
    }

    public function setCurrency($currency) {
        $this->_currency = $currency;
        return $this;
    }
    
    /**
     * Strips away the decimal, but keeps all the numbers.
     * This is the way the Nets REST API needs the prices formatted.
     *  
     * @return int
     */
    public function getStrippedDecimalInteger(){
        return (int) str_replace('.', '', $this->getAmount());
    }


    
}