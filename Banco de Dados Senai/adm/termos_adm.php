<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="..\css\styleTermos.css">
    <title>Política de Privacidade</title>
</head>

<style>
    #campoTexto textarea {
        background-color: white;
        border: 1px solid #ccc;
        outline: none;
        color: black;
        font-family: 'Times New Roman', Times, serif;
        font-size: 12pt;
        padding: 10px;
        width: 98%;
        min-height: 400px;
        box-shadow: 2px 2px 5px #888;
    }

    body {
        font-family: inherit;
        display: flex;
        flex-direction: column;
        margin: 0;
    }

    /*Cabeçalho*/
    .cabecalho {
        display: flex;
    }

    header {
        background-color: hsl(0, 0%, 100%);
        padding: 28px;
        display: flex;
        flex-direction: row-reverse;
        align-content: space-between;
        justify-content: space-around;
    }

    img {
        height: auto;
        width: 245px;
    }

    /*Tela inicial*/
    .home {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        margin-top: 5%;
    }

    .menudiv {
        display: flex;
        background-color: #1c5cac;
        color: #fff;
        padding: 12px;
        flex-direction: row;
        justify-content: space-evenly;
    }

    /*Links*/
    .amenu {
        color: white;
        text-decoration: none;
    }

    .amenu :visited {
        color: white;
        text-decoration: none;
    }

    .botaogeral {
        font-size: 18px;
        color: #e1e1e1;
        font-family: inherit;
        font-weight: 800;
        cursor: pointer;
        position: relative;
        border: none;
        background: none;
        text-transform: uppercase;
        transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
        transition-duration: 400ms;
        transition-property: color;
    }

    .botaogeral:focus,
    .botaogeral:hover {
        color: #fff;
    }

    .botaogeral:focus:after,
    .botaogeral:hover:after {
        width: 100%;
        left: 0%;
    }

    .botaogeral:after {
        content: "";
        pointer-events: none;
        bottom: -2px;
        left: 50%;
        position: absolute;
        width: 0%;
        height: 2px;
        background-color: #fff;
        transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
        transition-duration: 400ms;
        transition-property: width, left;
    }




    /* Estilize o botão */
    .botaoSalva {
        background-color: #3498db;
        /* Cor de fundo */
        color: #fff;
        /* Cor do texto */
        border: none;
        /* Remova a borda */
        padding: 10px 20px;
        /* Espaçamento interno */
        text-align: center;
        /* Centralize o texto */
        text-decoration: none;
        /* Remova a decoração de texto padrão */
        display: inline-block;
        /* Torne-o um elemento em linha */
        font-size: 16px;
        /* Tamanho da fonte */
        margin: 10px 5px;
        /* Margens externas */
        cursor: pointer;
        /* Altere o cursor ao passar o mouse */
        border-radius: 5px;
        /* Borda arredondada */
        transition: background-color 0.3s ease;
        /* Transição suave de cor de fundo */
    }

    /* Estilo quando o cursor está sobre o botão */
    .botaoSalva:hover {
        background-color: #2980b9;
        /* Cor de fundo alterada */
    }

    /* Estilo para um botão de foco (por exemplo, ao pressionar a tecla Tab) */
    .botaoSalva:focus {
        outline: none;
        /* Remova a borda de foco padrão */
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.7);
        /* Adicione uma sombra ao foco */
    }

    /* Estilo para um botão ativo (por exemplo, quando clicado) */
    .botaoSalva:active {
        background-color: #1c6ca9;
        /* Cor de fundo quando pressionado */
    }

    .textoContainer {
        background-color: transparent;
        display: flex;
        justify-content: start;
        align-items: center;
    }


    .header2 {
        background-color: #007BDF;
        /* Cor do Senai */
        color: #fff;
        /* Texto branco */
        text-align: center;
        padding: 20px;
    }

    h1 {
        font-size: 24px;
    }

    h2 {
        font-size: 20px;
        color: black;
    }

    section {
        margin: 0px;
    }

    ul {
        list-style-type: disc;
        margin-left: 0px;
    }

    /* Estilos específicos para a página de Termos e Condições */
    section:nth-child(odd) {
        background-color: #f9f9f9;
        /* Cor de fundo cinza claro */
        padding: 0px;
    }

    /* Estilos específicos para a página de Política de Privacidade */
    section:nth-child(even) {
        background-color: #f9f9f9;
        /* Cor de fundo cinza claro */
        padding: 0px;
    }

    .sectionGeral {
        display: flex;
        flex-direction: column;
    }

    .botaoSalva {}


    /*Cabeçalho*/
    .cabecalho {
        display: flex;
    }

    header {
        background-color: hsl(0, 0%, 100%);
        padding: 28px;
        display: flex;
        flex-direction: row-reverse;
        align-content: space-between;
        justify-content: space-around;
    }

    img {
        height: auto;
        width: 245px;
    }

    /*Tela inicial*/
    .home {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        margin-top: 5%;
    }

    .menudiv {
        display: flex;
        background-color: #1c5cac;
        color: #fff;
        padding: 12px;
        flex-direction: row;
        justify-content: space-evenly;
    }

    /*Links*/
    .amenu {
        color: white;
        text-decoration: none;
    }

    .amenu :visited {
        color: white;
        text-decoration: none;
    }

    .botaogeral {
        font-size: 18px;
        color: #e1e1e1;
        font-family: inherit;
        font-weight: 800;
        cursor: pointer;
        position: relative;
        border: none;
        background: none;
        text-transform: uppercase;
        transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
        transition-duration: 400ms;
        transition-property: color;
    }

    .botaogeral:focus,
    .botaogeral:hover {
        color: #fff;
    }

    .botaogeral:focus:after,
    .botaogeral:hover:after {
        width: 100%;
        left: 0%;
    }

    .botaogeral:after {
        content: "";
        pointer-events: none;
        bottom: -2px;
        left: 50%;
        position: absolute;
        width: 0%;
        height: 2px;
        background-color: #fff;
        transition-timing-function: cubic-bezier(0.25, 0.8, 0.25, 1);
        transition-duration: 400ms;
        transition-property: width, left;
    }

    .meuTexto {
        padding: 20px;
    }
