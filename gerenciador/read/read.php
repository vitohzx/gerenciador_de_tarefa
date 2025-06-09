<?php

function readTask()
{

    $filter = "all";

    if ($_POST) {
        $filter = $_POST["filter"];
    }

    $json = file_get_contents('../tarefas.json');
    $dadosTarefa = json_decode($json, true);

    if ($dadosTarefa == null || !is_array($dadosTarefa)) {
        echo "<script> alert('Erro ao decodificar o JSON ou arquivo vazio.'); </script>";
        return;
    }
    echo "<link rel='stylesheet' href='style.css'>";
    echo (
        "<div class='container'>
                <div class='box1'>
                    <img src='../img/read.png' alt=''>
                    <p class='txt'> Lista de Tarefas </p>
                </div>"
    );

    echo "<div class='box2'>";

    // função para exibir as tarefas

    function exibirTask($valor)
    {
        echo (
            "<div class='boxTarefa'>
                <p style='margin-top: 0'> Nome: {$valor["name"]}</p>
                <div class='detalhes'>
                    <p> Descrição: {$valor["descricao"]}</p>
                    <p> Data: {$valor["data"]}</p>
                    <p> Hora: {$valor["hora"]}</p>
                    <p> Status: {$valor["status"]} </p>
                </div>
            </div>
            ");
    }

    // validar status

    $dataAtual = strtotime(date("Y/m/d H:i:s"));


    foreach ($dadosTarefa as $key => $valor) {

        $dataTask = strtotime($valor["data"] . $valor["hora"]);

        if ($dataTask < $dataAtual) {
            $dadosTarefa[$key]["status"] = "Atrasada";
        }
    }

    // ordenar lista por data

    $listaOrdenada = [];

    foreach ($dadosTarefa as $key => $valor) {
        $listaOrdenada[] = $valor;
    }

    usort($listaOrdenada, function ($a, $b) {

        $data1 = strtotime($a["data"] . $a["hora"]);
        $data2 = strtotime($b["data"] . $b["hora"]);

        return $data1 - $data2;
    });


    // filtrar tarefas  


    foreach ($listaOrdenada as $key => $valor) {

        if ($filter == "pendentes" && $valor["status"] == "Pendente") exibirTask($valor);

        else if ($filter == "concluidas" && $valor["status"] == "Concluida") exibirTask($valor);

        else if ($filter == "atrasadas" && $valor["status"] == "Atrasada") exibirTask($valor);

        else if ($filter == "all") exibirTask($valor);
    }


    $json = json_encode($dadosTarefa, JSON_PRETTY_PRINT);
    file_put_contents('../tarefas.json', $json);


    echo (

        '<form action="read.php" method="post">
            <select name="filter" id="">
                <option value="all"> Todas </option>
                <option value="pendentes"> Pendentes </option>
                <option value="concluidas"> Concluidas </option>
                <option value="atrasadas"> Atrasadas </option>
            </select>
            <input type="submit" value="Filtrar">
        </form>'

    );

    echo "</div></div>";
}

readTask();

?>