<?php
    include ("index.php");
    function deleteTask($id){

        $json = file_get_contents('tarefas.json');
        $dadosTarefa = json_decode($json, true);
        

        foreach ($dadosTarefa as $key => $tarefa){
            if($tarefa["name"] == $id){
                unset($dadosTarefa[$key]);

                echo "<script> alert('Tarefa deletada com Sucesso!');</script>";
                $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
                file_put_contents('tarefas.json', $json);

                return;
            }
        }

        echo "<script> alert('Nenhuma tarefa encontrada!'); </script>";
        $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
        file_put_contents('tarefas.json', $json);
        
    }

    if($_POST){
        $nameTask = $_POST['nameDelete'];
        deleteTask($nameTask);
    }
?>