-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Out-2023 às 21:48
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbagendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente`
--

CREATE TABLE `ambiente` (
  `cod_ambiente` varchar(45) NOT NULL,
  `nome_ambiente` varchar(45) NOT NULL,
  `descricao_ambiente` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ambiente`
--

INSERT INTO `ambiente` (`cod_ambiente`, `nome_ambiente`, `descricao_ambiente`) VALUES
('101A', 'Laboratório CLP', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `matricula` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `funcao` int(1) NOT NULL,
  `nome` varchar(63) NOT NULL,
  `username` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`matricula`, `status`, `email`, `password`, `cargo`, `funcao`, `nome`, `username`) VALUES
(12345, 'ativo', 'jonassenaiharrypotterdasilva', '123', 'Instrutor', 1, 'Jonathan Henrique Jeremias de Souza', 'jonathan'),
(152355, 'ativo', 'awdawd@gmail.com', '123', 'administrador', 0, 'Bruno Henrique', 'bruno');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reservas`
--

CREATE TABLE `reservas` (
  `cod_reserva` int(11) NOT NULL,
  `matricula_pessoa` int(11) NOT NULL,
  `cod_ambiente` varchar(45) NOT NULL,
  `status_reserva` int(11) NOT NULL,
  `turno_reserva` varchar(45) NOT NULL,
  `data_solicitacao` date NOT NULL,
  `data_reserva` date NOT NULL,
  `horario` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `reservas`
--

INSERT INTO `reservas` (`cod_reserva`, `matricula_pessoa`, `cod_ambiente`, `status_reserva`, `turno_reserva`, `data_solicitacao`, `data_reserva`, `horario`) VALUES
(1, 12345, '101A', 0, 'Matutino', '2023-10-11', '2023-10-18', '10:00'),
(2, 12345, '101A', 2, 'Matutino', '2023-10-11', '2023-10-18', 'Ambos'),
(3, 152355, '101A', 2, 'Matutino', '2023-10-11', '2023-10-25', 'Ambos'),
(4, 152355, '101A', 0, 'Noturno', '2023-10-09', '2023-10-18', 'Ambos'),
(5, 12345, '101A', 2, 'Matutino', '2023-10-26', '2023-11-01', '2º Horário'),
(6, 152355, '101A', 2, 'Matutino', '2023-10-09', '2023-10-25', 'Ambos'),
(7, 12345, '101A', 0, 'Vespertino', '2023-10-26', '2023-10-25', '1º Horário'),
(8, 12345, '101A', 0, 'Matutino', '2023-10-26', '2023-10-30', '1º Horário'),
(9, 12345, '101A', 2, 'Matutino', '2023-10-26', '2023-10-31', '1º Horário'),
(10, 12345, '101A', 2, 'Vespertino', '2023-10-26', '2023-10-30', '2º Horário'),
(11, 12345, '101A', 0, 'Noturno', '2023-10-26', '2023-11-08', 'Ambos'),
(12, 12345, '101A', 0, 'Matutino', '2023-10-26', '2023-10-31', 'Ambos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `texto_div`
--

CREATE TABLE `texto_div` (
  `id` int(11) NOT NULL,
  `conteudo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `texto_div`
--

