<?php
    require_once("../cabecalho.php");

?>
<h3> Adicionar Gravação </h3>
    <form>
        <div class="row">
            <label for="titulo" class="form-label">Informe o título</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="data_gravacao" class="form-label">Informe a data</label>
            <input type ="text" class="form-control" name="descricao"> 
        </div>
        <div class="row">
            <label for="musico_id" class="form-label">Informe o músico</label>
            <input type ="text" class="form-control" name="descricao"> 
        </div>
    
        <div class="row"> 
            <div class="col">
                <button type="submit" class="btn btn-success">
                    Salvar
                </button>
            </div>    
        </div>
    </form>
    <div class="row">
            <div class="col">
                <label for="musicos" class="form-label"> </label>  
                    <?php
                       $linhas = listarMusicos(); //AJUDAAAAAAA!!!!
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['idMusicos']}'>{$l['nome']} {$l['instrumento']} {$l['estilomusical']}</option>";
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
    $titulo = $_POST['titulo'];
    $data_gravacao = $_POST['data_gravacao'];
    $musico = $_POST['musicos'];
    
    if($nome != "" && $duracao != "" ){
        if(adicionarMusico($titulo,$data_gravacao,$musico))
            echo "Registro inserido com sucesso!";
        else
            echo "Erro ao inserir o registro!";
    } else {
        echo "Preencha todos os campos!";
    }
}

    require_once("../rodape.html");