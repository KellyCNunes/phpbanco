<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de Gravações </h3>

    <a href="inserirfaixas.php" class="btn btn-primary mt-3"> Adicionar Gravação </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Data Gravação</th>
                <th>Musico</th>
                <th> </th>
                     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = listarGravacoes();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['titulo'] ?></td>
                <td><?= $l['data_gravacao'] ?></td>
                <td><?= $l['musico'] ?> <?= $l['Horario'] ?></td> 
                
                <td>
                    <a href="alterargravacoes.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Alterar
                    </a>
                    <a href="excluirgravacoes.php?id=<?= $l['id'] ?>" class="btn btn-danger">
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