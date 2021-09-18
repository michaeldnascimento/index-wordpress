<?php
//CRIA O A MENSAGEM DE ALERTA
$mensagem = "";
    if ( isset($_SESSION['mensagem']) && $_SESSION['mensagem'] != "") {

        $mensagem = $_SESSION['mensagem'];
        $alertColor = $_SESSION['alertColor'];

        $dialog = '<div class="alert '.$alertColor.' alert-dismissible fade show" role="alert">'.$mensagem.'</div>';

    unset($_SESSION['mensagem']);// mata a SESSION
    unset($_SESSION['alertColor']);
}

