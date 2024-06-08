<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=bancophp", "root", "");
        return $conexao;
    }
    

//-------------------------------------------------------------------------------------------------------------------
    function listarFaixas(){
        try{
            $sql = "SELECT f.*, s.* From faixas f 
            INNER JOIN sessoes s ON s.idSessoes = f.Sessoes_idSessoes";//chave estrangeira
            $conexao = conectarBanco();
            return $conexao->query($sql);
        } catch(Exception $e){
            return 0;
        }
    }


    function adicionarFaixa($nome, $duracao, $sessao_id){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO Faixas (nome, duracao, sessao_id) VALUES (?, ?, ?)"); 
        $stmt->execute([$nome, $duracao, $sessao_id]);
    }


    function consultarFaixaId($idFaixas){
        try{ 
            $sql = "SELECT * FROM produto WHERE idFaixas = :idFaixas"; //???
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idFaixas", $idFaixas); //????
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
    
    
    function alterarFaixa($nome, $duracao, $sessao_id){
        try{ 
            $sql = "UPDATE produto SET nome = :nome, duracao = :duracao, sessao_id = :sessoes WHERE idFaixas = :idFaixas";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":duracao", $duracao);
            $stmt->bindValue(":sessao_id", $sessoes); //?????
            $stmt->bindValue(":idFaixas", $idFaixas);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
   
    function excluirFaixa($idFaixas){
        try{ 
            $sql = "DELETE FROM produto WHERE idFaixas = :idFaixas";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idFaixas", $idFaixas);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    



//------------------------------------------------------------------------------------------------------------------
    function adicionarMusico($nome, $instrumento, $estilo_musical){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO Musicos (nome, instrumento, estilo_musical) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $instrumento, $estilo_musical]);
    }

    function listarMusicos(){
        $conexao = conectarBanco();
        $stmt = $conexao->query("SELECT * FROM Musicos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
//----------------------------------------------------------------------------------------------------------------
    function adicionarGravacao($titulo, $data_gravacao, $musico_id){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO Gravacoes (titulo, data_gravacao, musico_id) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $data_gravacao, $musico_id]);
    }

    function listarGravacoes(){
        try{
        $sql = "SELECT g.*, m.* From gravacoes g 
        INNER JOIN musicos m ON m.idMusicos = g.idMusicos";
        $conexao = conectarBanco(); //chave estrangeira
        return $conexao->query($sql);
        }  catch(Exception $e){
        return 0;
        }
    }

    function consultarGravacoesId($idGravacoes){
        try{ 
            $sql = "SELECT * FROM produto WHERE idGravacoes = :idGravacoes";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idGravacoes", $idGravacoes);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
    
//???????
    function alterarGravacoes($titulo, $dada, $musico, $idMusicos){
        try{ 
            $sql = "UPDATE produto SET titulo = :titulo, dada = :dada, idMusicos = :musicos WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":dada", $dada);
            $stmt->bindValue(":musicos", $idMusicos);
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
    function excluirGravacoes($id){
        try{ 
            $sql = "DELETE FROM produto WHERE id = :id";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":id", $id);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
//-----------------------------------------------------------------------------------------------------------------
    
    function adicionarSessoes($data, $horario){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO SessoesGravacao (data, horario) VALUES (?, ?)");
        $stmt->execute([$data, $horario]);
    }

    function listarSessoes(){
        try{
            $sql = "SELECT g.*, s.* From sessoes s
            INNER JOIN gravacoes g ON g.idGravacoes";
            $conexao = conectarBanco(); //chave estrangeira
            return $conexao->query($sql);
        }  catch(Exception $e){
            return 0;
        }
    }
    
    
    

    

   




//musicos
function consultarMusicosId($id){
    try{ 
        //Defino uma variável para declarar o SQL a ser executado
        $sql = "SELECT * FROM produto WHERE id = :id";
        //Realizo a conexão com o banco de dados
        $conexao = conectarBanco();
        //Inicio a preparação do SQL para poder substituir os APELIDOS pelos valores passados por parâmetro
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        //Executo a consulta
        $stmt->execute();
        //Retorno o registro já em formato de ARRAY
        return $stmt->fetch();
    } catch (Exception $e){
        //Caso aconteça algum erro, retorno o valor 0
        return 0;
    }
}

//Função que realiza a alteração de um produto
function alterarMusicos($nome, $descricao, $valor, $categoria, $id){
    try{ 
        //Defino uma variável para declarar o SQL a ser executado
        $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, valor = :valor, categoria_id = :categoria WHERE id = :id";
        //Realizo a conexão com o banco de dados
        $conexao = conectarBanco();
        //Inicio a preparação do SQL para poder substituir os APELIDOS pelos valores passados por parâmetro
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":categoria", $categoria);
        $stmt->bindValue(":id", $id);
        //Executo a consulta, retornando o seu resultado
        return $stmt->execute();
    } catch (Exception $e){
        //Caso aconteça algum erro, retorno o valor 0
        return 0;
    }
}

//Função que realiza a exclusão de um produto
function excluirMusicos($id){
    try{ 
        //Defino uma variável para declarar o SQL a ser executado
        $sql = "DELETE FROM produto WHERE id = :id";
        //Realizo a conexão com o banco de dados
        $conexao = conectarBanco();
        //Inicio a preparação do SQL para poder substituir os APELIDOS pelos valores passados por parâmetro
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        //Executo a consulta, retornando o seu resultado
        return $stmt->execute();
    } catch (Exception $e){
        //Caso aconteça algum erro, retorno o valor 0
        return 0;
    }
}


//sessoes
function consultarSessoesId($id){
    try{ 
        //Defino uma variável para declarar o SQL a ser executado
        $sql = "SELECT * FROM produto WHERE id = :id";
        //Realizo a conexão com o banco de dados
        $conexao = conectarBanco();
        //Inicio a preparação do SQL para poder substituir os APELIDOS pelos valores passados por parâmetro
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        //Executo a consulta
        $stmt->execute();
        //Retorno o registro já em formato de ARRAY
        return $stmt->fetch();
    } catch (Exception $e){
        //Caso aconteça algum erro, retorno o valor 0
        return 0;
    }
}

//Função que realiza a alteração de um produto
function alterarSessoes($nome, $descricao, $valor, $categoria, $id){
    try{ 
        //Defino uma variável para declarar o SQL a ser executado
        $sql = "UPDATE produto SET nome = :nome, descricao = :descricao, valor = :valor, categoria_id = :categoria WHERE id = :id";
        //Realizo a conexão com o banco de dados
        $conexao = conectarBanco();
        //Inicio a preparação do SQL para poder substituir os APELIDOS pelos valores passados por parâmetro
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":descricao", $descricao);
        $stmt->bindValue(":valor", $valor);
        $stmt->bindValue(":categoria", $categoria);
        $stmt->bindValue(":id", $id);
        //Executo a consulta, retornando o seu resultado
        return $stmt->execute();
    } catch (Exception $e){
        //Caso aconteça algum erro, retorno o valor 0
        return 0;
    }
}

//Função que realiza a exclusão de um produto
function excluirSessoes($id){
    try{ 
        //Defino uma variável para declarar o SQL a ser executado
        $sql = "DELETE FROM produto WHERE id = :id";
        //Realizo a conexão com o banco de dados
        $conexao = conectarBanco();
        //Inicio a preparação do SQL para poder substituir os APELIDOS pelos valores passados por parâmetro
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        //Executo a consulta, retornando o seu resultado
        return $stmt->execute();
    } catch (Exception $e){
        //Caso aconteça algum erro, retorno o valor 0
        return 0;
    }
}