INSERT INTO `texto_div` (`id`, `conteudo`) VALUES
(1, 'No SENAI, valorizamos a privacidade e a proteção de dados dos nossos usuários. Esta Política de Privacidade descreve como coletamos, usamos e protegemos as informações pessoais fornecidas pelos usuários do nosso banco de dados. Ao utilizar os serviços do SENAI, você concorda com os termos e práticas descritas nesta política.<br />\n<br />\n1. Coleta de Informações<br />\n<br />\nColetamos informações pessoais apenas quando estritamente necessárias para a prestação de nossos serviços. Isso pode incluir, mas não se limita a:<br />\n<br />\nInformações de contato, como nome, endereço de e-mail, número de telefone e endereço postal.<br />\nInformações acadêmicas e profissionais relevantes para nossos cursos e programas.<br />\nDados de acesso, incluindo endereço IP, navegador, sistema operacional e informações de registro.<br />\n2. Uso das Informações<br />\n<br />\nUtilizamos as informações pessoais para os seguintes fins:<br />\n<br />\nPrestação de serviços educacionais e de treinamento.<br />\nComunicação com os usuários, incluindo envio de informações sobre cursos, eventos e atualizações.<br />\nMelhoria contínua dos nossos serviços e sites.<br />\nCumprimento de obrigações legais e regulamentares.<br />\n3. Compartilhamento de Informações<br />\n<br />\nNão compartilhamos informações pessoais com terceiros, exceto quando necessário para a prestação de nossos serviços ou cumprimento de obrigações legais.<br />\n<br />\n4. Segurança de Dados<br />\n<br />\nImplementamos medidas de segurança adequadas para proteger as informações pessoais dos usuários contra acesso não autorizado, divulgação, alteração ou destruição.<br />\n<br />\n5. Retenção de Dados<br />\n<br />\nMantemos as informações pessoais pelo tempo necessário para cumprir os fins descritos nesta política, a menos que uma retenção mais longa seja exigida ou permitida por lei.<br />\n<br />\n6. Direitos do Usuário<br />\n<br />\nOs usuários têm direitos sobre suas informações pessoais, incluindo o direito de acessar, corrigir, excluir ou restringir o processamento. Para exercer esses direitos, entre em contato conosco.<br />\n<br />\n7. Cookies e Tecnologias de Rastreamento<br />\n<br />\nUtilizamos cookies e tecnologias semelhantes para melhorar a experiência do usuário e coletar informações não pessoais sobre a navegação em nossos sites.<br />\n<br />\n8. Alterações na Política de Privacidade<br />\n<br />\nReservamo-nos o direito de atualizar esta Política de Privacidade conforme necessário. Recomendamos que os usuários revisitem regularmente esta página para ficarem atualizados sobre as mudanças.<br />\n<br />\nAo utilizar nossos serviços, você concorda com os termos desta Política de Privacidade. Caso tenha alguma dúvida ou preocupação sobre a privacidade de seus dados, entre em contato conosco. O SENAI está empenhado em proteger e respeitar sua privacidade.'),
(2, '1. Introdução<br />\n<br />\nEstes termos e condições (doravante referidos como \"Termos\") regem o uso deste site.<br />\n<br />\n2. Uso do Site<br />\n<br />\nÉ permitido usar este site de acordo com estes Termos. Você concorda em não:<br />\n<br />\nViolar qualquer lei ou regulamento aplicável;<br />\nInterferir com a segurança do site;<br />\nTentar acessar informações ou áreas restritas do site sem autorização;<br />\nReproduzir, duplicar ou copiar o conteúdo deste site.<br />\n3. Direitos de Propriedade<br />\n<br />\nTodos os direitos de propriedade intelectual relacionados a este site são de propriedade da empresa.<br />\n<br />\n4. Disposições Gerais<br />\n<br />\nEstes Termos são regidos pelas leis do Brasil. Se qualquer disposição destes Termos for considerada inválida, as demais disposições permanecerão em vigor.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`cod_ambiente`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices para tabela `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`cod_reserva`),
  ADD KEY `fk_matricula_pessoa` (`matricula_pessoa`),
  ADD KEY `fk_cod_ambiente` (`cod_ambiente`);

--
-- Índices para tabela `texto_div`
--
ALTER TABLE `texto_div`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reservas`
--
ALTER TABLE `reservas`
  MODIFY `cod_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `texto_div`
--
ALTER TABLE `texto_div`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_cod_ambiente` FOREIGN KEY (`cod_ambiente`) REFERENCES `ambiente` (`cod_ambiente`),
  ADD CONSTRAINT `fk_matricula_pessoa` FOREIGN KEY (`matricula_pessoa`) REFERENCES `pessoa` (`matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
