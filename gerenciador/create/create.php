<?php

function createTask()
{
    include_once("criarTarefa.php");

    $nameTask = $_POST['nameTarefa'];
    $descTask = $_POST['descTarefa'];
    $dateTask = $_POST['dataTarefa'];
    $timeTask = $_POST['timeTarefa'];

    $dadosTarefa = array(
        "name" => $nameTask,
        "descricao" => $descTask,
        "data" => $dateTask,
        "hora" => $timeTask,
        "status" => "Pendente"
    );

    $dados = file_get_contents('../tarefas.json');
    $dados = json_decode($dados, true);

    // gerar id 

    $maiorId = 1;

    foreach ($dados as $key => $tarefa) {
        if ($key > $maiorId) {
            $maiorId = $key;
        }
    }


    $dados[$maiorId + 1] = $dadosTarefa;
    $json = json_encode($dados, JSON_PRETTY_PRINT);

    file_put_contents('../tarefas.json', $json);

    echo "<script>alert('Tarefa criada com Sucesso!');</script>";
}

if ($_POST) {
    createTask();
}

?>