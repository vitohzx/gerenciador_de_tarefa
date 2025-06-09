<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Tarefa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box1">
            <p class="txtcreate"> Criar Tarefas </p>
            <img src="../img/create.png" alt="" class="create">
        </div>
        <div class="box2">
            <form action="create.php" method="post">
                <input type="text" name="nameTarefa" id="" class="inputTxt" placeholder="Digite o nome da tarefa" style="margin-top: 0">
                <input type="text" name="descTarefa" id="" class="inputTxt" placeholder="Digite a descrição da tarefa">
                <div class="linha">
                    <input type="date" name="dataTarefa" id="" class="inputDate">
                    <input type="time" name="timeTarefa" id="" class="inputTime">
                </div>
                <input type="submit" value="Criar Tarefa" class="inputCriar">
            </form>
        </div>
    </div>
</body>
</html>