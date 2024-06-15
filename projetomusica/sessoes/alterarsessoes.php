<?php
    require_once("../cabecalho.php");
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        session_start();
        $_SESSION['id'] = $id;
    } else
        $id = $_SESSION['id'];
    if ($_POST){
        $data = $_POST['data'];
        $Horario = $_POST['horario'];
        $musico = $_POST['musico'];
        
        if($nome != "" && $duracao != "" ){
            if(alterarFaixa($data,$horario,$musico['id']))
                echo "Registro alterado com sucesso!";
            else
                echo "Erro ao alterar o registro!";
        } else {
            echo "Preencha todos os campos!";
        }
    }
    $dados = consultarSessoesId($id);
?>

    <h3>Alterar Sessoes</h3>
    <form action="" method="POST">
        <div class="row">
            <div class="col">
                <label for="data" class="form-label">Informe a data</label>
                <input type="text" class="form-control" name="data" 
                    value="<?= $dados['data'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <label for="horario" class="form-label">Informe o horário</label>
                <input type="text" class="form-control"     name="horario" value="<?= $dados['horario'] ?>">
            </div>
        </div>
        <div class="row">
            <div class="col">
            <label for="musico" class="form-label">Informe o musico</label>
                <input type="text" class="form-control"     name="musico" value="<?= $dados['musico'] ?>">
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