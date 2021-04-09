<?php

    class Transaccion{

        public $Id;
        public $Monto;
        public $Descriccion;
        public $Fecha;

        public function __construct($id,$monto,$descriccion,$fecha)
        {
            
            $this->Id = $id;
            $this->Monto = $monto;
            $this->Descriccion = $descriccion;
            $this->Fecha = $fecha;
        }

    }

?>