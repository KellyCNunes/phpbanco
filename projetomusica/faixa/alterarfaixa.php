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
        $duracao = $_POST['duracao'];
        $sessao = $_POST['sessoes'];
        
        if($nome != "" && $duracao != "" ){
            if(alterarFaixa($nome,$duracao,$sessao['id']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarFaixaId($id);
?>

    <h3>Alterar Faixa</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="nome" class="form-label">Informe o nome</label>
                <input type="text" class="form-control" name="nome" 
                    value="<?= $dados['nome'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <label for="duracao_gravacao" class="form-label">Informe a duração</label>
                <input type="text" class="form-control"     name="duracao_gravacao" value="<?= $dados['duracao_gravacao'] ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <label for="categoria" class="form-label"> Selecione a faixa</label>
                <select class="form-select" name="categoria">
                    <?php
                       $linhas = listarSessoes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["idSessoes"])
                            echo "<option selected value='{$l['id']}'>{$l['nome']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['duracao_gravacao']}</option>"; 
                       } 
                    ?>
                </select>
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