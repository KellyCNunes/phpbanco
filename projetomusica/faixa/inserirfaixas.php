<?php
    require_once("../cabecalho.php");

?>
<h3> Adicionar Faixa </h3>
    <form action="" method = "POST">
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="duracao_gravacao" class="form-label">Informe a duração</label>
            <input type ="text" class="form-control" name="duracao_gravacao"> 
        </div>
       
    
        
        <div class="row">
            <div class="col">
                <label for="sessoes" class="form-label"> </label>  
                    <?php
                       $linhas = listarSessoes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['idSessoes']}'>{$l['data']} {$l['hora']}</option>";
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


if ($_POST){
    $nome = $_POST['nome'];
    $duracao = $_POST['duracao_gravacao'];
    $sessao = $_POST['sessoes'];
    
    if($nome != "" && $duracao != "" ){
        if(adicionarFaixa($nome,$duracao,$sessao))
            echo "Registro inserido com sucesso!";
        else
            echo "Erro ao inserir o registro!";
    } else {
        echo "Preencha todos os campos!";
    }
}
    require_once("../rodape.html");