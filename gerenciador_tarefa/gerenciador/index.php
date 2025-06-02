<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="boxpai">
            <div class="box1">
                <p class="txthome"> Criar Tarefas </p>
                <a href=""> <img src="./img/create.png" alt="" class="create"> </a>
            </div>
            <div class="box2">
                <p class="txthome"> Exibir Tarefas </p>
                <a href=""> <img src="./img/read.png" alt="" class="create"> </a>
            </div>
            <div class="box3">
                <p class="txthome"> Atualizar Tarefas </p>
                <a href=""> <img src="./img/update.png" alt="" class="create"> </a>
            </div>
            <div class="box4">
                <p class="txthome"> Excluir Tarefas </p>
                <a href=""> <img src="./img/delete.png" alt="" class="create"> </a>
            </div>
        </div>
    </div>


    <h1> Gerenciador de tarefas </h1>
    <h3> Criar tarefas </h3>
    <form action="create.php" method="post">
        nome tarefa <input type="text" name="nameTarefa" id=""><br><br>
        descrição tarefa <input type="text" name="descTarefa" id=""><br><br>
        <input type="date" name="dataTarefa" id=""><br><br>
        <input type="time" name="timeTarefa" id=""><br><br>
        <input type="submit" value="criar tarefa">
    </form>

    <h3> Deletar tarefas </h3>

    <form action="delete.php" method="post">
        nome tarefa <input type="text" name="nameDelete" id=""><br><br>
        <input type="submit" value="deletar tarefa">
    </form>
    <h3> Exibir tarefas </h3>

    <form action="read.php" method="post">
        
        <input type="submit" value="exibir tarefas">
    </form>
    
    <h3> Editar tarefas </h3>

    <form action="update.php" method="post">
        digite o novo nome da tarefa que sera alterada <input type="text" name="nameEdit" id=""><br><br>
        novo nome tarefa <input type="text" name="nameNovo" id=""><br><br>
        nova descrição tarefa <input type="text" name="descEdit" id=""><br><br>
        nova data tarefa <input type="date" name="dateEdit" id=""><br><br>
        nova hora tarefa <input type="time" name="timeEdit" id=""><br><br>
        <select name="statusEdit" id="">
            <option value="pendente"> Pendente </option>
            <option value="concluida"> Concluida </option>
        </select> <br> <br>
        
        <input type="submit" value="editar tarefa">
    </form>
    
</body>
</html>