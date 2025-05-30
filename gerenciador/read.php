<?php 
include ("index.php");

function readTask() {

    $json = file_get_contents('tarefas.json');
    $dadosTarefa = json_decode($json, true);


    if ($dadosTarefa === null || !is_array($dadosTarefa)) {
        echo "Erro ao decodificar o JSON ou arquivo vazio.";
        return;
    }

    foreach($dadosTarefa as $valor){

        echo "<h3>", $valor['name'], "</h3>";
        echo "<h3>", $valor['descricao'], "</h3>";
        echo "<h3>", $valor['data'], "</h3>";
        echo "<h3>", $valor['hora'], "</h3>";
        echo "<h3>", $valor['status'], "</h3>";
        echo "<hr>";
    }
}

readTask();

?>