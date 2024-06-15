<?php
    require_once("../cabecalho.php");
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        session_start();
        $_SESSION['id'] = $id;
    } else
        $id = $_SESSION['id'];
    if ($_POST){
        $titulo = $_POST['titulo'];
        $data_gravacao = $_POST['data_gravacao'];
        $musico = $_POST['musico'];
        
        if($titulo != "" && $data_gravacao != "" && $musico != "" ){
            if(alterarGravacoes($titulo,$data_gravacao,$musico, $_SESSION['id']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarGravacoesId($id);
?>

    <h3>Alterar Gravação</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="titulo" class="form-label">Informe o titulo</label>
                <input type="text" class="form-control" name="titulo" 
                    value="<?= $dados['titulo'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="data_gravacao" class="form-label">Informe a data de gravação</label>
                <input type="text" class="form-control"     name="data_gravacao" value="<?= $dados['data_gravacao'] ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <label for="musico" class="form-label"> Selecione o musico</label>
                <select class="form-select" name="musico">
                    <?php
                       $linhas = listarMusicos();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        if ($l['id'] == $dados["musicos_id"])
                            echo "<option selected value='{$l['id']}'>{$l['musico']}</option>"; 
                        else 
                            echo "<option value='{$l['id']}'>{$l['musico']}</option>"; 
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