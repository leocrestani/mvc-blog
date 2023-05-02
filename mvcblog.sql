-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.33 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para mvcblog
CREATE DATABASE IF NOT EXISTS `mvcblog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mvcblog`;

-- Copiando estrutura para tabela mvcblog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` int NOT NULL DEFAULT '0',
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `conteudo` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela mvcblog.posts: ~3 rows (aproximadamente)
INSERT INTO `posts` (`id`, `usuario`, `titulo`, `conteudo`, `created_at`) VALUES
	(16, 7, 'Regras para as postagens.', 'Bem-vindos ao nosso blog! Para garantir uma experiência agradável e construtiva para todos os envolvidos, temos algumas regras que devem ser seguidas por todos os usuários do nosso blog. Por favor, leia com atenção e siga estas regras para ajudar a manter um ambiente positivo e respeitoso.\r\n\r\n1- Seja respeitoso: Comentários ou posts que contenham linguagem ofensiva, discriminatória ou insultante não serão tolerados. Todas as opiniões são bem-vindas, mas devem ser expressas de forma respeitosa e construtiva.\r\n\r\n2- Mantenha o foco: Por favor, mantenha os comentários e posts relacionados ao assunto do blog ou do artigo. Desvios do tema principal ou comentários irrelevantes podem ser removidos.\r\n\r\n3- Não promova spam: Comentários ou posts que contenham links promocionais, publicidade ou spam serão removidos. Afinal, nosso blog é um espaço para discussões construtivas e não para autopromoção.\r\n\r\n4- Não compartilhe informações pessoais: Para sua segurança, não compartilhe informações pessoais nos comentários ou nos posts. Isso inclui endereços, números de telefone, endereços de e-mail e informações financeiras.\r\n\r\n5- Seja autêntico: Não use contas falsas ou de terceiros para postar comentários ou para seguir o blog. Seu envolvimento e interação com o blog devem ser genuínos.\r\n\r\n6- Respeite os direitos autorais: Não copie conteúdo de outros sites ou blogs sem a devida atribuição ou permissão. Quando compartilhar informações, dê os devidos créditos aos autores originais.\r\n\r\n7- Administração do blog: A equipe de administração do blog se reserva o direito de remover comentários ou posts que violem estas regras ou que sejam considerados inadequados ou ofensivos.\r\n\r\nAgradecemos a sua colaboração em seguir estas regras. Se você tiver alguma dúvida ou sugestão, por favor, entre em contato com a nossa equipe de suporte. Vamos juntos manter este blog um espaço respeitoso e construtivo para todos.', '2023-05-02 14:31:16'),
	(17, 6, 'Sobre o modelo MVC (Model View Controller)', 'Hoje vamos falar sobre um padrão de arquitetura de software muito utilizado em desenvolvimento web, o Modelo MVC (Model, View, Controller).\r\n\r\nO Modelo MVC é uma abordagem de desenvolvimento que separa a aplicação em três camadas distintas, cada uma com sua responsabilidade específica:\r\n\r\nModel (Modelo): É responsável por gerenciar e manipular os dados da aplicação. O modelo representa a camada de acesso a dados, como por exemplo, as operações de CRUD (Create, Read, Update, Delete) em um banco de dados.\r\n\r\nView (Visão): É responsável pela apresentação visual da aplicação para o usuário final. A camada de visualização pode ser composta por elementos como HTML, CSS e JavaScript. A visão recebe as informações do controlador e as apresenta de forma adequada para o usuário final.\r\n\r\nController (Controlador): É responsável por controlar e gerenciar a lógica da aplicação. O controlador recebe as solicitações do usuário, processa as informações e interage com o modelo e a visão para apresentar a resposta ao usuário.\r\n\r\nO Modelo MVC oferece várias vantagens para o desenvolvimento de software, incluindo:\r\n\r\nSeparação de responsabilidades: cada camada tem uma função específica, o que facilita o gerenciamento e a manutenção do código.\r\n\r\nReutilização de código: cada camada pode ser usada em diferentes partes da aplicação, o que aumenta a eficiência do desenvolvimento.\r\n\r\nFacilidade de testes: com a separação das camadas, é mais fácil testar cada componente individualmente.\r\n\r\nFlexibilidade: as camadas podem ser modificadas sem afetar as outras, o que facilita a evolução da aplicação.\r\n\r\nNo entanto, é importante lembrar que a implementação do Modelo MVC pode variar de acordo com as necessidades da aplicação e o ambiente de desenvolvimento.\r\n\r\nEsperamos que este post tenha ajudado a entender um pouco mais sobre o Modelo MVC e como ele pode ser útil no desenvolvimento de software. Se você tiver alguma dúvida ou sugestão, por favor, deixe um comentário abaixo. Obrigado por ler e até a próxima!', '2023-05-02 14:35:31'),
	(18, 9, 'Inteligência artificial', 'Hoje vamos falar sobre um assunto que tem recebido cada vez mais atenção nos últimos anos: a inteligência artificial (IA).\r\n\r\nA inteligência artificial refere-se à capacidade de um sistema ou programa de computador de realizar tarefas que normalmente exigiriam inteligência humana, como aprendizado, reconhecimento de fala, visão computacional e tomada de decisão.\r\n\r\nA IA tem aplicações em diversos setores, desde a indústria até a saúde e a educação. Por exemplo, em diagnósticos médicos, a IA pode ser usada para analisar grandes quantidades de dados e identificar padrões que possam indicar a presença de uma doença.\r\n\r\nAlém disso, a IA também está sendo usada em diversas áreas de pesquisa, como na análise de imagens de satélite para monitorar as mudanças climáticas e na previsão de terremotos e outras catástrofes naturais.\r\n\r\nNo entanto, a IA também traz consigo questões éticas e de segurança que precisam ser abordadas. É importante garantir que os sistemas de IA sejam desenvolvidos de maneira responsável e ética, e que os dados utilizados sejam protegidos adequadamente.\r\n\r\nApesar dos desafios, a inteligência artificial tem um grande potencial para melhorar nossas vidas e ajudar a resolver problemas complexos. À medida que a tecnologia continua a avançar, é importante continuarmos a discutir e entender a IA para garantir que seu impacto seja positivo para a sociedade.\r\n\r\nEsperamos que este post tenha sido útil para entender um pouco mais sobre a inteligência artificial. Se você tiver alguma dúvida ou sugestão, por favor, deixe um comentário abaixo. Obrigado por ler e até a próxima!', '2023-05-02 14:38:51');

-- Copiando estrutura para tabela mvcblog.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `permissao` int NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela mvcblog.usuario: ~4 rows (aproximadamente)
INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `permissao`, `created_at`) VALUES
	(6, 'Maria', 'maria@teste.com', '$2y$10$h0QwYwiQ7fLRrHBeR1VXyeDXGazUxQbq7dLqw.yichR8RuJWxKLr2', 0, '2023-05-02 14:25:13'),
	(7, 'Admin 1', 'admin1@teste.com', '$2y$10$F9sjpd8j.HooleYcApLBSOk8AParoXcYh/c3UDlM.6pVCYConOD6i', 1, '2023-05-02 14:27:20'),
	(8, 'Admin 2', 'admin2@teste.com', '$2y$10$QMEE7QJq6tEbgTR0dX0S7uyQkDlWGApXYHwymKIkspsaXcSI/0TOC', 1, '2023-05-02 14:27:41'),
	(9, 'Leonardo', 'leonardo@teste.com', '$2y$10$wUHeg0dWM5VXXX5E3Syvxenq4Agvmj5NJavjSpPMIuhGtDjzifTN6', 0, '2023-05-02 14:28:31');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
