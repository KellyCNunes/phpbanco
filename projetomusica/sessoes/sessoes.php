<?php
    require_once("../cabecalho.php");

?>
<h3> Adicionar Faixa </h3>
    <form>
        <div class="row">
            <label for="data" class="form-label">Informe a data</label>
            <input type ="text" class="form-control" name="nome"> 
        </div>
        <div class="row">
            <label for="horario" class="form-label">Informe o horário</label>
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