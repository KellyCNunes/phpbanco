<?php
    require_once("../cabecalho.php");

?>
<h3> Adicionar o músico</h3>
    <form>
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="instrumento" class="form-label">Informe o instrumento</label>
            <input type ="text" class="form-control" name="descricao"> 
        </div>
        <div class="row">
            <label for="estilo_musical" class="form-label">Informe o estilo musical</label>
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