<?php
    require_once("../cabecalho.php");

?>
    <h3> Gerenciamento de Sessões </h3>

    <a href="inserirfaixas.php" class="btn btn-primary mt-3"> Adicionar Sessões </a>

    <table class="mt-3 table table-hover table-striped">
        <thead>
            <tr>
                <th>Data </th>
                <th>Horário</th>
                <th>Musico</th>
                <th> </th>
                     
            </tr>
        </thead>
        </tbody>
            <?php 
                $linhas = listarSessoes();
                while ($l = $linhas->fetch(PDO::FETCH_ASSOC)){
            ?> 
            <tr>
                <td><?= $l['data'] ?></td>
                <td><?= $l['horario'] ?></td>
                <td><?= $l['musico'] ?> 
                
                <td>
                    <a href="alterarsessoes.php?id=<?= $l['id'] ?>" class="btn btn-danger">
                        Alterar
                    </a>
                    <a href="excluirsessoes.php?id=<?= $l['id'] ?>" class="btn btn-danger">
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