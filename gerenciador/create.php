<?php
    include ("index.php");

    function createTask($id){
        $nameTask = $_POST['nameTarefa'];
        $descTask = $_POST['descTarefa'];
        $dateTask = $_POST['dataTarefa'];
        $timeTask = $_POST['timeTarefa'];

        $dadosTarefa = array(
                "name" => $nameTask,
                "descricao" => $descTask,
                "data" => $dateTask,
                "hora" => $timeTask,
                "status" => "pendente"
        );
        
        $dados = file_get_contents('tarefas.json');
        $dados = json_decode($dados, true);
        $dados [$id]= $dadosTarefa;
        $json = json_encode($dados, JSON_PRETTY_PRINT);

        file_put_contents('tarefas.json', $json);

        echo "<script>alert('Tarefa criada com Sucesso!');</script>";
    }

    if($_POST){
        $nameTask = $_POST['nameTarefa'];
        createTask($nameTask);
    }

?>