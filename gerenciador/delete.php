<?php
    include ("index.php");
    function deleteTask($id){

        $json = file_get_contents('tarefas.json');
        $dadosTarefa = json_decode($json, true);
        
        if($dadosTarefa[$id] == null){
            echo "<script> alert('Nenhuma tarefa encontrada!'); </script>";
        }
        else{
            echo "<script> alert('Tarefa deletada com Sucesso!');</script>";
        } 

        unset($dadosTarefa[$id]);

        
        $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
        file_put_contents('tarefas.json', $json);

        
    }

    if($_POST){
        $nameTask = $_POST['nameDelete'];
        deleteTask($nameTask);
    }
?>