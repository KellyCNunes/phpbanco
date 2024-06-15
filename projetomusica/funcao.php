<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=mydb", "root", "");
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
            $sql = "SELECT * FROM faixa WHERE idFaixas = :idFaixas"; //???
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
            $sql = "UPDATE faixa SET nome = :nome, duracao = :duracao, sessao_id = :sessoes WHERE idFaixas = :idFaixas";
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
            $sql = "DELETE FROM faixa WHERE idFaixas = :idFaixas";
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
        return $conexao->query("SELECT * FROM Musicos");
    }

    function consultarMusicosId($id){
        try{ 
            $sql = "SELECT * FROM musicos WHERE idMusicos = :idMusicos";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idMusicos", $idMusicos);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }
    
    
    function alterarMusicos($nome, $descricao, $valor, $categoria){
        try{ 
            
            $sql = "UPDATE musicos SET nome = :nome, instrumento = :instrumento, estilo_musical = :estilo_musical";
            $conexao = conectarBanco();
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":instrumento", $instrumento);
            $stmt->bindValue(":estilo_musical", $estilo_musical);
            
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
    
    function excluirMusicos($id){
        try{ 
            $sql = "DELETE FROM musicos WHERE idMusicos = :idMusicos";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idMusicos", $idMusicos);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
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
            $sql = "UPDATE produto SET titulo = :titulo, dada = :dada, idMusicos = :musicos WHERE idGravacoes = :idGravacoes";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":titulo", $titulo);
            $stmt->bindValue(":dada", $dada);
            $stmt->bindValue(":musicos", $idMusicos);
            $stmt->bindValue(":idGravacoes", $idGravacoes);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
    function excluirGravacoes($id){
        try{ 
            $sql = "DELETE FROM produto WHERE idGravacoes = :idGravacoes";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idGravacoes", $idGravacoes);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }
    
//-----------------------------------------------------------------------------------------------------------------
    
    function adicionarSessoes($data, $horario){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO SessoesGravacao (data, horario, musico) VALUES (?, ?)");
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

    function consultarSessoesId($id){
        try{ 
            $sql = "SELECT * FROM sessoes WHERE idSessoes = :idSessoes";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idSessoes", $idSessoes);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e){
            return 0;
        }
    }

    function alterarSessoes($data, $horario, $musico){
        try{ 
            $sql = "UPDATE sessoes SET data = :data, horario = :horario, musico = :musico WHERE idSessoes = :idSessoes";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":data", $data);
            $stmt->bindValue(":horario", $horario);
            $stmt->bindValue(":musico", $musico);
            $stmt->bindValue(":idSessoes", $idSessoes);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }

    function excluirSessoes($id){
        try{ 
            $sql = "DELETE FROM sessoes WHERE idSessoes = :idSessoes";
            $conexao = conectarBanco();
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(":idSessoes", $idSessoes);
            return $stmt->execute();
        } catch (Exception $e){
            return 0;
        }
    }