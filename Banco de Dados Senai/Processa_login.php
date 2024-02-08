<?php


// obtém os valores digitados
$username = $_POST["username"];
$password = $_POST["password"];
// acesso ao banco de dados
include "incs/conexao.inc";

$resultado = $mysqli->query("SELECT * FROM pessoa WHERE username ='$username'");
$linhas = $resultado->num_rows;

if ($linhas == 0){ // testa se a consulta retornou algum registro
    session_start();
    $_SESSION["mensagem2"] = "
    <script>
        loginBox.style.height = '450px'; 
    </script>";
        $_SESSION["mensagem"] = "Usuário não encontrado!";
        header("Location: index.php"); // Redirecione de volta para a página do formulário




} else {
    $registro = $resultado->fetch_array();
    if ($password != $registro["password"]){ // confere senha
        session_start();
        $_SESSION["mensagem2"] = "
        <script>
            loginBox.style.height = '450px'; 
        </script>";
        $_SESSION["mensagem"] = "Usuário ou senha incorretos.<br> Tente novamente.";
        header("Location: index.php"); // Redirecione de volta para a página do formulário
    }else{ // usuário e senha corretos. Vamos criar os cookies
   
        if ($registro["status"]=="ativo"){
           
            if ($registro["funcao"]==0){
                
                //com session
                session_start();
                $_SESSION['nome_usuario'] = $username;
                $_SESSION['senha_usuario'] = $password;
               
                // direciona para a página inicial dos usuários cadastrados
                header("Location: adm/home_adm.php");
       
            }elseif ($registro["funcao"]==1) {
                             
                //com session
                session_start();
                $_SESSION['nome_usuario'] = $username;
                $_SESSION['senha_usuario'] = $password;
               
                // direciona para a página inicial dos usuários cadastrados
                header("Location: home_geral.php");
       
            }else{
                session_start();
                $_SESSION["mensagem2"] = "
                <script>
                    loginBox.style.height = '450px'; 
                </script>";
                    $_SESSION["mensagem"] = "Função nao encontrada!";
                    header("Location: index.php"); // Redirecione de volta para a página do formulário
            }
        }else{
            session_start();       
            $_SESSION["mensagem2"] = "
                <script>
                    loginBox.style.height = '450px'; 
                </script>";
                    $_SESSION["mensagem"] = "Usuário inativo!";
                    header("Location: index.php"); // Redirecione de volta para a página do formulário
            

        }
    }
}   


$mysqli->close();
?>
