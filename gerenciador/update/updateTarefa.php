<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<script>

  function abrirMenu(id, name) {
    document.getElementById("tarefaId").value = id
    document.getElementById("nome").innerHTML = document.getElementById(id).value
    document.getElementById("task").style.display = "flex";
    document.body.classList.add("no-scroll");
    document.getElementById("overlay").style.display = "block";

    document.body.classList.add("no-scroll");
  }

  function fecharMenu() {
    document.getElementById("task").style.display = "none";
    document.getElementById("overlay").style.display = "none";
    document.body.classList.remove("no-scroll")
  }

</script>  

  <div class="container">

          <div class="edit" style="display: none" id="task">
              <form action="update.php" method="post">
                <span id="nome"></span>
                <input type="text" name="nameNovo" class="name" placeholder="Digite o novo nome da tarefa">
                <input type="text" name="descEdit" class="desc" placeholder="Digite a nova descrição da tarefa">
                <div class="linha">
                    <input type="date" name="dateEdit" class="date">
                    <input type="time" name="timeEdit" class="time">
                </div>
                <div class="linha">
                    <select name="statusEdit" class="status">
                        <option value="Pendente"> Pendente </option>
                        <option value="Concluida"> Concluida </option>
                    </select>
                    <input type="submit" value="Atualizar" class="up">
                    <input type="button" value="Fechar" class="fechar" onclick="fecharMenu()" style="margin: 0">
                </div>
                <input type="hidden" name="tarefa" value="" id="tarefaId">

              </form>
          </div>

          <div class="overlay" id="overlay"></div>

    <div class="box1">
      <p class="txt"> Atualizar Tarefas </p>
      <img src="../img/update.png" alt=""/>
    </div>

    <div class="box2">
        <?php
          $dadosTarefa = file_get_contents("../tarefas.json");
          $dadosTarefa = json_decode($dadosTarefa, true);

          if($dadosTarefa != null){
            foreach($dadosTarefa as $key => $valor){
              echo "<input type='button' id='{$key}' value='{$valor["name"]}' class='tarefa' onclick='abrirMenu({$key})'>";
            }
          }
        ?>
      </form>
    </div>

  </div>

</body>
</html>
