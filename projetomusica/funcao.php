<?php

    function conectarBanco(){
        $conexao = new PDO("mysql:host=localhost; dbname=bancophp", "root", "");
        return $conexao;
    }

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
    
    // Função para adicionar uma gravação ao banco de dados
    function adicionarGravacao($titulo, $data_gravacao, $musico_id){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO Gravacoes (titulo, data_gravacao, musico_id) VALUES (?, ?, ?)");
        $stmt->execute([$titulo, $data_gravacao, $musico_id]);
    }

    function listarGravacoes(){
        $conexao = conectarBanco();
        $stmt = $conexao->query("SELECT * FROM Gravacoes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    
    // Função para adicionar uma sessão de gravação ao banco de dados
    function adicionarSessaoGravacao($data, $horario){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO SessoesGravacao (data, horario) VALUES (?, ?)");
        $stmt->execute([$data, $horario]);
    }

    function listarSessoesGravacao(){
        $conexao = conectarBanco();
        $stmt = $conexao->query("SELECT * FROM SessoesGravacao");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
    // Função para adicionar uma faixa ao banco de dados
    function adicionarFaixa($nome, $duracao, $sessao_id){
        $conexao = conectarBanco();
        $stmt = $conexao->prepare("INSERT INTO Faixas (nome, duracao, sessao_id) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $duracao, $sessao_id]);
    }

    function listarFaixas(){
        $conexao = conectarBanco();
        $stmt = $conexao->query("SELECT * FROM Faixas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

        echo "Musicos:<br>";
    foreach (listarMusicos() as $musico) {
        echo $musico['nome'] . " - " . $musico['instrumento'] . " - " . $musico['estilo_musical'] . "<br>";
    }

    echo "<br>Sessoes de Gravação:<br>";
    foreach (listarSessoesGravacao() as $sessao) {
        echo $sessao['data'] . " - " . $sessao['horario'] . "<br>";
    }

    echo "<br>Faixas:<br>";
    foreach (listarFaixas() as $faixa) {
        echo $faixa['nome'] . " - " . $faixa['duracao'] . "<br>";
    }

    echo "<br>Gravações:<br>";
    foreach (listarGravacoes() as $gravacao) {
        echo $gravacao['titulo'] . " - " . $gravacao['data_gravacao'] . "<br>";
    }