<?php

    function deleteTask($id){

        $json = file_get_contents('../tarefas.json');
        $dadosTarefa = json_decode($json, true);
        

        foreach ($dadosTarefa as $key => $valor){
            for ($i = 0; $i < count($id); $i++){
                if($key == $id[$i]){
                    unset($dadosTarefa[$key]);
                }
            }
        }

        $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
        file_put_contents('../tarefas.json', $json); 

        return include_once("deleteTarefa.php");

    }

    if($_POST){
        $chk = $_POST["checkboxes"];
        deleteTask($chk);
    }
    else {
        include_once("deleteTarefa.php");
    }

?>