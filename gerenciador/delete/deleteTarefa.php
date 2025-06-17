<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box1">
            <p class="txt"> Deletar Tarefas </p>
            <img src="../img/delete.png" alt=""/ class="imgbox">
            <a href="../index.php" class="link"> <img src="../img/home.png" alt="" class="home"> </a>
        </div>
        <div class="box2">

        <?php
            $dadosTarefa = file_get_contents("../tarefas.json");
            $dadosTarefa = json_decode($dadosTarefa, true);
  
            echo '<form action="delete.php" method="post">';
            echo "<div class='boxtarefa'>";
            if($dadosTarefa != null){
                foreach($dadosTarefa as $key => $valor){
                    echo ("
                        <div class='linha'>
                            <label>
                                <input type='checkbox' name='checkboxes[]' value='{$key}' class='chk'> 
                                <span class='tarefa'> {$valor["name"]} </span>
                            </label>
                        </div>
                     
                    ");
                }
            }
            echo "</div>";
            echo '<input type="submit" value="Deletar" class="deletar">';
            echo '</form>';
        ?>
        
        </div>
    </div>
</body>
</html>