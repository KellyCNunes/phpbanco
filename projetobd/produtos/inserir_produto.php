<?php
    require_once("../cabecalho.php");

?>

    <h3> Inserir Produto </h3>
    <form action="" method="POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input type ="text" class="form-control" name="descricao"> 
        </div>
        <div class="row">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="valor"> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Selecione a categoria </label>
            <select class="form-select" name="categoria">
                <?php
                    $linhas = retornarCategorias();
                    while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['id']}'>{$l['descricao']}</option>";
                    }
                ?>
            </select>      
        </div>
        <div class="row"> 
            <div class="col">
                <button type="submit" class="btn btn-success mt-3">
                    Salvar
                </button>
            </div>    
        </div>
    </form>


<?php
    if($_POST) {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $categoria = $_POST['categoria'];
        $valor = $_POST['valor'];
        if ($nome != "" && $descricao != "" && $valor != "" && $categoria != "")
        {
            if (inserirProduto($nome, $descricao, $valor, $categoria))
            echo "Registro inserido com sucesso!";
            else 
                echo "Erro ao inserir o registro!";

        } else {
            echo "Preencha todos os campos!";
        }
    }
    require_once("../rodape.html");