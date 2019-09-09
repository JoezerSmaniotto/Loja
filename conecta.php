<?php
//configura o PHP para portugues BRASIL
setlocale(LC_ALL, 'pt_BR','pt_BR.utf-8','pt_BR.utf-8','portuguese');
//configura o PHP para o nosso fuso horário
date_default_timezone_set('America/Sao_Paulo');

//conexao via PDO
try{
    //string de conexão
    //driver:servidor=endereco;banco=nome_do_banco
    $aux = 'mysql:host=localhost;dbname=cadastro;';
    //abre a conexão com o Banco via PDO
    $link = new PDO($aux,'root','',
                array(
                    PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false
                )
            );
    //echo("Conexão realizada com sucesso!<br>");
    }
catch(PDOException $ex){
    //em caso de erro mostra a mensagem
    echo("Deu erro! <br>". $ex->getMessage());
}

?>