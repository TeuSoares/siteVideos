-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Jan-2022 às 17:43
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bancosite`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `IdVideo` int(11) NOT NULL AUTO_INCREMENT,
  `compositor` varchar(100) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `musica` varchar(110) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IdVideo`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`IdVideo`, `compositor`, `genero`, `musica`, `link`, `foto`) VALUES
(1, 'Zayde Wolf', 'Alternativa/Indie', 'Rule the World', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/sAMvv8kvG5M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Zayde Wolf-1.jpg'),
(2, 'Zayde Wolf', 'Alternativa/Indie', 'Walk Through the fire (feat. Ruelle) ', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/WIdJi5IE0P0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Zayde Wolf-2.jpg'),
(3, 'Vintage Culture', 'Eletrônica', 'Cante por nós', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/urxUXQfj-MU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Vintage-Culture-1.jpg'),
(4, 'Hungria', 'Hip Hop', 'Quebra Cabeça - ft. Lucas Lucco', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/S3J1UvKpzPc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Hungria-1.jpg'),
(5, 'Hungria', 'Hip Hop', 'Não Troco (Official Music)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/hBecvGXZaNM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Hungria-2.jpg'),
(6, 'Vintage Culture', 'Eletrônica', 'Vintage Culture & Adam K - Save Me (feat. MKLA)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/S92QFNQUUa0\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Vintage-Culture-2.jpg'),
(7, 'Linkin Park', 'Rock', 'Numb (Official Video)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/kXYiU_JCYtU\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Link-Park-1.jpg'),
(8, 'Alok', 'Eletrônica', 'Alok, Bruno Martini feat. Zeeba - Hear Me Now', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/JVpTp8IHdEg\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alok-1.jpg'),
(9, 'Alok', 'Eletrônica', 'Alok - Me and You Feat. IRO', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/FxIkFuuvdy4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alok2.jpg'),
(10, 'Alok', 'Eletrônica', 'Alok & Bhaskar - FUEGO', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/VQ2EyU75p2o\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alok-3.jpg'),
(11, 'Alok', 'Eletrônica', 'Alok, Bhaskar & Jetlag Music - Bella Ciao', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/2eSTXIdZb-E\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'alok-4.jpg'),
(12, 'Vintage Culture', 'Eletrônica', 'Vintage Culture, Rooftime - I Will Find', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/xslPDHq-yog\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'vintage-culture-3.jpg'),
(13, 'Vintage Culture', 'Eletrônica', 'Vintage Culture, Adam K - Pour Over', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/gprAWYQ47uY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'vintage-culture-4.jpg'),
(14, 'Hungria', 'Hip Hop', 'Coração de Aço - Hungria Hip Hop (VídeoClipe Oficial)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/pdFLuRQd0wQ\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'hungria-3.jpg'),
(15, 'Hungria', 'Hip Hop', 'Beijo Com Trap (Official Vídeo)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/63XyWeKWI0M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'hungria-4.jpg'),
(16, 'Zayde Wolf', 'Alternativa/Indie', 'BORN READY (Official Lyric Video)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/dGdHAyM6FZY\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Zayde-Wolf-3.jpg'),
(17, 'Zayde Wolf', 'Alternativa/Indie', 'COLD-BLOODED (Official Lyric Video)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/aMXMNfuzJ1g\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Zayde-Wolf-4.jpg'),
(18, 'Linkin Park', 'Rock', 'CASTLE OF GLASS (Official Video)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/ScNNfyq3d_w\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Linkin-Park-2.jpg'),
(19, 'Linkin Park', 'Rock', 'In The End (Official Video)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/eVTXPUF4Oz4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Linkin-Park-3.jpg'),
(20, 'Linkin Park', 'Rock', 'One More Light (Official Video)', '<iframe width=\"1300\" height=\"500\" src=\"https://www.youtube.com/embed/Tm8LGxTLtQk\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Linkin-Park-4.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
