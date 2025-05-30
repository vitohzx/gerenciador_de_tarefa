<?php
include ("index.php");

        function updateTask($nameEdit, $name, $desc, $data, $time, $status){
            
            $json = file_get_contents('tarefas.json');
            $dadosTarefa = json_decode($json, true);

            foreach($dadosTarefa as $key => $tarefa){
                if($key == $nameEdit){
                    $dadosTarefa[$key] = $nameEdit;
                    $dadosTarefa[$key]['name'] = $name;
                    $dadosTarefa[$key]['descricao'] = $desc;
                    $dadosTarefa[$key]['data'] = $data;
                    $dadosTarefa[$key]['hora'] = $time;
                    $dadosTarefa[$key]['status'] = $status;
                }
            }
            
            $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
            file_put_contents('tarefas.json', $json);
    
            echo "<script> alert(Tarefa atualizada com sucesso!); </script>";
        }
        if($_POST){
            $nameEdit = $_POST['nameEdit'];
            $nameNovo = $_POST['nameNovo'];
            $descEdit = $_POST['descEdit'];
            $dataEdit = $_POST['dateEdit'];
            $timeEdit = $_POST['timeEdit'];
            $statusEdit = $_POST['statusEdit'];

            updateTask($nameEdit, $nameNovo, $descEdit, $dataEdit, $timeEdit, $statusEdit);
        }
?>