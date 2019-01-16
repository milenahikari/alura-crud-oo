<?php
    function carregaClasse($nomeDaClasse) {
        require_once("class/" . $nomeDaClasse . ".php");
    }

    //Registra função como autoloading
    spl_autoload_register("carregaClasse");

    /*Todos os arquivos que incluem cabeçalho vai mostrar todos os tipos de erros, exceto os notices. */
    /*Controlar Nível de erro*/
    error_reporting(E_ALL ^ E_NOTICE);
    require_once("mostra-alerta.php");
    require_once("conecta.php");
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Minha Loja</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/loja.css">

        <!-- JAVASCRIPT E JQUERY -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
            <div class="container">
                <a class="navbar-brand" href="index.php">Minha Loja</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active" id="navbarNav">
                            <a class="nav-link" href="produto-formulario.php">Adiciona Produto <span class="sr-only">(current)</span></a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="produto-lista.php">Lista Produto</a>
                        </li>

                        <li class="nav-item active">
                            <a class="nav-link" href="contato.php">Contato</a>
                        </li>
                        
                    </ul>
                
                </div>
            </div>    
        </nav>
        <div class="container">
            <div class="principal">
            <?php
                mostraAlerta("success");
                mostraAlerta("danger");
            ?>


       