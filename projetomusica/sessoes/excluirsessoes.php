<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
    if ($_POST){
        $id = $_SESSION['id'];
        if(excluirSessoes($_SESSION['id']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarSessoesId($id);
?>

    <h3>Excluir Sessão</h3>
    <form action="excluirsessoes.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data</label>
                <input type="text" class="form-control" name="data" disabled
                    value="<?= $dados['data'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="horario" class="form-label">Informe o horario</label>
                <input type="text" class="form-control"     name="horario" value="<?= $dados['horario'] ?>" disabled>
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