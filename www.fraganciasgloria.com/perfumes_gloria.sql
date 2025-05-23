-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2025 a las 12:36:18
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perfumes_gloria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fragancias`
--

CREATE TABLE `fragancias` (
  `numref` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `agotada` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fragancias`
--

INSERT INTO `fragancias` (`numref`, `nombre`, `marca`, `genero`, `agotada`) VALUES
('', '', '', 'hombre', 0),
('PF000', 'L\'Eau D\'Issey', 'Miyake', 'mujer', 0),
('PF001', 'Eau de Rochas', 'Rochas', 'mujer', 0),
('PF003', 'Amor Amor', 'Cacharel', 'mujer', 0),
('PF004', 'DKNY Be Delicious', 'Donna Karan', 'mujer', 0),
('PF006', 'Light Blue', 'Dolce&Gabbana', 'mujer', 0),
('PF008', 'Ralph', 'Ralph Lauren', 'mujer', 0),
('PF009', 'Aromatic Elixir', 'Clinique', 'mujer', 0),
('PF013', 'CK One', 'Calvin Klein (Unisex)', 'mujer', 0),
('PF014', 'Classique', 'Jean Paul Gaultier', 'mujer', 0),
('PF015', 'Angel', 'Thierry Mugler', 'mujer', 0),
('PF016', 'Dolce&Gabbana Pour Femme', 'D&G', 'mujer', 0),
('PF017', 'Nº5', 'Chanel', 'mujer', 0),
('PF018', 'Aire', 'Loewe', 'mujer', 0),
('PF020', 'Trésor', 'Lancôme', 'mujer', 0),
('PF021', 'J\'Adore', 'Christian Dior', 'mujer', 0),
('PF022', 'Agua Fresca de Rosas', 'Adolfo Domínguez', 'mujer', 0),
('PF023', 'Tommy Girl', 'Tommy Hilfiger', 'mujer', 0),
('PF024', 'Miracle', 'Lancôme', 'mujer', 0),
('PF026', 'Pleasures', 'Estée Lauder', 'mujer', 0),
('PF027', '212', 'Carolina Herrera', 'mujer', 0),
('PF029', 'Allure', 'Chanel', 'mujer', 0),
('PF030', 'Bright Cristal', 'Versace', 'mujer', 0),
('PF031', 'Armani Code', 'Giorgio Armani', 'mujer', 0),
('PF032', 'Hugo Woman', 'Hugo Boss', 'mujer', 0),
('PF033', 'Coco Mademoiselle', 'Chanel', 'mujer', 0),
('PF035', 'Narciso Rodriguez for her', 'N R', 'mujer', 0),
('PF036', 'Flower', 'Kenzo', 'mujer', 0),
('PF037', 'Rush', 'Gucci', 'mujer', 0),
('PF038', 'Euphoria', 'Calvin Klein', 'mujer', 0),
('PF039', 'The One', 'Dolce&Gabbana', 'mujer', 0),
('PF043', 'CH', 'Carolina Herrera', 'mujer', 0),
('PF045', 'Quizás Quizás Quizás', 'Loewe', 'mujer', 0),
('PF048', 'Black XS', 'Paco Rabanne', 'mujer', 0),
('PF049', 'Opium', 'Yves Sant Laurent', 'mujer', 0),
('PF052', 'Eternity Woman', 'Calvin Klein', 'mujer', 0),
('PF054', 'Magnetism', 'Escada', 'mujer', 0),
('PF055', 'Chloé Eau de Parfum', 'Chloé', 'mujer', 0),
('PF057', 'Chance', 'Chanel', 'mujer', 0),
('PF059', 'Emporio She', 'Giorgio Armani', 'mujer', 0),
('PF060', 'Tous Touch', 'Tous', 'mujer', 0),
('PF061', 'Fantasy', 'Britney Spears', 'mujer', 0),
('PF062', 'Alien', 'Thierry Mugler', 'mujer', 0),
('PF064', 'Lady Million', 'Paco Rabanne', 'mujer', 0),
('PF065', 'Essence', 'Narciso Rodríguez', 'mujer', 0),
('PF066', 'DNKY ', 'Donna Karan', 'mujer', 0),
('PF068', 'Omnia Crystalline', 'Bvlgary', 'mujer', 0),
('PF069', 'Miss Dior Chèrie', 'Christian Dior', 'mujer', 0),
('PF071', 'Love Chloé Eau de Parfum', 'Chloé', 'mujer', 0),
('PF073', 'Hypnotic Poison', 'Christian Dior', 'mujer', 0),
('PF074', 'Stella', 'Stella Mc Cartney', 'mujer', 0),
('PF075', 'L\'Imperatrice', 'Dolce&Gabbana', 'mujer', 0),
('PF076', 'Infusion D\'Iris', 'Prada', 'mujer', 0),
('PF078', 'Candy', 'Prada', 'mujer', 0),
('PF079', 'Acqua Di Gioia', 'Giorgio Armani', 'mujer', 0),
('PF081', 'La Vie est Belle', 'Lancôme', 'mujer', 0),
('PF082', 'Edén', 'Cacharel', 'mujer', 0),
('PF083', 'París', 'Yves Sant Laurent', 'mujer', 0),
('PF084', 'Escale À Portofino', 'Christian Dior', 'mujer', 0),
('PF086', 'Gucci Guilty', 'Gucci', 'mujer', 0),
('PF087', 'Pure Poison', 'Christian Dior', 'mujer', 0),
('PF089', 'Coco Parfum Chanel 1984', '', 'mujer', 0),
('PF090', 'Acqua Di Gio Giorgio Armani Femenino', '', 'mujer', 0),
('PF091', 'Envy', 'Gucci', 'mujer', 0),
('PF092', 'Elie Saab Le Parfum', 'Elie Saab', 'mujer', 0),
('PF093', 'Valentina de Valentino Femenina', '', 'mujer', 0),
('PF094', 'Dior Addict', 'Christian Dior', 'mujer', 0),
('PF097', 'Happy', 'Clinique', 'mujer', 0),
('PF099', 'Nina de Nina Ricci Femenino', '', 'mujer', 0),
('PF100', 'Manifiesto de Yves Sant Laurent Femenino', '', 'mujer', 0),
('PF101', 'Eau de Courrèges', 'Courrèges (Unisex)', 'mujer', 0),
('PF103', 'Insolence', 'Guerlain', 'mujer', 0),
('PF104', 'Agua de Loewe Ella', 'Loewe', 'mujer', 0),
('PH000', 'L\'Eau D\'Issey', 'Loewe', 'hombre', 0),
('PH001', 'Acqua Di Gio', 'Giorgio Armani', 'hombre', 0),
('PH003', 'Esencia', 'Loewe', 'hombre', 0),
('PH004', 'Lemale', 'Jean Paul Gaultier', 'hombre', 0),
('PH005', 'Hugo Boss', 'Hugo Boss', 'hombre', 0),
('PH006', 'CH Men', 'Carolina Herrera', 'hombre', 0),
('PH008', 'Eternity', 'Calvin Klein', 'hombre', 0),
('PH009', 'Fahrenheit', 'Christian Dior', 'hombre', 0),
('PH010', '1 Millon', 'Paco Rabanne', 'hombre', 0),
('PH011', 'A Men', 'Thierry Mugler', 'hombre', 0),
('PH012', 'Solo Loewe', 'Loewe', 'hombre', 0),
('PH013', 'Allure', 'Chanel', 'hombre', 0),
('PH014', 'Allure Sport', 'Chanel', 'hombre', 0),
('PH015', 'Boss Bottled', 'Hugo Boss', 'hombre', 0),
('PH016', 'Polo Blue', 'Ralph Lauren', 'hombre', 0),
('PH017', 'Ultraviolet Man', 'Paco Rabanne', 'hombre', 0),
('PH018', 'Phanton Paco Rabanne Masculino', '', 'hombre', 0),
('PH019', 'Rochas Man Rochas Masculino', '', 'hombre', 0),
('PH020', '212 Men', 'Carolina Herrera', 'hombre', 0),
('PH022', 'Armani Code', 'Giorgio Armani', 'hombre', 0),
('PH023', 'Scandal P. Homme Masculino Jean P. G.', '', 'hombre', 0),
('PH024', 'Dior Homme', 'Christian Dior', 'hombre', 0),
('PH025', 'Black XS', 'Paco Rabanne', 'hombre', 0),
('PH030', 'The One', 'Dolce&Gabbana', 'hombre', 0),
('PH031', 'Agua Fresca Adolfo Dominguez Masculino', '', 'hombre', 0),
('PH032', 'Égoïste Platinum', 'Chanel', 'hombre', 0),
('PH034', 'Aqva Pour Homme 2005', 'Bvlgary', 'hombre', 0),
('PH035', 'Siete', 'Loewe', 'hombre', 0),
('PH036', 'Boss Bottled Night', 'Hugo Boss', 'hombre', 0),
('PH037', 'Bleu', 'Chanel', 'hombre', 0),
('PH038', 'La nuit de l\'homme Yves Saint Laurent Men', '', 'hombre', 0),
('PH039', 'Boss Orange For Men H. Boss Masculino', '', 'hombre', 0),
('PH041', '212 VIP', 'Carolina Herrera', 'hombre', 0),
('PH042', 'Narciso Rodriguez for him', 'Narciso Rodríguez', 'hombre', 0),
('PH043', 'Terre D\'Hermes', 'Hermes', 'hombre', 0),
('PH044', 'Gucci By Gucci Pour Homme', '', 'hombre', 0),
('PH045', 'Cool Water Davidoff', '', 'hombre', 0),
('PH049', 'Fierce', 'Abercrombie&Fitch', 'hombre', 0),
('PH050', 'Invictus', 'Paco Rabanne', 'hombre', 0),
('PH052', 'Eau Sauvage Dior Masculino 1966', '', 'hombre', 0),
('PH057', 'Opium', 'Yves Sant Laurent', 'hombre', 0),
('PH058', 'Spicebomb', 'Viktor&Rolf', 'hombre', 0),
('PH059', 'Tuscan Leather', 'Tom Ford', 'hombre', 0),
('PH061', 'Oud Malaki', 'Chopard', 'hombre', 0),
('PH062', 'L\'Homme', 'Yves Sant Laurent', 'hombre', 0),
('PH063', 'Oud Wood', 'Tom Ford', 'hombre', 0),
('PH064', 'Light Blue', 'Dolce&Gabbana', 'hombre', 0),
('PH065', 'Just Cavalli Roberto Cavalli Masc 2013', '', 'hombre', 0),
('PH067', 'Eros', 'Versace', 'hombre', 0),
('PH068', 'Boss The Scent', 'Hugo Boss', 'hombre', 0),
('PH069', 'Sauvage', 'Christian Dior', 'hombre', 0),
('PH070', 'Aventus', 'Creed', 'hombre', 0),
('PH071', 'Epic Man', 'Amouage', 'hombre', 0),
('PH072', 'Noir', 'Tom Ford', 'hombre', 0),
('PH073', 'Black Afgano', 'Nasomatto Unisex', 'hombre', 0),
('PH074', 'This is him', 'Zadig&Voltaire', 'hombre', 0),
('PH075', '1 Million Privé', 'Paco Rabanne', 'hombre', 0),
('PH078', 'Bad', 'Diesel', 'hombre', 0),
('PH079', 'Santal 33', 'Le Labo (Unisex)', 'hombre', 0),
('PH080', 'Pure XS', 'Paco Rabanne', 'hombre', 0),
('PH081', 'Stronger with you', 'Emporio Armani', 'hombre', 0),
('PH083', 'Amber Laboratory Perfumes Unisex', '', 'hombre', 0),
('PH084', 'Viking', 'Creed', 'hombre', 0),
('PH085', 'Oud Eau De Cologne Concentrée', 'Acqua Di Parma', 'hombre', 0),
('PH087', 'First Instinct Abercrombie & Fitch Masculino', '', 'hombre', 0),
('PH088', 'Y', 'Yves Sant Laurent', 'hombre', 0),
('PH089', 'Bad Boy', 'Carolina Herrera', 'hombre', 0),
('PH090', 'K', 'Dolce&Gabbana', 'hombre', 0),
('PH092', 'Aventus Intense', 'Creed', 'hombre', 0),
('PH093', 'Oud Wood Intense', 'Tom Ford UNISEX', 'hombre', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nomusu` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nomusu`, `password`, `email`, `rol`, `nombre`, `foto`) VALUES
('fraganciasgloria', 'carmenfdez0602', 'nada', 'admin', 'Carmen', NULL),
('ferandfernz', 'Zelda123', 'enidgdty@gmail.com', 'cliente', 'Andrea', NULL),
('andres08', 'Andres08***', 'andrescarofernandez@gmail.com', 'cliente', 'Andrés', NULL),
('victorcaro02', 'Andres08***', 'victorcaro02@gmail.com', 'cliente', 'Víctor', NULL),
('mussolini', 'Caronte02', 'paologvnna@gmail.com', 'cliente', 'Marco Antonio', 'images/perfiles/perfil_681cb4f7cc1f0_tortuga.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
