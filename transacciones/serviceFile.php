<?php

class serviceFile{

    

    private $fileHandler;
    private $utilities;

    private $directory;
    private $filename;

    public function __construct($isRoot = false){

        $subdirectory = ($isRoot)? "transacciones/" : "";
        
        $this->directory = "{$subdirectory}data";
        $this->filename = "Transacciones";        
        $this->fileHandler = new SerialitationFileHandler($this->directory,$this->filename);
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

        

        $this->fileHandler->SaveFile($transacciones);

       
    }

    public function edit( $item){

        $transacciones = $this->GetList();   
        
        $index = $this->utilities->getIndexElement($transacciones, "Id",$item->Id);

        if($index !== null){
            $transacciones[$index] = $item;
            $this->fileHandler->SaveFile($transacciones);
        }
        
    }

    public function delete($id){
        $transacciones = $this->GetList();  
        $index = $this->utilities->getIndexElement($transacciones, "Id",$id);

        if(count($transacciones) > 0){
            unset($transacciones[$index]);
           
            $this->fileHandler->SaveFile($transacciones);
        }
    }

    public function GetById($id){

        $transacciones = $this->GetList();       
        $transaccion = $this->utilities->searchProperty($transacciones,"Id",$id);
        return $transaccion[0];
    }

    public function GetList(){

        $transacciones = $this->fileHandler->ReadFile();

        if($transacciones === null){

            return array();

        }
        return (array)$transacciones;
    }
      
}

?>