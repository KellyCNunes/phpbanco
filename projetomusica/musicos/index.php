<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de Músicos </h3>

    <a href="musicos/inserirmusicos.php" class="btn btn-primary mt-3"> Adicionar Música </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Nome </th>
                <th>Instrumento musical</th>
                <th>Estilo musical</th>
                <th> </th>
                     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = listarMusicos();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['nome'] ?></td>
                <td><?= $l['instrumento'] ?></td>
                <td><?= $l['estilo'] ?> 
                
                <td>
                    <a href="alterarmusicos.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Alterar
                    </a>
                    <a href="excluirmusicos.php?id=<?= $l['id'] ?>" class="btn btn-danger">
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