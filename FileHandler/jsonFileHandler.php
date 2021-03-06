<?php

    class JsonFileHandler extends FileHandlerBase implements IFileHandler{

        function __construct($directory,$filename)
        {
            parent::__construct($directory,$filename);
        }

        public function SaveFile($value){

            $this->CreateDirectory($this->directory);

            $path = $this->directory . "/" . $this->filename . ".json";

            $serializeData = json_encode($value);

            $file = fopen($path,"w+");
            fwrite($file,$serializeData);
            fclose($file);
        }

        public function ReadFile(){
            $this->CreateDirectory($this->directory);
            $path = $this->directory. "/" . $this->filename . ".json";

            if(file_exists($path)){

                $file = fopen($path,"r");

                $contents = fread($file,filesize($path));
                fclose($file);
                return json_decode($contents);

            }else{
                return null;
            }

        }


        
    }
