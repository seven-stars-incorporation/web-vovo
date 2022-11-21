<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <link href="../css/bootstrap-tagsinput.css" rel="stylesheet"> -->
  <link href="../../assets/css/dashboard.css" rel="stylesheet">
  <title>Administrador</title>
  <script src="../../assets/js/dashboard.js" defer></script>
</head>

<body>
  <div class="container">
    <header>
      <nav>
        <button onclick="window.location.href = '../../index.php'">Pesquisar receitas</button>
        <h2>Seja bem vindo Administrador</h2>
        <button id="leave">Encerrar sessão</button>
      </nav>
    </header>
    <dialog id="dialog-logout">
      <div class="container-modal">
        <span class="modal-title">Deseja realmente sair?</span>
        <div class="button-box">
          <button class="btn-sucess" id="quit">Sim</button>
          <button class="btn-danger" id="close-modal">Não</button>
        </div>
      </div>
    </dialog>

    <form method="POST" enctype="multipart/form-data" action="../../controllers/cadastrar-receita.php">
      <h1>Insira as Receitas</h1>

      <div class="group-fields">
        <div class="field">
          <label for="description">Descrição</label>
          <input id="description" type="text" name="description" placeholder="Descriçao da receita" required>
        </div>

        <div class="field">
          <label for="time">Tempo de preparo</label>
          <input id="time" type="number" name="time" placeholder="Tempo (Minutos)" required>
        </div>
      </div>
        

        <div class="field">
          <label for="preparationMode">Modo de preparo</label>
          <textarea id="preparationMode" type="text" name="preparationMode" placeholder="Liste todos os passos, por exemplo: 
1 - Primeiro passo" required></textarea>
        </div>

        <div class="field">
          <label for="Ingredients">Ingredientes</label>
          <textarea id="Ingredients" type="text" name="Ingredients" placeholder="Liste os ingredientes:
UNIDADE NOME_INGREDIENTE == VALOR" required data-role="tagsinput"></textarea>
        </div>

        <div class="hidden">
          <label for="image">Insira uma imagem</label>
          <input id="image" type="file" name="image" accept="image/png, image/jpeg">
        </div>

        <div class="drop">
          <i class="fa-solid fa-photo-film icon"></i>
          <span class="text">
            Arraste e solte a imagem.
          </span>
          <div class="or-con">
            <span class="line"></span>
            <span class="or">Ou</span>
            <span class="line"></span>
          </div>
          <label for="file-upload">Abra no explorador de arquivos</label>
          <input type="file" id="file-upload" class="file-input" accept="image/png, image/jpeg"  name="image"/>
        </div>
        <div class="progress"></div>
        <button>Inserir receita</button>
    </form>
  </div>

  <?php
    // Mensagem de Usuário incorreto
    if (isset($_GET['msg'])) {
      echo ("<script>alert(\"" . $_GET['msg'] . "\")</script>");
    }
  ?>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="../js/bootstrap-tagsinput.js">

  </script>
</body>

</html>