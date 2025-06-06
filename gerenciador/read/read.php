<?php 

function readTask() {

    $filter = "all";
    
    if ($_POST){
        $filter = $_POST["filter"];
    }

    $json = file_get_contents('../tarefas.json');
    $dadosTarefa = json_decode($json, true);

    if ($dadosTarefa === null || !is_array($dadosTarefa)) {
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

    foreach($dadosTarefa as $valor){
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
    
    echo (

        '<form action="read.php" method="post">
            <select name="filter" id="">
                <option value="all"> Todas </option>
                <option value="pendentes"> Pendentes </option>
                <option value="concluidas"> Concluidas </option>
            </select>
            <input type="submit" value="Filtrar">
        </form>'

    );

    echo "</div></div>";
}

readTask();

?>