</style>
</head>

<body>
    <?php
    include "../incs/cabecalho_adm.inc";
    ?>

    <header class="header2">
        <h1>Política de Privacidade</h1>
    </header>
    <?php
    $conexao = new mysqli("localhost", "root", "", "dbagendamento");
    $conexao->set_charset("utf8mb4");

    if ($conexao->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
    }

    $query = "SELECT conteudo FROM texto_div WHERE id = 2";
    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $textoAtual = $row["conteudo"];

        // Substituir quebras de linha por <br> onde a quebra de linha é feita com um caractere vazio
        $textoAtual = preg_replace("/(\r\n|\r|\n){2,}/", "<br><br>", $textoAtual);
    } else {
        $textoAtual = "Texto Inicial";
    }
    ?>


    <div id="textoContainer">
        <div id="meuTexto" class="meuTexto"><?= $textoAtual ?></div>
    </div>
    <button onclick="editarTexto()" class="botaoSalva">Editar Texto</button>

    <div id="campoTexto" style="display: none;">
        <textarea id="novoTexto" placeholder="Digite o novo texto"></textarea>
        <button onclick="salvarTexto()" class="botaoSalva">Salvar</button>
    </div>

    <script>
        function editarTexto() {
            var textoContainer = document.getElementById("textoContainer");
            var campoTexto = document.getElementById("campoTexto");
            var meuTexto = document.getElementById("meuTexto");
            var novoTextoTextarea = document.getElementById("novoTexto");

            textoContainer.style.display = "none";
            campoTexto.style.display = "block";


        }



        function salvarTexto() {
            var textoContainer = document.getElementById("textoContainer");
            var campoTexto = document.getElementById("campoTexto");
            var meuTexto = document.getElementById("meuTexto");
            var novoTexto = document.getElementById("novoTexto").value;

            meuTexto.innerText = novoTexto;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    textoContainer.style.display = "block";
                    campoTexto.style.display = "none";
                }
            };

            xhttp.open("POST", "termos_adm.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("novoTexto=" + novoTexto);
        }

        // Função para ajustar a altura do textarea com base no conteúdo
        function ajustarAlturaTextarea() {
            var novoTextoTextarea = document.getElementById("novoTexto");
            novoTextoTextarea.style.height = "auto";
            novoTextoTextarea.style.height = (novoTextoTextarea.scrollHeight) + "px";
        }

        // Chama a função de ajuste de altura quando o usuário digita
        document.getElementById("novoTexto").addEventListener("input", ajustarAlturaTextarea);
    </script>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Receba o novo texto do formulário
        $novoTexto = $_POST["novoTexto"];

        // Converter quebras de linha em <br> antes de inserir no banco de dados
        $novoTexto = nl2br($novoTexto);

        // Conexão com o banco de dados
        $conexao = new mysqli("localhost", "root", "", "dbagendamento");
        $conexao->set_charset("utf8mb4");

        // Verifique se houve um erro na conexão
        if ($conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
        }

        // Prepare e execute a consulta para inserir o novo texto no banco de dados
        $query = "UPDATE texto_div SET conteudo = ? WHERE id = 2";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("s", $novoTexto);
        if ($stmt->execute()) {
            echo "Texto salvo no banco de dados com sucesso.";
        } else {
            echo "Erro ao salvar o texto no banco de dados: " . $conexao->error;
        }
    }

    ?>
    <script src="Script.js"></script>

    <?php
    include "../incs/rodape_adm.inc";
    ?>
</body>

</html>