<?php
    require_once("../cabecalho.php");

?>

    <h3> Inserir Produto </h3>
    <form>
        <div class="row">
            <label for="nome" class="form-label">Informe o nome</label>
            <input type ="text" class="form-control" name="nome" disabled> 
        </div>
        <div class="row">
            <label for="descricao" class="form-label">Informe a descrição</label>
            <input type ="text" class="form-control" name="descricao" disabled> 
        </div>
        <div class="row">
            <label for="valor" class="form-label">Informe o valor</label>
            <input type ="text" class="form-control" name="valor" disabled> 
        </div>
        
        <div class="row">        
            <label for="categoria" class="form-label mt-3"> Selecione a categoria </label>
            <select class="form-select" name="categoria" disabled>
                <option value="1"> Livros </option>
                <option value="2"> Perecivel 1</option>
                <option value="3"> Eletronico 1</option>
            </select>      
        </div>
        <div class="row"> 
            <div class="col">
                <p> Deseja realmente excluir? </p>
                <button type="submit" class="btn btn-danger mt-3">
                    Excluir
                </button>
            </div>    
        </div>
    </form>


<?php
    require_once("../rodape.html");