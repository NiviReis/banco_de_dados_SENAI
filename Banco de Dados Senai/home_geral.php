<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de reservas</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
            /* Isso fará com que o conteúdo principal ocupe o espaço restante na página. */
        }

        footer {
            /* Estilize o rodapé conforme necessário. */
            background-color: #333;
            color: #fff;
            padding: 0px;
            text-align: center;
        }

        /* Estilos da tabela */
        table {
            border-collapse: collapse;
            width: 100%;
            border-radius: 10px;
            overflow: hidden;
            /* Cor do overflow igual à cor da borda da tabela */
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            width: 10%;
        }

        th {
            text-align: center;
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        /* Estilos para a coluna Situação */
        td.situacao {
            font-weight: bold;
            padding: 8px;
        }
    </style>
</head>


<body>
    <main>
        <?php
        include "incs/validasecao.inc";
        include "incs/cabecalho.inc";
        ?>
        <table>
            <thead>
                <tr>
                    <th>Nome do solicitante</th>
                    <th>Ambiente solicitado</th>
                    <th>Status da reserva</th>
                    <th>Turno</th>
                    <th>Data de solicitação</th>
                    <th>Data para reserva</th>
                    <th>Horario</th>
                </tr>
            </thead>


            <?php
            include "incs/conexao.inc";

            $resultado = $mysqli->query("SELECT reservas.cod_reserva, pessoa.nome, ambiente.nome_ambiente, reservas.status_reserva, reservas.turno_reserva, reservas.data_solicitacao, reservas.data_reserva, reservas.horario 
        FROM reservas 
        INNER JOIN pessoa ON reservas.matricula_pessoa = pessoa.matricula 
        INNER JOIN ambiente 
        ON reservas.cod_ambiente = ambiente.cod_ambiente 
        WHERE reservas.status_reserva = 1 OR reservas.status_reserva = 2;");
            $linhas = $resultado->num_rows;
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
                    echo "
                <tbody>
                    <tr>
                        <td>$reg[1]</td>
                        <td>$reg[2]</td>
                        <td>$valor_status</td>
                        <td>$reg[4]</td>
                        <td>$reg[5]</td>
                        <td>$reg[6]</td>
                        <td>$reg[7]</td>
                    </tr>
                </tbody>";
                }
            }
            ?>

        </table>
    </main>


    <script>
        // Seleciona todas as células da coluna "Situação"
        var situacaoCells = document.querySelectorAll("td.situacao");

        situacaoCells.forEach(function(cell) {
            var situacao = cell.textContent.trim();
            if (situacao === "1") {
                cell.style.backgroundColor = "#F0E68C";
            } else if (situacao === "2") {
                cell.style.backgroundColor = "#90EE90";
                cell.style.color = "black";
            } else if (situacao === "0") {
                cell.style.backgroundColor = "#DC143C";
                cell.style.color = "black";
            }
        });
    </script>

    <?php
    include "incs/rodape.inc";
    ?>
</body>

</html>