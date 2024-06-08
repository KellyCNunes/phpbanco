<?php
    require_once("../cabecalho.php");

?>
<h3> Adicionar Faixa </h3>
    <form>
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="duracao" class="form-label">Informe a duração</label>
            <input type ="text" class="form-control" name="descricao"> 
        </div>
        <div class="row">
            <label for="sessao_id" class="form-label">Informe o código da faixa</label>
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



<?php
    require_once("../rodape.html");