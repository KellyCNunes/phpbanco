<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
    if ($_POST){
        $id = $_SESSION['id'];
        if(excluirGravacoes($_SESSION['id']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarMusicosId($id);
?>

    <h3>Excluir Musico</h3>
    <form action="excluirmusicos.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="titulo" class="form-label">Informe o titulo</label>
                <input type="text" class="form-control" name="titulo" disabled
                    value="<?= $dados['tiulo'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="instrumento" class="form-label">Informe o Instrumento</label>
                <input type="text" class="form-control"     name="data_gravacao" value="<?= $dados['instrumento'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="estilo" class="form-label">Informe o estilo</label>
                <input type="text" class="form-control" name="estilo" 
                    value="<?= $dados['estilo'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="musico" class="form-label">Informe o musico</label>
                <input type="text" class="form-control" name="musico" 
                    value="<?= $dados['musico'] ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input type="submit" class="btn btn-danger" value="Excluir" name="btnExcluir">
            </div>
        </div>
    </form>

<?php
    require_once("../rodape.html");