<?php 
include ("index.php");

function readTask() {

    $json = file_get_contents('tarefas.json');
    $dadosTarefa = json_decode($json, true);

    if ($dadosTarefa === null || !is_array($dadosTarefa)) {
        echo "<script> alert('Erro ao decodificar o JSON ou arquivo vazio.'); </script>";
        
        return;
    }

    foreach($dadosTarefa as $valor){

        echo "<h3> Nome: ", $valor['name'], "</h3>";
        echo "<h3> Desc: ", $valor['descricao'], "</h3>";
        echo "<h3> Data: ", $valor['data'], "</h3>";
        echo "<h3> Hora: ", $valor['hora'], "</h3>";
        echo "<h3> Status: ", $valor['status'], "</h3>";
        echo "<hr>";
    }
}

readTask();

?>