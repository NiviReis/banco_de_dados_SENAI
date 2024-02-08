<?php
    session_start();
 
    if(IsSet($_SESSION["nome_usuario"]))
        $nome_usuario = $_SESSION["nome_usuario"];
       
    if(IsSet($_SESSION["senha_usuario"]))
        $senha_usuario = $_SESSION["senha_usuario"];
   
    if(!(empty($nome_usuario) OR empty($senha_usuario))){
        include "conexao.inc";
        $resultado = $mysqli->query("SELECT * FROM pessoa WHERE username='$nome_usuario'");
   
        if($resultado->num_rows==1){
            $registro = $resultado->fetch_array();
            if($senha_usuario != $registro["password"]){
                unset ($_SESSION['nome_usuario']);
                unset ($_SESSION['senha_usuario']);
                echo "Você não efetuou o LOGIN!";
                exit;
            }
        }else{
            unset ($_SESSION['nome_usuario']);
            unset ($_SESSION['senha_usuario']);
            echo "Você não efetuou o LOGIN!";
            exit;
        }
    }else{
        echo "Você não efetuou o LOGIN!";
        exit;
    }
    $mysqli->close();
?>