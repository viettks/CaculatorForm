<?php
class Caculator {

    public function getForm($print){
       // var_dump($print->in_an);
        require_once("caculatorForm.php");
    }

    public function calculator_price($width, $height, $amount, $print_type, $membrane_type){
        return array("price"=> 1, "price_vat"=> 1,"price_sum"=> 1);
    }

}

?>