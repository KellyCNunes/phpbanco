<?php
    require_once("../cabecalho.php");

?>
<h3> Adicionar Sessão </h3>
    <form>
        <div class="row">
            <label for="data" class="form-label">Informe a data</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="Horario" class="form-label">Informe o horário</label>
            <input type ="text" class="form-control" name="Horario"> 
        </div>
        <div class="row">
            <label for="musico" class="form-label">Informe o músico</label>
            <input type ="text" class="form-control" name="musico"> 
        </div>
      
    

    <div class="row">
            <div class="col">
                <label for="gravacoes" class="form-label"> </label>  
                    <?php
                       $linhas = listarGravacoes();
                       while($l = $linhas->fetch(PDO::FETCH_ASSOC)){
                        echo "<option value='{$l['idGravacoes']}'>{$l['titulo']} {$l['data_gravacao']} {$l['musico']}</option>";
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
    $data = $_POST['data'];
    $horario = $_POST['Horario'];
    $musico = $_POST['musico'];
    
    if($data != "" && $horario != "" && $musico != "" ){
        if(adicionarGravacao($data,$horario,$musico))
            echo "Registro inserido com sucesso!";
        else
            echo "Erro ao inserir o registro!";
    } else {
        echo "Preencha todos os campos!";
    }
}
    require_once("../rodape.html");