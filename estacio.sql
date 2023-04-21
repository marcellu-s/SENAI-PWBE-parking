-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Abr-2023 às 03:41
-- Versão do servidor: 8.0.32
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estacio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE `carros` (
  `ID` int NOT NULL,
  `CLI_NOME` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `PLACA` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ENTRADA` datetime DEFAULT NULL,
  `SAIDA` datetime DEFAULT NULL,
  `TOTAL` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `VALOR` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `ID_NOTICIA` int NOT NULL,
  `LINK_IMG` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TITULO` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `RESUMO` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `NOTICIA` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `AUTOR` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DATA_PUB` date NOT NULL,
  `DATA_EDIT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`ID_NOTICIA`, `LINK_IMG`, `TITULO`, `RESUMO`, `NOTICIA`, `AUTOR`, `DATA_PUB`, `DATA_EDIT`) VALUES
(1, 'https://images.pexels.com/photos/419235/pexels-photo-419235.jpeg?auto=compress&cs=tinysrgb&w=400', 'Noticia 1', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque nihil sunt corporis ducimus nostrum numquam magni illo corrupti dolores in, neque velit repudiandae repellat assumenda fugiat debitis nulla perspiciatis? Asperiores.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt quisquam totam, labore vitae, repellendus consequatur enim soluta qui suscipit autem, temporibus libero eligendi exercitationem dolore aperiam. Accusantium at dicta labore.\r\n    Perspiciatis laudantium blanditiis dolorum itaque maxime! Blanditiis sapiente aliquid, rem ut nostrum nobis optio earum itaque quam ea tempore sint deserunt dolore cum molestias, minus placeat neque mollitia atque. Similique?\r\n    Commodi rem voluptates explicabo! Totam cupiditate mollitia vero, temporibus consequatur, debitis natus dolore cum exercitationem adipisci nobis unde laudantium quos perferendis eum nemo quod maiores perspiciatis magni. Tempore, consectetur excepturi.\r\n    Vitae, illo earum amet hic reiciendis eos obcaecati vero praesentium, quam placeat aliquid blanditiis quidem nemo at aspernatur omnis possimus excepturi enim perspiciatis? Expedita nostrum ullam sunt molestiae placeat perferendis.\r\n    Repellat velit optio deserunt vitae hic? Labore, totam omnis eius quae non id magnam, deleniti error tenetur nihil blanditiis odio laboriosam veritatis eos. Corrupti, quae aut aliquam ut omnis quibusdam.\r\n    Ipsa, tempore tempora! Rem consectetur culpa aliquid, eius inventore tenetur sint aspernatur pariatur fuga iusto laboriosam esse, cum molestias! Provident commodi soluta maxime obcaecati architecto eveniet cupiditate nam debitis a!\r\n    Eos modi voluptatum nostrum laudantium dicta iusto quisquam a suscipit quos dignissimos at ab in non magnam ex odit labore, impedit numquam itaque! Maiores, consequuntur minus commodi quas molestias quam?\r\n    Praesentium neque exercitationem eaque officia. Suscipit quae fugit nesciunt laboriosam similique sapiente quas architecto nam, dicta, id officiis mollitia iste sequi voluptatibus deserunt voluptate accusamus vero eligendi est facere ipsa.\r\n    Eum, earum voluptates error porro delectus itaque veniam, possimus modi voluptas eveniet minima inventore ipsum blanditiis perspiciatis. Minima tenetur mollitia officiis sint rerum incidunt quisquam maxime, saepe consequatur perferendis dolore!\r\n    Cum earum voluptatum aliquid blanditiis nihil voluptate repellat deleniti culpa ea doloribus, soluta rerum itaque. Magni libero esse quod repellendus aut vitae velit ducimus a molestias at dolores, cupiditate quasi.', 'Fuguetim', '2023-04-08', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int NOT NULL,
  `USER_NOME` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `EMAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `SENHA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ADMINISTRADOR` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `USER_NOME`, `EMAIL`, `SENHA`, `ADMINISTRADOR`) VALUES
(1, 'Admilson', 'admin@host.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`ID_NOTICIA`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carros`
--
ALTER TABLE `carros`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `ID_NOTICIA` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
