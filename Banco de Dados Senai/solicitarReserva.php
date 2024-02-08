<html>

<head>
    <title>Página de Reserva</title>
    <link rel="stylesheet" type="text/css" href="css\styleSolicitar.css">
</head>

<body>

    <?php
    include "incs/validasecao.inc";
    include "incs/cabecalho.inc";

    $username = $_SESSION['nome_usuario'];


    ?>

    <section>
        <h1>Solicite uma Reserva</h1>

        <form method="POST" action="administra.php">
            <input type="hidden" name="operacao" value="solicitar">

            <?php
            include "incs/conexao.inc";
            $matricula_logada = $mysqli->query("SELECT matricula FROM pessoa WHERE username = '$username'");
            $registro = $matricula_logada->fetch_row();
            ?>


            <input type="hidden" name='matricula_pessoa' value="<?php echo $registro[0]; ?>">



            <?php
            $mysqli->close();
            ?>

            Data da reserva:<br>
            <input type="date" name="data_reserva" size="5">
            <br>

            <select name="cod_ambiente">
                <option>Selecione o Ambiente</option>
                <?php
                include "incs/conexao.inc";
                $resultado = $mysqli->query("SELECT * FROM ambiente");
                $linhas = $resultado->num_rows;

                for ($i = 0; $i < $linhas; $i++) {
                    $reg = $resultado->fetch_row();

                ?>
                    <option value="<?php echo "$reg[0]"; ?>">
                        <?php echo "$reg[1]"; ?>
                    </option>

                <?php
                }
                $mysqli->close();
                ?>

            </select>
            <input type="hidden" name="status_reserva" value=1>


            <!--Data da Solicitação-->
            <?php 
            date_default_timezone_set('America/Sao_Paulo');
            ?>

            <input type="hidden" name="data_solicitacao" value="<?php echo date('Y-m-d H:m:s'); ?>" readonly> <!-- automatico-->
            <br>

            <select name="turno_reserva">
                <option>Turno</option>
                <option name="matutino">Matutino</option>
                <option name="vespertino">Vespertino</option>
                <option name="noturno">Noturno</option>
            </select>
            <br>


            <select name="horario">
                <option>Horário</option>
                <option name="matutino">1º Horário</option>
                <option name="vespertino">2º Horário</option>
                <option name="vespertino">Ambos</option>
            </select>
            <br>

            <input class="solicitar" type="submit" name="solicitar" size="5">
    </section>

    <?php
    include "incs/rodape.inc";
    ?>
</body>

</html>