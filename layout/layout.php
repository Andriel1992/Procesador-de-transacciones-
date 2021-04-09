
<?php

    class Layout {

        private $isRoot;

        public function __construct($isRoot = false)
        {
            $this->isRoot = $isRoot;
        }

    function printHeader(){

        $directory = ($this->isRoot) ? "" : "../";

        $header = <<<EOF

        <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesador de Transacciones</title>

    <link rel="stylesheet" href="{$directory}assets/CSS/style.css">
    <link rel="stylesheet" href="{$directory}assets/CSS/framework/Bootstrap/bootstrap.min.css">
</head>

<body>

    <header>

        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="{$directory}index.php" class="navbar-brand d-flex ">

                    <strong>Home</strong>
                </a>

            </div>
        </div>
    </header>


    <main class="container">
        <br>

EOF;

        echo $header;
    }

    function printFooter(){

        $directory = ($this->isRoot) ? "" : "../";

        $footer = <<<EOF

        </main>
    

</body>

<script src="{$directory}assets/js/jquery/jquery-3.5.1.min.js"></script>
<script src="{$directory}assets/JS/librerias/Bootstrap/bootstrap.min.js"></script>


</html>

EOF;

        echo $footer;

    }

}

?>