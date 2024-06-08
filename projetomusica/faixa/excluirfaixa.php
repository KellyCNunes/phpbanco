<?php
    require_once("../cabecalho.php");
    session_start();
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $_SESSION['id'] = $id;
    } 
    if ($_POST){
        $id = $_SESSION['id'];
        if(excluirFaixa($_SESSION['id']))
            header('Location: index.php');
        else
            echo "Erro ao excluir o registro!";
    }
    $dados = consultarFaixaId($id);
?>

    <h3>Excluir Faixa</h3>
    <form action="excluirfaixa.php" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control" name="nome" disabled
                    value="<?= $dados['nome'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="duracao" class="form-label">Informe a duracao</label>
                <input type="text" class="form-control"     name="duracao" value="<?= $dados['duracao'] ?>" disabled>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <label for="sessao" class="form-label"> Selecione a sessão</label>
                <select class="form-select" name="sessao" disabled>
                    <?php
                       $linhas = listarSessoes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["idSessoes"])
                            echo "<option selected value='{$l['id']}'>{$l['duracao']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['duracao']}</option>"; 
                       } 
                    ?>
                </select>
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