<?php
    require_once("../cabecalho.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        session_start();
        $_SESSION['id'] = $id;
    } else
        $id = $_SESSION['id'];
    if ($_POST){
        $nome = $_POST['nome'];
        $instrumento = $_POST['instrumento'];
        $estilo = $_POST['estilo'];
        
        if($titulo != "" && $data_gravacao != "" && $musico != "" ){
            if(alterarMusicos($nome,$instrumento,$estilo, $_SESSION['id']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarMusicosId($id);
?>

    <h3>Alterar Musico</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome </label>
                <input type="text" class="form-control" name="nome" 
                    value="<?= $dados['nome'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="instrumento" class="form-label">Informe o instrumento</label>
                <input type="text" class="form-control"     name="instrumento" value="<?= $dados['instrumento'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="estilo" class="form-label">Informe o estilo musical
                </label>
                <input type="text" class="form-control"     name="estilo" value="<?= $dados['estilo'] ?>">
            </div>
        </div>
        
        
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");