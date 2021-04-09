<?php

class serviceCookies{

    

    private $cookieName;

    private $utilities;

    public function __construct(){
        session_start();
        $this->cookieName = "transaccionesList";
        $this->utilities = new Utilities();

    }

    public function Add($item){

        $transacciones = $this->GetList();     
        
        if(count($transacciones) == 0){
            $item->Id = 1;
        }else{
            $lastElement = $this->utilities->getLastElement($transacciones);
            $item->Id = $lastElement->Id +1;
        }

        array_push($transacciones, $item);

        

        setcookie($this->cookieName,json_encode($transacciones), $this->GetCookieTime(),"/");

       
    }

    public function edit( $item){

        $transacciones = $this->GetList();   
        
        $index = $this->utilities->getIndexElement($transacciones, "Id",$item->Id);

        if($index !== null){
            $transacciones[$index] = $item;
            setcookie($this->cookieName,json_encode($transacciones), $this->GetCookieTime(),"/");
        }
        
    }

    public function delete($id){
        $transacciones = $this->GetList();  
        $index = $this->utilities->getIndexElement($transacciones, "Id",$id);

        if(count($transacciones) > 0){
            unset($transacciones[$index]);
           
            setcookie($this->cookieName,json_encode($transacciones), $this->GetCookieTime(),"/");
        }
    }

    public function GetById($id){

        $transacciones = $this->GetList();       
        $transaccion = $this->utilities->searchProperty($transacciones,"Id",$id);
        return $transaccion[0];
    }

    public function GetList(){

        $transacciones = array();

        if(isset($_COOKIE[$this->cookieName])){

            $transacciones =(array) json_decode($_COOKIE[$this->cookieName]);

        }

        return $transacciones;
    }

    private function GetCookieTime(){
        return time() + 60 * 60 * 24 * 30; 
    }

    
}

?>