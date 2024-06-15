<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de Faixas </h3>

    <a href="inserirfaixas.php" class="btn btn-primary mt-3"> Adicionar Faixa </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome </th>
                <th>Duração</th>
                <th>Sessão</th>
                <th> </th>
                     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = listarFaixas();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['nome'] ?></td>
                <td><?= $l['duracao'] ?></td>
                <td><?= $l['data'] ?> <?= $l['Horario'] ?></td> 
                
                <td>
                    <a href="alterarfaixa.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Alterar
                    </a>
                    <a href="excluirfaixa.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Excluir
                    </a>
                </td> 
            </tr>
            <?php
                }
            ?>
                           
        </tbody>
    </table>

<?php   
    require_once("../rodape.html");
