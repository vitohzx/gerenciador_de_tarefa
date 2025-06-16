<?php

function updateTask($id, $name, $desc, $data, $time, $status)
{

    $json = file_get_contents('../tarefas.json');
    $dadosTarefa = json_decode($json, true);

    foreach ($dadosTarefa as $key => $tarefa) {

        if ($key == $id) {
            
            if($name != "") $dadosTarefa[$key]['name'] = $name;
            if($desc != "") $dadosTarefa[$key]['descricao'] = $desc;
            if($data != "") $dadosTarefa[$key]['data'] = $data;
            if($time != "") $dadosTarefa[$key]['hora'] = $time;
            $dadosTarefa[$key]['status'] = $status;

            $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
            file_put_contents('../tarefas.json', $json);

            echo "<script> alert('Tarefa atualizada com sucesso!'); </script>";

            return include_once("updateTarefa.php");
        }
    }
    $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
    file_put_contents('../tarefas.json', $json);
    echo "<script> alert('Nenhuma tarefa encontrada!'); </script>";
}

if ($_POST) {

    $id = $_POST["tarefa"];
    $nameNovo = $_POST["nameNovo"];
    $descEdit = $_POST["descEdit"];
    $dataEdit = $_POST["dateEdit"];
    $timeEdit = $_POST["timeEdit"];
    $statusEdit = $_POST["statusEdit"];

    updateTask($id, $nameNovo, $descEdit, $dataEdit, $timeEdit, $statusEdit);
}

?>