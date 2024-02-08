<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="rodape.css">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <title>Gerenciamento de reservas</title>

    <style>
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

        .botao_alterar {
            color: black;
        }
    </style>
</head>


<body>
    <?php
    include "../incs/validasecao.inc";


    include "../incs/cabecalho_adm.inc";
    ?>

    <form method="post" id="searchForm">
        <input type="text" name="pesquisa" id="pesquisa" placeholder="Digite o que deseja pesquisar">
    </form>

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
                <th>Aprovar</th>
                <th>Reprovar</th>
            </tr>
        </thead>
        <!-- Corpo da tabela -->
        <tbody id="tabelaCorpo">
            <?php
            $conn = new mysqli("localhost", "root", "", "dbagendamento");
            $conn->set_charset("utf8mb4");

            if ($conn->connect_error) {
                die("Erro na conexão com o banco de dados: " . $conn->connect_error);
            }

            $sqli->query("SELECT reservas.cod_reserva, pessoa.nome, ambiente.nome_ambiente, reservas.status_reserva, reservas.turno_reserva, reservas.data_solicitacao, reservas.data_reserva, reservas.horario 
        FROM reservas 
        INNER JOIN pessoa ON reservas.matricula_pessoa = pessoa.matricula 
        INNER JOIN ambiente ON reservas.cod_ambiente = ambiente.cod_ambiente 
        WHERE reservas.status_reserva = 1;");

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $termo_pesquisa = $_POST['pesquisa'];
                if (!empty($termo_pesquisa)) {
                    $sql .= " WHERE 
                    reservas.cod_reserva LIKE '%$termo_pesquisa%' OR
                    pessoa.nome LIKE '%$termo_pesquisa%' OR
                    ambiente.nome_ambiente LIKE '%$termo_pesquisa' OR
                    reservas.status_reserva LIKE '%$termo_pesquisa' OR
                    reservas.turno_reserva LIKE '%$termo_pesquisa' OR
                    reservas.data_solicitacao LIKE '%$termo_pesquisa' OR
                    reservas.data_reserva LIKE '%$termo_pesquisa' OR
                    reservas.horario LIKE '%$termo_pesquisa'";
                }
            }

            $result = $conn->query($sql);



            if ($result !== false) {
                if ($result->num_rows > 0) {


                    while ($row = $result->fetch_assoc()) {

                        if ($row['status_reserva']  == 1) {
                            $valor_status = "Pendente";
                        } elseif ($row['status_reserva']  == 2) {
                            $valor_status = "Aprovado";
                        } elseif ($row['status_reserva']  == 0) {
                            $valor_status = "Reprovado";
                        }



                        echo "<tr>";
                        echo "<td>" . $row['nome'] . "</td>";
                        echo "<td>" . $row['nome_ambiente'] . "</td>";
                        echo "<td>" . $valor_status  . "</td>";
                        echo "<td>" . $row['turno_reserva'] . "</td>";
                        echo "<td>" . $row['data_solicitacao'] . "</td>";
                        echo "<td>" . $row['data_reserva'] . "</td>";
                        echo "<td>" . $row['horario'] . "</td>";
                        echo "<td>
                        <form method='POST' action='../administra.php'>
                        <input type='hidden' name='operacao' value='aprova'>
                        <input type='hidden' name='cod_reserva' value='$reg[0]'>
                        <input type='submit' value='Aprovar'>
                        </form>
                    </td>
                    <td>
                        <form method=\"POST\" action=\"../administra.php\">
                        <input type=\"hidden\" name=\"operacao\" value=\"reprova\">
                        <input type=\"hidden\" name=\"cod_reserva\" value=\"$reg[0]\">
                        <input type=\"submit\" value=\"Reprovar\">
                        </form>
                    </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Nenhum resultado encontrado.";
                }
            } else {
                echo "Erro na consulta SQL: " . $conn->error;
            }

            $conn->close();
            ?>
        </tbody>
    </table>


    <script>
        const pesquisaInput = document.getElementById("pesquisa");
        const tabelaCorpo = document.getElementById("tabelaCorpo");

        pesquisaInput.addEventListener("input", function() {
            const termoPesquisa = pesquisaInput.value;
            const linhas = document.querySelectorAll("#tabelaCorpo tr");

            linhas.forEach(function(linha) {
                const conteudoLinha = linha.innerText.toLowerCase();
                if (conteudoLinha.includes(termoPesquisa.toLowerCase())) {
                    linha.style.display = "";
                } else {
                    linha.style.display = "none";
                }
            });
        });
    </script>






    <script>
        // Get the search button and the table
        const searchButton = document.getElementById("search-button");
        const table = document.getElementById("tableaInicial");

        // Add an event listener to the search button
        searchButton.addEventListener("click", function() {
            // Hide the table
            table.style.display = "none";
        });
    </script>

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

    <script src="Script.js"></script>

    <?php
    include "../incs/rodape_adm.inc";
    ?>
</body>

</html>