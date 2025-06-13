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
            <img src="../img/delete.png" alt=""/>
        </div>
        <div class="box2">

            <form action="delete.php" method="post">

            </form>
        <?php
            $dadosTarefa = file_get_contents("../tarefas.json");
            $dadosTarefa = json_decode($dadosTarefa, true);
  
            echo '<form action="delete.php" method="post">';
            if($dadosTarefa != null){
                foreach($dadosTarefa as $key => $valor){
                    echo ("
                        <div class='linha'>
                            <input type='checkbox' name='checkboxes[]'> <span> {$valor["name"]} </span> 
                        </div>
                    ");
                }
            }
            echo '<input type="submit" value="Deletar">';
            echo '</form>'
        ?>
        
        </div>
    </div>
</body>
</html>