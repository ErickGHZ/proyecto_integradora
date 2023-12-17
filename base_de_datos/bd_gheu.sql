-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2023 a las 17:25:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_gheu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `duracion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`, `tipo`, `modelo`, `duracion`) VALUES
(5, 'Contaduria', 'Licenciatura', 'Cuatrimestre', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disponibilidad_profesores`
--

CREATE TABLE `disponibilidad_profesores` (
  `id_profesor` int(11) DEFAULT NULL,
  `id_hora_profesor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `disponibilidad_profesores`
--

INSERT INTO `disponibilidad_profesores` (`id_profesor`, `id_hora_profesor`) VALUES
(6, 14),
(6, 28),
(6, 42),
(6, 56),
(6, 70),
(6, 84),
(8, 15),
(8, 29),
(8, 43),
(8, 57),
(8, 71),
(8, 16),
(8, 30),
(8, 44),
(8, 58),
(8, 17),
(8, 31),
(8, 45),
(8, 59),
(8, 32),
(8, 46),
(8, 60),
(8, 5),
(8, 19),
(8, 33),
(8, 47),
(8, 75),
(8, 6),
(8, 20),
(8, 34),
(8, 48),
(8, 76),
(8, 7),
(8, 21),
(8, 35),
(8, 49),
(8, 63),
(8, 77),
(8, 50),
(8, 64),
(8, 78),
(8, 51),
(8, 65),
(8, 79),
(8, 52),
(8, 66),
(8, 80),
(8, 11),
(8, 25),
(8, 39),
(8, 53),
(8, 67),
(8, 81),
(8, 12),
(8, 26),
(8, 40),
(8, 54),
(8, 68),
(8, 82),
(8, 13),
(8, 27),
(8, 41),
(8, 55),
(8, 69),
(8, 83),
(8, 14),
(8, 28),
(8, 42),
(8, 56),
(8, 70),
(8, 84),
(9, 57),
(9, 71),
(9, 2),
(9, 58),
(9, 72),
(9, 3),
(9, 73),
(9, 4),
(9, 18),
(9, 74),
(9, 5),
(9, 19),
(9, 33),
(9, 47),
(9, 61),
(9, 75),
(9, 6),
(9, 20),
(9, 34),
(9, 48),
(9, 62),
(9, 76),
(9, 7),
(9, 21),
(9, 35),
(9, 49),
(9, 77),
(9, 8),
(9, 22),
(9, 36),
(9, 50),
(9, 78),
(9, 9),
(9, 23),
(9, 37),
(9, 51),
(9, 65),
(9, 79),
(9, 10),
(9, 24),
(9, 38),
(9, 52),
(9, 66),
(9, 80),
(9, 11),
(9, 25),
(9, 39),
(9, 53),
(9, 67),
(9, 81),
(9, 12),
(9, 26),
(9, 40),
(9, 54),
(9, 68),
(9, 82),
(9, 13),
(9, 27),
(9, 41),
(9, 55),
(9, 69),
(9, 83),
(9, 14),
(9, 28),
(9, 42),
(9, 56),
(9, 70),
(9, 84),
(11, 29),
(11, 71),
(11, 30),
(11, 72),
(11, 3),
(11, 17),
(11, 31),
(11, 45),
(11, 59),
(11, 73),
(11, 18),
(11, 32),
(11, 46),
(11, 60),
(11, 33),
(11, 47),
(11, 61),
(11, 75),
(11, 6),
(11, 20),
(11, 34),
(11, 62),
(11, 76),
(11, 7),
(11, 21),
(11, 35),
(11, 63),
(11, 77),
(11, 22),
(11, 36),
(11, 50),
(11, 64),
(11, 78),
(11, 23),
(11, 37),
(11, 51),
(11, 65),
(11, 79),
(11, 10),
(11, 24),
(11, 38),
(11, 52),
(11, 66),
(11, 80),
(11, 11),
(11, 25),
(11, 39),
(11, 53),
(11, 67),
(11, 81),
(11, 12),
(11, 26),
(11, 40),
(11, 54),
(11, 68),
(11, 82),
(11, 13),
(11, 27),
(11, 41),
(11, 55),
(11, 69),
(11, 83),
(11, 14),
(11, 28),
(11, 42),
(11, 56),
(11, 70),
(11, 84),
(10, 30),
(10, 44),
(10, 72),
(10, 45),
(10, 59),
(10, 73),
(10, 46),
(10, 60),
(10, 74),
(10, 47),
(10, 61),
(10, 75),
(10, 10),
(10, 24),
(10, 38),
(10, 52),
(10, 66),
(10, 80),
(10, 11),
(10, 25),
(10, 39),
(10, 53),
(10, 67),
(10, 81),
(10, 12),
(10, 26),
(10, 40),
(10, 54),
(10, 68),
(10, 82),
(10, 13),
(10, 27),
(10, 41),
(10, 55),
(10, 69),
(10, 83),
(10, 14),
(10, 28),
(10, 42),
(10, 56),
(10, 70),
(10, 84),
(4, 15),
(4, 43),
(4, 57),
(4, 58),
(4, 17),
(4, 59),
(4, 73),
(4, 5),
(4, 75),
(4, 34),
(4, 48),
(4, 62),
(4, 76),
(4, 21),
(4, 35),
(4, 49),
(4, 63),
(4, 77),
(4, 22),
(4, 36),
(4, 50),
(4, 64),
(4, 78),
(4, 9),
(4, 23),
(4, 37),
(4, 51),
(4, 65),
(4, 79),
(4, 10),
(4, 24),
(4, 38),
(4, 52),
(4, 66),
(4, 80),
(4, 11),
(4, 25),
(4, 39),
(4, 53),
(4, 67),
(4, 81),
(4, 12),
(4, 26),
(4, 40),
(4, 54),
(4, 68),
(4, 82),
(4, 13),
(4, 27),
(4, 41),
(4, 55),
(4, 69),
(4, 83),
(4, 14),
(4, 28),
(4, 42),
(4, 56),
(4, 70),
(4, 84),
(9, 32),
(6, 7),
(6, 21),
(6, 23),
(6, 37),
(6, 62),
(6, 63),
(6, 64),
(6, 65),
(6, 76),
(6, 77),
(6, 78),
(6, 79),
(10, 9),
(10, 22),
(10, 23),
(10, 36),
(10, 37),
(10, 48),
(10, 49),
(10, 50),
(10, 51),
(10, 62),
(10, 63),
(10, 64),
(10, 65),
(10, 76),
(10, 77),
(10, 78),
(10, 79),
(6, 2),
(6, 3),
(6, 4),
(6, 11),
(6, 12),
(6, 13),
(6, 16),
(6, 17),
(6, 18),
(6, 24),
(6, 25),
(6, 26),
(6, 27),
(6, 30),
(6, 31),
(6, 32),
(6, 38),
(6, 39),
(6, 40),
(6, 41),
(6, 44),
(6, 45),
(6, 46),
(6, 52),
(6, 53),
(6, 54),
(6, 55),
(6, 59),
(6, 60),
(6, 66),
(6, 67),
(6, 68),
(6, 69),
(6, 71),
(6, 72),
(6, 73),
(6, 74),
(6, 75),
(6, 80),
(6, 81),
(6, 82),
(6, 83),
(5, 74),
(5, 75),
(5, 76),
(5, 78),
(5, 79),
(5, 80),
(5, 39),
(5, 53),
(5, 67),
(5, 81),
(5, 40),
(5, 54),
(5, 68),
(5, 41),
(5, 55),
(5, 69),
(5, 83),
(5, 42),
(5, 56),
(5, 70),
(8, 1),
(8, 2),
(8, 3),
(6, 19),
(6, 20),
(6, 33),
(6, 34),
(6, 47),
(6, 48),
(6, 61),
(7, 29),
(7, 43),
(7, 57),
(7, 71),
(7, 58),
(7, 72),
(7, 73),
(7, 74),
(7, 61),
(7, 75),
(7, 34),
(7, 48),
(7, 62),
(7, 76),
(7, 7),
(7, 21),
(7, 35),
(7, 49),
(7, 63),
(7, 77),
(7, 22),
(7, 36),
(7, 50),
(7, 64),
(7, 78),
(7, 37),
(7, 65),
(7, 79),
(7, 38),
(7, 52),
(7, 66),
(7, 80),
(7, 39),
(7, 53),
(7, 67),
(7, 81),
(7, 40),
(7, 54),
(7, 68),
(7, 82),
(7, 13),
(7, 27),
(7, 41),
(7, 55),
(7, 69),
(7, 83),
(7, 14),
(7, 28),
(7, 42),
(7, 56),
(7, 70),
(7, 84),
(6, 9),
(6, 10),
(5, 82),
(7, 9),
(7, 10),
(7, 11),
(7, 12),
(7, 23),
(7, 24),
(7, 25),
(7, 26),
(11, 8),
(6, 8),
(10, 8),
(7, 51),
(7, 8),
(4, 71),
(4, 72),
(5, 77),
(10, 57),
(8, 61),
(8, 62),
(6, 35),
(6, 36),
(6, 58),
(11, 4),
(11, 48),
(11, 49),
(9, 17),
(9, 63),
(9, 64),
(6, 22),
(4, 6),
(4, 7),
(4, 47),
(5, 32),
(5, 33),
(4, 19),
(7, 30),
(7, 31),
(7, 32),
(7, 33),
(7, 44),
(7, 45),
(7, 46),
(7, 47),
(5, 34),
(5, 35),
(5, 36),
(5, 37),
(5, 38),
(5, 51),
(5, 52),
(5, 58),
(5, 59),
(5, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(5, 65),
(5, 66),
(4, 20),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 49),
(5, 50),
(7, 5),
(7, 6),
(7, 19),
(7, 20),
(8, 8),
(8, 9),
(8, 10),
(8, 22),
(8, 23),
(8, 24),
(8, 36),
(8, 37),
(8, 38),
(7, 4),
(7, 18),
(7, 59),
(7, 60),
(10, 7),
(10, 21),
(10, 35),
(6, 49),
(6, 50),
(6, 51),
(4, 31),
(4, 45),
(4, 61),
(8, 74),
(10, 5),
(10, 6),
(10, 19),
(10, 20),
(10, 33),
(10, 34),
(6, 5),
(6, 6),
(10, 58),
(10, 71),
(8, 72),
(8, 73),
(10, 18),
(10, 31),
(10, 32),
(11, 74),
(9, 45),
(9, 46),
(9, 59),
(9, 60),
(5, 43),
(5, 57),
(4, 44),
(10, 4),
(11, 5),
(11, 19),
(11, 43),
(11, 44),
(11, 57),
(11, 58),
(4, 29),
(4, 30),
(11, 16),
(6, 15),
(6, 29),
(6, 43),
(6, 57),
(6, 1),
(9, 15),
(9, 1),
(10, 1),
(10, 15),
(5, 4),
(5, 5),
(5, 6),
(5, 7),
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 14),
(5, 28),
(5, 16),
(8, 4),
(8, 18),
(5, 2),
(5, 3),
(5, 29),
(5, 30),
(5, 31),
(4, 33),
(7, 3),
(7, 17),
(5, 17),
(5, 18),
(7, 2),
(7, 16),
(10, 2),
(10, 3),
(10, 16),
(10, 17),
(5, 1),
(7, 15),
(4, 3),
(7, 1),
(5, 15),
(4, 8),
(4, 74),
(4, 18),
(4, 32),
(4, 46),
(4, 60),
(4, 4),
(10, 29),
(10, 43),
(11, 2),
(11, 9),
(9, 16),
(9, 44),
(9, 31),
(9, 43),
(9, 29),
(9, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(50) NOT NULL,
  `numero_estudiantes` int(11) NOT NULL,
  `grado_academico` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre_grupo`, `numero_estudiantes`, `grado_academico`, `id_carrera`) VALUES
(11, 'C31', 22, 3, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_materia_profesor`
--

CREATE TABLE `grupo_materia_profesor` (
  `id_grupo_materia_profesor` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `horas_asignadas` int(11) NOT NULL,
  `horas_semanal` int(11) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_grupo_materia_profesor` int(11) NOT NULL,
  `id_hora_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Disparadores `horarios`
--
DELIMITER $$
CREATE TRIGGER `actualizar_horas_asignadas_despues_cambio` AFTER INSERT ON `horarios` FOR EACH ROW BEGIN
    DECLARE horas_semanales INT;
    DECLARE total_registros INT;
    DECLARE horas_asignadas INT;
    
    -- Obtener las horas semanales de la tabla grupo_materia_profesor
    SELECT horas_semanal INTO horas_semanales
    FROM grupo_materia_profesor
    WHERE id_grupo_materia_profesor = NEW.id_grupo_materia_profesor;
    
    -- Actualizar las horas_asignadas con el valor de horas_semanal
    UPDATE grupo_materia_profesor
    SET horas_asignadas = horas_semanales
    WHERE id_grupo_materia_profesor = NEW.id_grupo_materia_profesor;
    
    -- Contar los registros en la tabla horarios para el id_grupo_materia_profesor
    SELECT COUNT(*) INTO total_registros
    FROM horarios
    WHERE id_grupo_materia_profesor = NEW.id_grupo_materia_profesor;
    
    -- Si hay registros en horarios, calcular las horas asignadas
    IF total_registros > 0 THEN
        SET horas_asignadas = GREATEST(horas_semanales - total_registros, 0);
        -- Actualizar las horas_asignadas en grupo_materia_profesor
        UPDATE grupo_materia_profesor
        SET horas_asignadas = horas_asignadas
        WHERE id_grupo_materia_profesor = NEW.id_grupo_materia_profesor;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `agregar_disponibilidad` AFTER DELETE ON `horarios` FOR EACH ROW BEGIN
  DECLARE v_id_grupo_materia_profesor INT;
  DECLARE v_id_hora_horario INT;
  DECLARE v_id_profesor INT;

  -- Obtenemos los valores de la fila eliminada en horarios
  SET v_id_grupo_materia_profesor = OLD.id_grupo_materia_profesor;
  SET v_id_hora_horario = OLD.id_hora_horario;

  -- Obtenemos el id_profesor desde grupo_materia_profesor usando el id_grupo_materia_profesor
  SELECT id_profesor INTO v_id_profesor
  FROM grupo_materia_profesor
  WHERE id_grupo_materia_profesor = v_id_grupo_materia_profesor
  LIMIT 1;

  -- Verificamos si v_id_profesor no es nulo y v_id_hora_horario no es nulo o 0
  IF v_id_profesor IS NOT NULL AND v_id_hora_horario IS NOT NULL AND v_id_hora_horario <> 0 THEN
    -- Verificamos si la hora no está disponible en disponibilidad_profesores
    IF NOT EXISTS (
      SELECT 1 FROM disponibilidad_profesores
      WHERE id_profesor = v_id_profesor AND id_hora_profesor = v_id_hora_horario
    ) THEN
      -- Insertamos la hora en disponibilidad_profesores
      INSERT INTO disponibilidad_profesores (id_profesor, id_hora_profesor) VALUES (v_id_profesor, v_id_hora_horario);
    END IF;
  END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `eliminar_disponibilidad` BEFORE INSERT ON `horarios` FOR EACH ROW BEGIN
  DECLARE v_id_profesor INT;

  -- Obtenemos el id_profesor desde grupo_materia_profesor usando el nuevo id_grupo_materia_profesor
  SELECT id_profesor INTO v_id_profesor
  FROM grupo_materia_profesor
  WHERE id_grupo_materia_profesor = NEW.id_grupo_materia_profesor
  LIMIT 1;

  -- Verificamos si v_id_profesor no es nulo y v_id_hora_horario no es nulo o 0
  IF v_id_profesor IS NOT NULL AND NEW.id_hora_horario IS NOT NULL AND NEW.id_hora_horario <> 0 THEN
    -- Verificamos si existe disponibilidad en disponibilidad_profesores
    IF EXISTS (
      SELECT 1 FROM disponibilidad_profesores
      WHERE id_profesor = v_id_profesor AND id_hora_profesor = NEW.id_hora_horario
    ) THEN
      -- Eliminamos la hora de disponibilidad_profesores
      DELETE FROM disponibilidad_profesores
      WHERE id_profesor = v_id_profesor AND id_hora_profesor = NEW.id_hora_horario;
    ELSE 
      -- Cancelamos la inserción usando una excepción
      SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La inserción ha sido cancelada porque no existe disponibilidad.';
    END IF;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_horarios`
--

CREATE TABLE `hora_horarios` (
  `id_hora_horario` int(11) NOT NULL,
  `dia_semana` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hora_horarios`
--

INSERT INTO `hora_horarios` (`id_hora_horario`, `dia_semana`, `hora_inicio`, `hora_fin`) VALUES
(1, 1, '07:00:00', '08:00:00'),
(2, 1, '08:00:00', '09:00:00'),
(3, 1, '09:00:00', '10:00:00'),
(4, 1, '10:00:00', '11:00:00'),
(5, 1, '11:00:00', '12:00:00'),
(6, 1, '12:00:00', '13:00:00'),
(7, 1, '13:00:00', '14:00:00'),
(8, 1, '14:00:00', '15:00:00'),
(9, 1, '15:00:00', '16:00:00'),
(10, 1, '16:00:00', '17:00:00'),
(11, 1, '17:00:00', '18:00:00'),
(12, 1, '18:00:00', '19:00:00'),
(13, 1, '19:00:00', '20:00:00'),
(14, 1, '20:00:00', '21:00:00'),
(15, 2, '07:00:00', '08:00:00'),
(16, 2, '08:00:00', '09:00:00'),
(17, 2, '09:00:00', '10:00:00'),
(18, 2, '10:00:00', '11:00:00'),
(19, 2, '11:00:00', '12:00:00'),
(20, 2, '12:00:00', '13:00:00'),
(21, 2, '13:00:00', '14:00:00'),
(22, 2, '14:00:00', '15:00:00'),
(23, 2, '15:00:00', '16:00:00'),
(24, 2, '16:00:00', '17:00:00'),
(25, 2, '17:00:00', '18:00:00'),
(26, 2, '18:00:00', '19:00:00'),
(27, 2, '19:00:00', '20:00:00'),
(28, 2, '20:00:00', '21:00:00'),
(29, 3, '07:00:00', '08:00:00'),
(30, 3, '08:00:00', '09:00:00'),
(31, 3, '09:00:00', '10:00:00'),
(32, 3, '10:00:00', '11:00:00'),
(33, 3, '11:00:00', '12:00:00'),
(34, 3, '12:00:00', '13:00:00'),
(35, 3, '13:00:00', '14:00:00'),
(36, 3, '14:00:00', '15:00:00'),
(37, 3, '15:00:00', '16:00:00'),
(38, 3, '16:00:00', '17:00:00'),
(39, 3, '17:00:00', '18:00:00'),
(40, 3, '18:00:00', '19:00:00'),
(41, 3, '19:00:00', '20:00:00'),
(42, 3, '20:00:00', '21:00:00'),
(43, 4, '07:00:00', '08:00:00'),
(44, 4, '08:00:00', '09:00:00'),
(45, 4, '09:00:00', '10:00:00'),
(46, 4, '10:00:00', '11:00:00'),
(47, 4, '11:00:00', '12:00:00'),
(48, 4, '12:00:00', '13:00:00'),
(49, 4, '13:00:00', '14:00:00'),
(50, 4, '14:00:00', '15:00:00'),
(51, 4, '15:00:00', '16:00:00'),
(52, 4, '16:00:00', '17:00:00'),
(53, 4, '17:00:00', '18:00:00'),
(54, 4, '18:00:00', '19:00:00'),
(55, 4, '19:00:00', '20:00:00'),
(56, 4, '20:00:00', '21:00:00'),
(57, 5, '07:00:00', '08:00:00'),
(58, 5, '08:00:00', '09:00:00'),
(59, 5, '09:00:00', '10:00:00'),
(60, 5, '10:00:00', '11:00:00'),
(61, 5, '11:00:00', '12:00:00'),
(62, 5, '12:00:00', '13:00:00'),
(63, 5, '13:00:00', '14:00:00'),
(64, 5, '14:00:00', '15:00:00'),
(65, 5, '15:00:00', '16:00:00'),
(66, 5, '16:00:00', '17:00:00'),
(67, 5, '17:00:00', '18:00:00'),
(68, 5, '18:00:00', '19:00:00'),
(69, 5, '19:00:00', '20:00:00'),
(70, 5, '20:00:00', '21:00:00'),
(71, 6, '07:00:00', '08:00:00'),
(72, 6, '08:00:00', '09:00:00'),
(73, 6, '09:00:00', '10:00:00'),
(74, 6, '10:00:00', '11:00:00'),
(75, 6, '11:00:00', '12:00:00'),
(76, 6, '12:00:00', '13:00:00'),
(77, 6, '13:00:00', '14:00:00'),
(78, 6, '14:00:00', '15:00:00'),
(79, 6, '15:00:00', '16:00:00'),
(80, 6, '16:00:00', '17:00:00'),
(81, 6, '17:00:00', '18:00:00'),
(82, 6, '18:00:00', '19:00:00'),
(83, 6, '19:00:00', '20:00:00'),
(84, 6, '20:00:00', '21:00:00'),
(85, 0, '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hora_profesores`
--

CREATE TABLE `hora_profesores` (
  `id_hora_profesor` int(11) NOT NULL,
  `dia_semana` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hora_profesores`
--

INSERT INTO `hora_profesores` (`id_hora_profesor`, `dia_semana`, `hora_inicio`, `hora_fin`) VALUES
(1, 1, '07:00:00', '08:00:00'),
(2, 1, '08:00:00', '09:00:00'),
(3, 1, '09:00:00', '10:00:00'),
(4, 1, '10:00:00', '11:00:00'),
(5, 1, '11:00:00', '12:00:00'),
(6, 1, '12:00:00', '13:00:00'),
(7, 1, '13:00:00', '14:00:00'),
(8, 1, '14:00:00', '15:00:00'),
(9, 1, '15:00:00', '16:00:00'),
(10, 1, '16:00:00', '17:00:00'),
(11, 1, '17:00:00', '18:00:00'),
(12, 1, '18:00:00', '19:00:00'),
(13, 1, '19:00:00', '20:00:00'),
(14, 1, '20:00:00', '21:00:00'),
(15, 2, '07:00:00', '08:00:00'),
(16, 2, '08:00:00', '09:00:00'),
(17, 2, '09:00:00', '10:00:00'),
(18, 2, '10:00:00', '11:00:00'),
(19, 2, '11:00:00', '12:00:00'),
(20, 2, '12:00:00', '13:00:00'),
(21, 2, '13:00:00', '14:00:00'),
(22, 2, '14:00:00', '15:00:00'),
(23, 2, '15:00:00', '16:00:00'),
(24, 2, '16:00:00', '17:00:00'),
(25, 2, '17:00:00', '18:00:00'),
(26, 2, '18:00:00', '19:00:00'),
(27, 2, '19:00:00', '20:00:00'),
(28, 2, '20:00:00', '21:00:00'),
(29, 3, '07:00:00', '08:00:00'),
(30, 3, '08:00:00', '09:00:00'),
(31, 3, '09:00:00', '10:00:00'),
(32, 3, '10:00:00', '11:00:00'),
(33, 3, '11:00:00', '12:00:00'),
(34, 3, '12:00:00', '13:00:00'),
(35, 3, '13:00:00', '14:00:00'),
(36, 3, '14:00:00', '15:00:00'),
(37, 3, '15:00:00', '16:00:00'),
(38, 3, '16:00:00', '17:00:00'),
(39, 3, '17:00:00', '18:00:00'),
(40, 3, '18:00:00', '19:00:00'),
(41, 3, '19:00:00', '20:00:00'),
(42, 3, '20:00:00', '21:00:00'),
(43, 4, '07:00:00', '08:00:00'),
(44, 4, '08:00:00', '09:00:00'),
(45, 4, '09:00:00', '10:00:00'),
(46, 4, '10:00:00', '11:00:00'),
(47, 4, '11:00:00', '12:00:00'),
(48, 4, '12:00:00', '13:00:00'),
(49, 4, '13:00:00', '14:00:00'),
(50, 4, '14:00:00', '15:00:00'),
(51, 4, '15:00:00', '16:00:00'),
(52, 4, '16:00:00', '17:00:00'),
(53, 4, '17:00:00', '18:00:00'),
(54, 4, '18:00:00', '19:00:00'),
(55, 4, '19:00:00', '20:00:00'),
(56, 4, '20:00:00', '21:00:00'),
(57, 5, '07:00:00', '08:00:00'),
(58, 5, '08:00:00', '09:00:00'),
(59, 5, '09:00:00', '10:00:00'),
(60, 5, '10:00:00', '11:00:00'),
(61, 5, '11:00:00', '12:00:00'),
(62, 5, '12:00:00', '13:00:00'),
(63, 5, '13:00:00', '14:00:00'),
(64, 5, '14:00:00', '15:00:00'),
(65, 5, '15:00:00', '16:00:00'),
(66, 5, '16:00:00', '17:00:00'),
(67, 5, '17:00:00', '18:00:00'),
(68, 5, '18:00:00', '19:00:00'),
(69, 5, '19:00:00', '20:00:00'),
(70, 5, '20:00:00', '21:00:00'),
(71, 6, '07:00:00', '08:00:00'),
(72, 6, '08:00:00', '09:00:00'),
(73, 6, '09:00:00', '10:00:00'),
(74, 6, '10:00:00', '11:00:00'),
(75, 6, '11:00:00', '12:00:00'),
(76, 6, '12:00:00', '13:00:00'),
(77, 6, '13:00:00', '14:00:00'),
(78, 6, '14:00:00', '15:00:00'),
(79, 6, '15:00:00', '16:00:00'),
(80, 6, '16:00:00', '17:00:00'),
(81, 6, '17:00:00', '18:00:00'),
(82, 6, '18:00:00', '19:00:00'),
(83, 6, '19:00:00', '20:00:00'),
(84, 6, '20:00:00', '21:00:00'),
(85, 0, '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(50) NOT NULL,
  `horas_totales` int(2) NOT NULL,
  `hora_semanal` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `horas_totales`, `hora_semanal`) VALUES
(5, 'Contabilidad Superior', 60, 6),
(6, 'Introducción al derecho fiscal', 40, 4),
(7, 'Análisis e interpretación de estados financieros', 50, 5),
(8, 'Integradura', 20, 2),
(9, 'Formación Sociocultural', 20, 2),
(10, 'Presupuestos', 40, 3),
(11, 'Contabilidad de Sociedades', 40, 4),
(12, 'Ingles', 40, 4),
(13, 'Tutoria', 10, 1),
(14, 'Matematicas Finacieras', 50, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesor` int(11) NOT NULL,
  `nombre_profesor` varchar(50) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `nombre_profesor`, `apellidos`, `email`, `telefono`) VALUES
(4, 'Rabindranath', 'Hernández Abrego', '1@gmail.com', '7751023790'),
(5, 'Catia ', 'Corona Cruz', 'gutierrezerick552@gmail.com', '7751023790'),
(6, 'Leonel Javier', 'Hernandez Garcia', 'gutierrezerick552@gmail.com', '7751023790'),
(7, 'Mario', 'Martinez Gonzalez', 'gutierrezerick552@gmail.com', '7751023790'),
(8, 'Hugo', 'Villalba Martinez', 'gutierrezerick552@gmail.com', '7751023790'),
(9, 'Ivon ', 'Peralta Pineda', 'gutierrezerick552@gmail.com', '7751023790'),
(10, 'Gabina Julieta', 'Ortega Alvarez', 'gutierrezerick552@gmail.com', '7751023790'),
(11, 'Mario Enrique', 'Dominguez Rivero', 'gutierrezerick552@gmail.com', '7751023790');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password1` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `email`, `password1`) VALUES
(1, 'Erick', '1722110095@utectulancingo.edu.mx', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `disponibilidad_profesores`
--
ALTER TABLE `disponibilidad_profesores`
  ADD KEY `id_hora_profesor` (`id_hora_profesor`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `grupo_materia_profesor`
--
ALTER TABLE `grupo_materia_profesor`
  ADD PRIMARY KEY (`id_grupo_materia_profesor`),
  ADD UNIQUE KEY `id_grupo_2` (`id_grupo`,`id_materia`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_profesor` (`id_profesor`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD UNIQUE KEY `id_grupo_materia_profesor_2` (`id_grupo_materia_profesor`,`id_hora_horario`),
  ADD KEY `id_hora_horario` (`id_hora_horario`),
  ADD KEY `id_grupo_materia_profesor` (`id_grupo_materia_profesor`);

--
-- Indices de la tabla `hora_horarios`
--
ALTER TABLE `hora_horarios`
  ADD PRIMARY KEY (`id_hora_horario`);

--
-- Indices de la tabla `hora_profesores`
--
ALTER TABLE `hora_profesores`
  ADD PRIMARY KEY (`id_hora_profesor`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `grupo_materia_profesor`
--
ALTER TABLE `grupo_materia_profesor`
  MODIFY `id_grupo_materia_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibilidad_profesores`
--
ALTER TABLE `disponibilidad_profesores`
  ADD CONSTRAINT `disponibilidad_profesores_ibfk_1` FOREIGN KEY (`id_hora_profesor`) REFERENCES `hora_profesores` (`id_hora_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disponibilidad_profesores_ibfk_2` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_materia_profesor`
--
ALTER TABLE `grupo_materia_profesor`
  ADD CONSTRAINT `grupo_materia_profesor_ibfk_1` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_materia_profesor_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grupo_materia_profesor_ibfk_4` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`id_grupo_materia_profesor`) REFERENCES `grupo_materia_profesor` (`id_grupo_materia_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horarios_ibfk_2` FOREIGN KEY (`id_hora_horario`) REFERENCES `hora_horarios` (`id_hora_horario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


