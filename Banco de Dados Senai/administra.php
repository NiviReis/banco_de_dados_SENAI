<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Banco de dados</title>
    <link rel="stylesheet" type="text/css" href="css\style.css">
</head>

<body>
    <?php
    header('Content-Type: text/html; charset=UTF-8');

    //puxa a OPERAÇÃO a ser realizada (pega nos campos hidden das páginas: inclui, exclui e mostra)
    $operacao = $_POST["operacao"];
    //cria a conexão com o Banco, seguindo os parâmetros do arquivo "conexao.inc"
    include "incs\conexao.inc";


    //----------------------------------------------------------------------------------------------------------------------

    //testa qual a operação que deve ser realizada no banco
    if ($operacao == "solicitar") {

        //puxa o valor dos inputs da página (inlcui)
        $matricula_pessoa = $_POST["matricula_pessoa"];
        $cod_ambiente = $_POST["cod_ambiente"];
        $status_reserva = $_POST["status_reserva"];         //<------------- Seta a solicitação como PENDENTE
        $turno_reserva = $_POST["turno_reserva"];
        $data_solicitacao = $_POST["data_solicitacao"];
        $data_reserva = $_POST["data_reserva"];
        $horario = $_POST["horario"];

        //testa se a conexão deu certo
        if ($mysqli->connect_error) {
            //se der falha na conexão, exibe o possivel erro
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        //define a string SQL a ser utilizada, usando as variáveis que resgataram os valores dos inputs
        $sql = "INSERT INTO reservas VALUES ";
        $sql .= "('', $matricula_pessoa, '$cod_ambiente', $status_reserva, '$turno_reserva', '$data_solicitacao', '$data_reserva', '$horario')";

        //testa se não houve problemas
        if ($mysqli->query($sql) === TRUE) {
            //imprime que o registro ocorreu corretamente
            echo "<meta http-equiv='refresh' content='0;url=home_geral.php'>";
            echo "<script>alert('Solicitação feita com sucesso.');</script>";
            
        } else {
            echo "Erro na inserção: " . $mysqli->error;
        }
    } elseif ($operacao == "mostrar_reservas") {
        //aqui define o SELECT, para dizer o que vai ser mostrado
        $resultado = $mysqli->query("SELECT reservas.cod_reserva, pessoa.nome, ambiente.nome_ambiente, reservas.status_reserva, reservas.turno_reserva, reservas.data_solicitacao, reservas.data_reserva, reservas.horario FROM reservas INNER JOIN pessoa ON reservas.matricula_pessoa = pessoa.matricula INNER JOIN ambiente ON reservas.cod_ambiente = ambiente.cod_ambiente");

        //verifica quantos registros tem no banco e armazena em $linhas
        $linhas = $resultado->num_rows;
        echo "<p><b>Lista de Agendamentos:</b></p><hr>";

        if ($linhas == 0) {
            echo "Lista vazia <br><br>";
        } else {
            //repetição para rodar todas as linhas da tabela (tendo como base a quantidade encontrada e armazenada em $linhas)
            for ($i = 0; $i < $linhas; $i++) {
                //cria um array chamado $reg que contém tudo que retornou no SELECT
                $reg = $resultado->fetch_row();
                //imprime os índices do array (cada coluna da tabela do banco é um índice ex: reg[0] é a primeira coluna por exemplo.)

                if ($reg[3] == 1) {
                    $valor_status = "Pendente";
                } elseif ($reg[3] == 2) {
                    $valor_status = "Aprovado";
                } elseif ($reg[3] == 0) {
                    $valor_status = "Reprovado";
                }
            }
        }
    } elseif ($operacao == "aprova") {

        $cod_reserva = $_POST["cod_reserva"];

        //testa se a conexão deu certo
        if ($mysqli->connect_error) {
            //se der falha na conexão, exibe o possivel erro
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        //define a string SQL a ser utilizada, usando as variáveis que resgataram os valores dos inputs
        $sql = "UPDATE reservas SET status_reserva = 2 WHERE cod_reserva = $cod_reserva";

        //testa se não houve problemas
        if ($mysqli->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0;url=adm/home_adm.php'>";
        } else {
            echo "Erro na alteração: " . $mysqli->error;
        }
    } elseif ($operacao == "reprova") {

        $cod_reserva = $_POST["cod_reserva"];

        //testa se a conexão deu certo
        if ($mysqli->connect_error) {   
            //se der falha na conexão, exibe o possivel erro
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        //define a string SQL a ser utilizada, usando as variáveis que resgataram os valores dos inputs
        $sql = "UPDATE reservas SET status_reserva = 0 WHERE cod_reserva = $cod_reserva";

        //testa se não houve problemas
        if ($mysqli->query($sql) === TRUE) {
            echo "<meta http-equiv='refresh' content='0;url=adm/home_adm.php'>";
        } else {
            echo "Erro na alteração: " . $mysqli->error;
        }
    }
    $mysqli->close();
    ?>
</body>

</html>