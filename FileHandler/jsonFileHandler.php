<?php

    class JsonFileHandler{

        public function SaveFile($directory, $filename,$value){

            $this->CreateDirectory($directory);

            $path = $directory. "/". $filename.".json";

            $serializeData = json_encode($value);

            $file = fopen($path,"w+");
            fwrite($file,$serializeData);
            fclose($file);
        }


        private function CreateDirectory($path,){

            if(file_exists($path)){
                mkdir($path,0777,true);
            }
        }
    }

?>