<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">

        <textarea name="formulario" id="formulario" name="formulario" cols="25" rows="10"></textarea>
        <br>
        <input type="submit">
    </form>
    <br>
    <?php
        require("token.php");
        require("Analisador_lexico.php");
        require("Analisador_SLR.php");
        if(isset($_GET["formulario"])){
            $entrada = $_GET["formulario"];
            $analisador = new Analisador_lexico();
            $analisador->analisa($entrada);
            
            $asc = new SLR();
            // echo $asc->parser($analisador->tokens);
            // $asc->parser($analisador->tokens);

            if ($asc->parser($analisador->tokens))
                echo "\nLinguagem aceita";
            else
                echo "\nErro ao processar entrada";

        } 
    ?>
</body>
</html>