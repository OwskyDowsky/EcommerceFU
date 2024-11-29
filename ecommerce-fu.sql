-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 13:40:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce-fu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 5, 'App\\Models\\User', 5, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-01 23:29:31', '2024-10-01 23:29:31'),
(2, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-01 23:29:41', '2024-10-01 23:29:41'),
(3, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-01 23:31:09', '2024-10-01 23:31:09'),
(4, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-01 23:31:19', '2024-10-01 23:31:19'),
(5, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 5, 'App\\Models\\User', 5, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 13:36:16', '2024-10-14 13:36:16'),
(6, 'usuarios', 'Usuario actualizado', 'App\\Models\\User', 'updated', 5, 'App\\Models\\User', 5, '{\"atributos\":[],\"anterior\":[]}', NULL, '2024-10-14 13:37:19', '2024-10-14 13:37:19'),
(7, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 5, 'App\\Models\\User', 5, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 13:37:19', '2024-10-14 13:37:19'),
(8, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 13:37:28', '2024-10-14 13:37:28'),
(9, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 16:58:13', '2024-10-14 16:58:13'),
(10, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 19:19:56', '2024-10-14 19:19:56'),
(11, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 19:23:29', '2024-10-14 19:23:29'),
(12, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-14 19:23:47', '2024-10-14 19:23:47'),
(13, 'clientes', 'Cliente activado', 'App\\Models\\Clientes', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-10-14 20:38:21', '2024-10-14 20:38:21'),
(14, 'clientes', 'Cliente creado', 'App\\Models\\Clientes', 'created', 2, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"owen\",\"apellido\":\"terceros\",\"cod_estudiante\":\"sis8333834\",\"ci\":\"8333834\",\"estado\":\"activo\"}}', NULL, '2024-10-14 20:46:16', '2024-10-14 20:46:16'),
(15, 'clientes', 'Cliente creado', 'App\\Models\\Clientes', 'created', 3, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"owen\",\"apellido\":\"terceros\",\"cod_estudiante\":\"sis8333834\",\"ci\":\"8333834\",\"estado\":\"activo\"}}', NULL, '2024-10-14 20:47:27', '2024-10-14 20:47:27'),
(16, 'clientes', 'Cliente eliminado', 'App\\Models\\Clientes', 'deleted', 3, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"owen\",\"apellido\":\"terceros\",\"cod_estudiante\":\"sis8333834\",\"ci\":\"8333834\",\"estado\":\"activo\"}}', NULL, '2024-10-14 20:47:38', '2024-10-14 20:47:38'),
(17, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-15 15:51:10', '2024-10-15 15:51:10'),
(18, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-15 15:55:51', '2024-10-15 15:55:51'),
(19, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 5, 'App\\Models\\User', 5, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-15 15:56:07', '2024-10-15 15:56:07'),
(20, 'usuarios', 'Usuario actualizado', 'App\\Models\\User', 'updated', 5, 'App\\Models\\User', 5, '{\"atributos\":[],\"anterior\":[]}', NULL, '2024-10-15 15:56:12', '2024-10-15 15:56:12'),
(21, 'auth', 'Usuario ha cerrado sesión.', 'App\\Models\\User', 'logout', 5, 'App\\Models\\User', 5, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-15 15:56:12', '2024-10-15 15:56:12'),
(22, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-15 15:56:26', '2024-10-15 15:56:26'),
(23, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-10-22 13:16:48', '2024-10-22 13:16:48'),
(24, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":6},\"anterior\":{\"stock\":5}}', NULL, '2024-10-22 14:44:14', '2024-10-22 14:44:14'),
(25, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":7},\"anterior\":{\"stock\":6}}', NULL, '2024-10-22 14:44:16', '2024-10-22 14:44:16'),
(26, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":8},\"anterior\":{\"stock\":7}}', NULL, '2024-10-22 14:44:29', '2024-10-22 14:44:29'),
(27, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":9},\"anterior\":{\"stock\":8}}', NULL, '2024-10-22 14:44:30', '2024-10-22 14:44:30'),
(28, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":10},\"anterior\":{\"stock\":9}}', NULL, '2024-10-22 14:44:40', '2024-10-22 14:44:40'),
(29, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":11},\"anterior\":{\"stock\":10}}', NULL, '2024-10-22 14:44:40', '2024-10-22 14:44:40'),
(30, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":12},\"anterior\":{\"stock\":11}}', NULL, '2024-10-22 14:44:58', '2024-10-22 14:44:58'),
(31, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":13},\"anterior\":{\"stock\":12}}', NULL, '2024-10-22 14:45:00', '2024-10-22 14:45:00'),
(32, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":14},\"anterior\":{\"stock\":13}}', NULL, '2024-10-22 14:45:00', '2024-10-22 14:45:00'),
(33, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":15},\"anterior\":{\"stock\":14}}', NULL, '2024-10-22 14:45:01', '2024-10-22 14:45:01'),
(34, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":16},\"anterior\":{\"stock\":15}}', NULL, '2024-10-22 15:13:36', '2024-10-22 15:13:36'),
(35, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":17},\"anterior\":{\"stock\":16}}', NULL, '2024-10-22 15:13:38', '2024-10-22 15:13:38'),
(36, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":18},\"anterior\":{\"stock\":17}}', NULL, '2024-10-22 15:13:39', '2024-10-22 15:13:39'),
(37, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":19},\"anterior\":{\"stock\":18}}', NULL, '2024-10-22 15:19:04', '2024-10-22 15:19:04'),
(38, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":20},\"anterior\":{\"stock\":19}}', NULL, '2024-10-22 15:19:05', '2024-10-22 15:19:05'),
(39, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":21},\"anterior\":{\"stock\":20}}', NULL, '2024-10-22 15:19:06', '2024-10-22 15:19:06'),
(40, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":22},\"anterior\":{\"stock\":21}}', NULL, '2024-10-22 16:26:11', '2024-10-22 16:26:11'),
(41, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":23},\"anterior\":{\"stock\":22}}', NULL, '2024-10-22 16:26:13', '2024-10-22 16:26:13'),
(42, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-10-22 18:49:33', '2024-10-22 18:49:33'),
(43, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-10-22 18:49:34', '2024-10-22 18:49:34'),
(44, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-04 13:19:11', '2024-11-04 13:19:11'),
(45, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-04 19:25:24', '2024-11-04 19:25:24'),
(46, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-11 20:23:29', '2024-11-11 20:23:29'),
(47, 'clientes', 'Cliente creado', 'App\\Models\\Clientes', 'created', 4, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"marcelo\",\"apellido\":\"marcelo\",\"cod_estudiante\":\"7615313\",\"ci\":\"7625323\",\"estado\":\"activo\"}}', NULL, '2024-11-11 20:55:57', '2024-11-11 20:55:57'),
(48, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-13 14:02:38', '2024-11-13 14:02:38'),
(49, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":22},\"anterior\":{\"stock\":23}}', NULL, '2024-11-13 14:40:15', '2024-11-13 14:40:15'),
(50, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 3, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":19},\"anterior\":{\"stock\":20}}', NULL, '2024-11-13 14:44:06', '2024-11-13 14:44:06'),
(51, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":9},\"anterior\":{\"stock\":10}}', NULL, '2024-11-13 14:44:06', '2024-11-13 14:44:06'),
(52, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":12},\"anterior\":{\"stock\":13}}', NULL, '2024-11-13 14:45:29', '2024-11-13 14:45:29'),
(53, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":9},\"anterior\":{\"stock\":10}}', NULL, '2024-11-13 14:45:29', '2024-11-13 14:45:29'),
(54, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":8},\"anterior\":{\"stock\":9}}', NULL, '2024-11-13 15:06:19', '2024-11-13 15:06:19'),
(55, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":11},\"anterior\":{\"stock\":12}}', NULL, '2024-11-13 15:06:19', '2024-11-13 15:06:19'),
(56, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":7},\"anterior\":{\"stock\":8}}', NULL, '2024-11-13 15:07:31', '2024-11-13 15:07:31'),
(57, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 3, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":18},\"anterior\":{\"stock\":19}}', NULL, '2024-11-13 15:07:31', '2024-11-13 15:07:31'),
(58, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":10},\"anterior\":{\"stock\":11}}', NULL, '2024-11-13 15:07:31', '2024-11-13 15:07:31'),
(59, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":8},\"anterior\":{\"stock\":9}}', NULL, '2024-11-13 15:07:31', '2024-11-13 15:07:31'),
(60, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":21},\"anterior\":{\"stock\":22}}', NULL, '2024-11-13 15:07:31', '2024-11-13 15:07:31'),
(61, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":7},\"anterior\":{\"stock\":8}}', NULL, '2024-11-13 15:27:43', '2024-11-13 15:27:43'),
(62, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":20},\"anterior\":{\"stock\":21}}', NULL, '2024-11-13 15:27:43', '2024-11-13 15:27:43'),
(63, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":19},\"anterior\":{\"stock\":20}}', NULL, '2024-11-13 15:29:02', '2024-11-13 15:29:02'),
(64, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":6},\"anterior\":{\"stock\":7}}', NULL, '2024-11-13 15:29:02', '2024-11-13 15:29:02'),
(65, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":5},\"anterior\":{\"stock\":6}}', NULL, '2024-11-13 15:37:24', '2024-11-13 15:37:24'),
(66, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":4},\"anterior\":{\"stock\":5}}', NULL, '2024-11-13 16:26:08', '2024-11-13 16:26:08'),
(67, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":8},\"anterior\":{\"stock\":10}}', NULL, '2024-11-13 16:26:08', '2024-11-13 16:26:08'),
(68, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-13 22:51:37', '2024-11-13 22:51:37'),
(69, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 6, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":3},\"anterior\":{\"stock\":4}}', NULL, '2024-11-13 22:58:46', '2024-11-13 22:58:46'),
(70, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":18},\"anterior\":{\"stock\":19}}', NULL, '2024-11-13 22:58:46', '2024-11-13 22:58:46'),
(71, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":7},\"anterior\":{\"stock\":8}}', NULL, '2024-11-13 23:01:13', '2024-11-13 23:01:13'),
(72, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 3, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":16},\"anterior\":{\"stock\":18}}', NULL, '2024-11-13 23:01:13', '2024-11-13 23:01:13'),
(73, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-25 15:57:45', '2024-11-25 15:57:45'),
(74, 'categorias', 'Categoría activada', 'App\\Models\\Categorias', 'updated', 27, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:00:04', '2024-11-25 16:00:04'),
(75, 'categorias', 'Categoría desactivada', 'App\\Models\\Categorias', 'updated', 27, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:05', '2024-11-25 16:00:05'),
(76, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 27, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"non\",\"descripcion\":\"Iste nostrum qui soluta quia expedita debitis id minus.\",\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:00:11', '2024-11-25 16:00:11'),
(77, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 26, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"porro\",\"descripcion\":\"Nostrum dolorem quod voluptate officiis.\",\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:00:14', '2024-11-25 16:00:14'),
(78, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 25, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"consequuntur\",\"descripcion\":\"Est facere aut earum iure suscipit.\",\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:00:17', '2024-11-25 16:00:17'),
(79, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 24, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"sequi\",\"descripcion\":\"Odit ea deserunt nihil quas earum doloremque.\",\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:00:20', '2024-11-25 16:00:20'),
(80, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 23, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"quod\",\"descripcion\":\"Ut praesentium culpa minus eligendi.\",\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:00:22', '2024-11-25 16:00:22'),
(81, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 22, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"itaque\",\"descripcion\":\"Pariatur ut unde veniam nulla porro aut sunt.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:25', '2024-11-25 16:00:25'),
(82, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 17, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"pariatur\",\"descripcion\":\"Modi deleniti eaque eaque.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:31', '2024-11-25 16:00:31'),
(83, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 16, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"omnis\",\"descripcion\":\"Eveniet sit natus accusamus in non.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:33', '2024-11-25 16:00:33'),
(84, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 18, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"nesciunt\",\"descripcion\":\"Iusto et nisi dignissimos illum hic eius.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:35', '2024-11-25 16:00:35'),
(85, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 21, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"tenetur\",\"descripcion\":\"Exercitationem nesciunt velit odio consequatur aut.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:39', '2024-11-25 16:00:39'),
(86, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 13, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"error\",\"descripcion\":\"Pariatur eos et corrupti accusantium enim.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:42', '2024-11-25 16:00:42'),
(87, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 20, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"hic\",\"descripcion\":\"Aut in voluptatem error possimus velit.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:45', '2024-11-25 16:00:45'),
(88, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 19, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"assumenda\",\"descripcion\":\"Minus error necessitatibus est dolorum accusantium.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:47', '2024-11-25 16:00:47'),
(89, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 15, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"sint\",\"descripcion\":\"Fuga et voluptatibus magnam vel sed.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:51', '2024-11-25 16:00:51'),
(90, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 14, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"consequatur\",\"descripcion\":\"Necessitatibus possimus odio facilis quis ad.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:54', '2024-11-25 16:00:54'),
(91, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 12, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"quod\",\"descripcion\":\"Dolorem earum quia dolorem dicta cupiditate perferendis officia perspiciatis.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:00:57', '2024-11-25 16:00:57'),
(92, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 11, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"ipsum\",\"descripcion\":\"Nihil recusandae ipsum voluptate repellendus omnis.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:01:01', '2024-11-25 16:01:01'),
(93, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 8, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"id\",\"descripcion\":\"Repellendus quidem nihil in nisi qui.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:01:05', '2024-11-25 16:01:05'),
(94, 'categorias', 'Categoría eliminada', 'App\\Models\\Categorias', 'deleted', 10, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"magni\",\"descripcion\":\"Sit id exercitationem suscipit eos.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:01:08', '2024-11-25 16:01:08'),
(95, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:02:02', '2024-11-25 16:02:02'),
(96, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 16:02:03', '2024-11-25 16:02:03'),
(97, 'categorias', 'Categoría desactivada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 16:02:32', '2024-11-25 16:02:32'),
(98, 'categorias', 'Categoría activada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:02:37', '2024-11-25 16:02:37'),
(99, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 16:02:47', '2024-11-25 16:02:47'),
(100, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:02:48', '2024-11-25 16:02:48'),
(101, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 16:08:00', '2024-11-25 16:08:00'),
(102, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 7, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:08:02', '2024-11-25 16:08:02'),
(103, 'productos', 'Producto eliminado', 'App\\Models\\Productos', 'deleted', 6, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"wawai\",\"descripcion\":\"wawai color orjo\",\"precio\":\"60.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":6,\"stock\":3,\"sede_id\":1}}', NULL, '2024-11-25 16:18:06', '2024-11-25 16:18:06'),
(104, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 1, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 16:21:00', '2024-11-25 16:21:00'),
(105, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 8, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Tomatodo\",\"descripcion\":\"botella de cristal con\\ntap\\u00f3n de acero inoxidable \",\"precio\":\"50.00\",\"estado\":\"activo\",\"categoria_id\":4,\"proyecto_id\":6,\"stock\":10,\"sede_id\":1}}', NULL, '2024-11-25 16:22:07', '2024-11-25 16:22:07'),
(106, 'categorias', 'Categoría creada', 'App\\Models\\Categorias', 'created', 28, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Envasados bebibles\",\"descripcion\":\"cuanquierl enavasado para bebidas\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:28:46', '2024-11-25 16:28:46'),
(107, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 8, 'App\\Models\\User', 8, '{\"atributos\":{\"categoria_id\":28},\"anterior\":{\"categoria_id\":4}}', NULL, '2024-11-25 16:28:56', '2024-11-25 16:28:56'),
(108, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Estuchera\",\"descripcion\":\"Estuche con algod\\u00f3n reciclado \",\"precio\":\"35.00\",\"estado\":\"activo\",\"categoria_id\":4,\"proyecto_id\":6,\"stock\":20,\"sede_id\":1}}', NULL, '2024-11-25 16:29:54', '2024-11-25 16:29:54'),
(109, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 10, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Taza\",\"descripcion\":\"Taza de ceramica\",\"precio\":\"30.00\",\"estado\":\"activo\",\"categoria_id\":28,\"proyecto_id\":6,\"stock\":15,\"sede_id\":1}}', NULL, '2024-11-25 16:30:52', '2024-11-25 16:30:52'),
(110, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 11, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Pines\",\"descripcion\":\"Bot\\u00f3n de pl\\u00e1stico con gancho\",\"precio\":\"5.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":6,\"stock\":100,\"sede_id\":1}}', NULL, '2024-11-25 16:31:56', '2024-11-25 16:31:56'),
(111, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 12, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"LLvero\",\"descripcion\":\"llavero de cololes\",\"precio\":\"10.00\",\"estado\":\"activo\",\"categoria_id\":9,\"proyecto_id\":6,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:33:00', '2024-11-25 16:33:00'),
(112, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 13, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Manta\",\"descripcion\":\"manta\",\"precio\":\"60.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":6,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:46:26', '2024-11-25 16:46:26'),
(113, 'categorias', 'Categoría creada', 'App\\Models\\Categorias', 'created', 29, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Accesorios\",\"descripcion\":\"Accesorios peque\\u00f1os y decorativos\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:46:57', '2024-11-25 16:46:57'),
(114, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 12, 'App\\Models\\User', 8, '{\"atributos\":{\"categoria_id\":29},\"anterior\":{\"categoria_id\":9}}', NULL, '2024-11-25 16:47:16', '2024-11-25 16:47:16'),
(115, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 11, 'App\\Models\\User', 8, '{\"atributos\":{\"categoria_id\":29},\"anterior\":{\"categoria_id\":3}}', NULL, '2024-11-25 16:47:24', '2024-11-25 16:47:24'),
(116, 'proyectos', 'Proyecto eliminado', 'App\\Models\\Proyectos', 'deleted', 6, 'App\\Models\\User', 8, '{\"anterior\":{\"nombre\":\"triqui-trueque\",\"descripcion\":\"En este proyecto realiza la recolecci\\u00f3n de donaciones a cambio de recuerdos de la marca \\\"Sana Sana\\\".\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:47:43', '2024-11-25 16:47:43'),
(117, 'proyectos', 'Proyecto creado', 'App\\Models\\Proyectos', 'created', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Triqui-trueque\",\"descripcion\":\"En este proyecto realiza la recolecci\\u00f3n de donaciones a cambio de recuerdos de la marca \\\"Sana Sana\\\", todos los fondos recolectados van dirigidos a las ayudas sociales que realiza la \\\"Fundaci\\u00f3n Unifranz\\\" como la compra de cat\\u00e9teres implantables, financiamiento de resonancias magn\\u00e9ticas, entre otras causas de tipo m\\u00e9dico.\",\"estado\":\"activo\"}}', NULL, '2024-11-25 16:49:05', '2024-11-25 16:49:05'),
(118, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 14, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Almohada viaje\",\"descripcion\":\"Almohada con tela sirena\",\"precio\":\"55.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:50:04', '2024-11-25 16:50:04'),
(119, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 15, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Manta\",\"descripcion\":\"Manta con tela sirena\",\"precio\":\"60.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:51:25', '2024-11-25 16:51:25'),
(120, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 16, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Llavero\",\"descripcion\":\"Llavero de PVC\",\"precio\":\"10.00\",\"estado\":\"activo\",\"categoria_id\":29,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:52:07', '2024-11-25 16:52:07'),
(121, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Pines\",\"descripcion\":\"Boton de plastico y metal\",\"precio\":\"5.00\",\"estado\":\"activo\",\"categoria_id\":29,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:52:46', '2024-11-25 16:52:46'),
(122, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 18, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Sana Sana\",\"descripcion\":\"Peluches de tela polar\",\"precio\":\"30.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":9,\"stock\":10,\"sede_id\":1}}', NULL, '2024-11-25 16:53:25', '2024-11-25 16:53:25'),
(123, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 19, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Taza\",\"descripcion\":\"Taza de ceramica\",\"precio\":\"30.00\",\"estado\":\"activo\",\"categoria_id\":28,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:54:08', '2024-11-25 16:54:08'),
(124, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 20, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Estuche\",\"descripcion\":\"Estuche de alhodon\",\"precio\":\"35.00\",\"estado\":\"activo\",\"categoria_id\":4,\"proyecto_id\":9,\"stock\":20,\"sede_id\":1}}', NULL, '2024-11-25 16:54:51', '2024-11-25 16:54:51'),
(125, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 21, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Cuaderno\",\"descripcion\":\"Cartulina triple 250 g.\\ny papel bondad 75 g.\",\"precio\":\"35.00\",\"estado\":\"activo\",\"categoria_id\":4,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:55:39', '2024-11-25 16:55:39'),
(126, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 22, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Bolsa\",\"descripcion\":\"Bolsa de algodon\",\"precio\":\"35.00\",\"estado\":\"activo\",\"categoria_id\":2,\"proyecto_id\":9,\"stock\":50,\"sede_id\":1}}', NULL, '2024-11-25 16:56:18', '2024-11-25 16:56:18'),
(127, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Tomatodo\",\"descripcion\":\"Botella de cristal con\\ntap\\u00f3n de acero inoxidable \",\"precio\":\"50.00\",\"estado\":\"activo\",\"categoria_id\":28,\"proyecto_id\":9,\"stock\":10,\"sede_id\":1}}', NULL, '2024-11-25 16:57:20', '2024-11-25 16:57:20'),
(128, 'productos', 'Producto creado', 'App\\Models\\Productos', 'created', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Cabezones\",\"descripcion\":\"Peluches de tela sirena\",\"precio\":\"55.00\",\"estado\":\"activo\",\"categoria_id\":3,\"proyecto_id\":9,\"stock\":30,\"sede_id\":1}}', NULL, '2024-11-25 16:57:59', '2024-11-25 16:57:59'),
(129, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":29},\"anterior\":{\"stock\":30}}', NULL, '2024-11-25 16:59:02', '2024-11-25 16:59:02'),
(130, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":49},\"anterior\":{\"stock\":50}}', NULL, '2024-11-25 16:59:02', '2024-11-25 16:59:02'),
(131, 'clientes', 'Cliente creado', 'App\\Models\\Clientes', 'created', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"nombre\":\"Hector\",\"apellido\":\"Lavoe\",\"cod_estudiante\":\"sis8333834\",\"ci\":\"8333834\",\"estado\":\"activo\"}}', NULL, '2024-11-25 17:02:11', '2024-11-25 17:02:11'),
(132, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":28},\"anterior\":{\"stock\":29}}', NULL, '2024-11-25 17:02:49', '2024-11-25 17:02:49'),
(133, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":48},\"anterior\":{\"stock\":49}}', NULL, '2024-11-25 17:02:49', '2024-11-25 17:02:49'),
(134, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":46},\"anterior\":{\"stock\":48}}', NULL, '2024-11-25 17:08:23', '2024-11-25 17:08:23'),
(135, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":9},\"anterior\":{\"stock\":10}}', NULL, '2024-11-25 17:08:23', '2024-11-25 17:08:23'),
(136, 'categorias', 'Categoría desactivada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 17:38:19', '2024-11-25 17:38:19'),
(137, 'proyectos', 'Proyecto desactivado', 'App\\Models\\Proyectos', 'updated', 2, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 17:38:38', '2024-11-25 17:38:38'),
(138, 'proyectos', 'Proyecto desactivado', 'App\\Models\\Proyectos', 'updated', 3, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 17:38:40', '2024-11-25 17:38:40'),
(139, 'proyectos', 'Proyecto desactivado', 'App\\Models\\Proyectos', 'updated', 4, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 17:38:40', '2024-11-25 17:38:40'),
(140, 'proyectos', 'Proyecto desactivado', 'App\\Models\\Proyectos', 'updated', 5, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 17:38:41', '2024-11-25 17:38:41'),
(141, 'categorias', 'Categoría activada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 17:38:55', '2024-11-25 17:38:55'),
(142, 'categorias', 'Categoría desactivada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 17:48:10', '2024-11-25 17:48:10'),
(143, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 20, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 18:57:23', '2024-11-25 18:57:23'),
(144, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 21, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 18:57:24', '2024-11-25 18:57:24'),
(145, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 22, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 18:57:25', '2024-11-25 18:57:25'),
(146, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 18:57:27', '2024-11-25 18:57:27'),
(147, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 18:57:29', '2024-11-25 18:57:29'),
(148, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 19, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 19:30:21', '2024-11-25 19:30:21'),
(149, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 18, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 19:30:22', '2024-11-25 19:30:22'),
(150, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 19:30:22', '2024-11-25 19:30:22'),
(151, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 16, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 19:30:23', '2024-11-25 19:30:23'),
(152, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 15, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 19:30:24', '2024-11-25 19:30:24'),
(153, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 14, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 19:30:26', '2024-11-25 19:30:26'),
(154, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:52', '2024-11-25 19:31:52'),
(155, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:53', '2024-11-25 19:31:53'),
(156, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 22, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:54', '2024-11-25 19:31:54'),
(157, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 21, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:54', '2024-11-25 19:31:54'),
(158, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 20, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:55', '2024-11-25 19:31:55'),
(159, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 19, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:57', '2024-11-25 19:31:57'),
(160, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 18, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:58', '2024-11-25 19:31:58'),
(161, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 16, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:31:59', '2024-11-25 19:31:59'),
(162, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:32:03', '2024-11-25 19:32:03'),
(163, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 15, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:32:05', '2024-11-25 19:32:05'),
(164, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 14, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 19:32:07', '2024-11-25 19:32:07'),
(165, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":27},\"anterior\":{\"stock\":28}}', NULL, '2024-11-25 20:24:24', '2024-11-25 20:24:24'),
(166, 'categorias', 'Categoría activada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 20:24:49', '2024-11-25 20:24:49'),
(167, 'categorias', 'Categoría desactivada', 'App\\Models\\Categorias', 'updated', 9, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:01', '2024-11-25 20:25:01'),
(168, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 22, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:33', '2024-11-25 20:25:33'),
(169, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 21, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:34', '2024-11-25 20:25:34'),
(170, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 20, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:36', '2024-11-25 20:25:36'),
(171, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:37', '2024-11-25 20:25:37'),
(172, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:37', '2024-11-25 20:25:37'),
(173, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 15, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:40', '2024-11-25 20:25:40'),
(174, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 16, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:41', '2024-11-25 20:25:41'),
(175, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:41', '2024-11-25 20:25:41'),
(176, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 18, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:42', '2024-11-25 20:25:42'),
(177, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 19, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:42', '2024-11-25 20:25:42'),
(178, 'productos', 'Producto desactivado', 'App\\Models\\Productos', 'updated', 14, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:25:44', '2024-11-25 20:25:44'),
(179, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 21, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 20:25:58', '2024-11-25 20:25:58'),
(180, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 22, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 20:25:58', '2024-11-25 20:25:58'),
(181, 'usuarios', 'Usuario desactivado', 'App\\Models\\User', 'updated', 4, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"inactivo\"},\"anterior\":{\"estado\":\"activo\"}}', NULL, '2024-11-25 20:30:04', '2024-11-25 20:30:04'),
(182, 'usuarios', 'Usuario activado', 'App\\Models\\User', 'updated', 4, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-25 20:30:05', '2024-11-25 20:30:05'),
(183, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-26 15:04:52', '2024-11-26 15:04:52'),
(184, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:11:25', '2024-11-26 17:11:25'),
(185, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:11:26', '2024-11-26 17:11:26'),
(186, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 20, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:11:27', '2024-11-26 17:11:27'),
(187, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 19, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:12:10', '2024-11-26 17:12:10'),
(188, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 18, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:12:12', '2024-11-26 17:12:12'),
(189, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 17, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:12:13', '2024-11-26 17:12:13'),
(190, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 16, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:12:15', '2024-11-26 17:12:15'),
(191, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 15, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:12:16', '2024-11-26 17:12:16'),
(192, 'productos', 'Producto activado', 'App\\Models\\Productos', 'updated', 14, 'App\\Models\\User', 8, '{\"atributos\":{\"estado\":\"activo\"},\"anterior\":{\"estado\":\"inactivo\"}}', NULL, '2024-11-26 17:12:19', '2024-11-26 17:12:19'),
(193, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-26 20:25:20', '2024-11-26 20:25:20'),
(194, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":26},\"anterior\":{\"stock\":27}}', NULL, '2024-11-26 20:25:39', '2024-11-26 20:25:39'),
(195, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":25},\"anterior\":{\"stock\":26}}', NULL, '2024-11-26 20:46:14', '2024-11-26 20:46:14'),
(196, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-27 13:27:54', '2024-11-27 13:27:54'),
(197, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":23},\"anterior\":{\"stock\":25}}', NULL, '2024-11-27 13:41:20', '2024-11-27 13:41:20'),
(198, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":8},\"anterior\":{\"stock\":9}}', NULL, '2024-11-27 13:41:20', '2024-11-27 13:41:20'),
(199, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":22},\"anterior\":{\"stock\":23}}', NULL, '2024-11-27 13:47:51', '2024-11-27 13:47:51'),
(200, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":7},\"anterior\":{\"stock\":8}}', NULL, '2024-11-27 13:47:51', '2024-11-27 13:47:51'),
(201, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 22, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":49},\"anterior\":{\"stock\":50}}', NULL, '2024-11-27 14:40:27', '2024-11-27 14:40:27'),
(202, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 21, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":49},\"anterior\":{\"stock\":50}}', NULL, '2024-11-27 14:40:27', '2024-11-27 14:40:27'),
(203, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-27 20:13:51', '2024-11-27 20:13:51'),
(204, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 24, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":20},\"anterior\":{\"stock\":22}}', NULL, '2024-11-27 20:16:58', '2024-11-27 20:16:58');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(205, 'productos', 'Producto actualizado', 'App\\Models\\Productos', 'updated', 23, 'App\\Models\\User', 8, '{\"atributos\":{\"stock\":6},\"anterior\":{\"stock\":7}}', NULL, '2024-11-27 20:16:58', '2024-11-27 20:16:58'),
(206, 'auth', 'Usuario ha iniciado sesión.', 'App\\Models\\User', 'login', 8, 'App\\Models\\User', 8, '{\"ip\":\"127.0.0.1\"}', NULL, '2024-11-28 16:36:21', '2024-11-28 16:36:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('activo','inactivo') DEFAULT 'activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `estado`) VALUES
(2, 'bolsas', 'bolsas del triqui', '2024-08-31 00:48:58', '2024-08-31 00:48:58', 'activo'),
(3, 'peluches', 'peluches del sana sana', '2024-09-02 22:22:25', '2024-09-02 22:22:25', 'activo'),
(4, 'material escolar', 'del triqui trueque', '2024-09-02 22:24:01', '2024-09-02 22:24:01', 'activo'),
(9, 'eaque', 'Nihil consequatur recusandae ab dolorem quo.', '2024-09-10 19:31:12', '2024-11-25 20:25:01', 'inactivo'),
(28, 'Envasados bebibles', 'cuanquierl enavasado para bebidas', '2024-11-25 16:28:46', '2024-11-25 16:28:46', 'activo'),
(29, 'Accesorios', 'Accesorios pequeños y decorativos', '2024-11-25 16:46:57', '2024-11-25 16:46:57', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cod_estudiante` varchar(20) DEFAULT NULL,
  `ci` varchar(20) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `cod_estudiante`, `ci`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Elias', 'Aron', 'sis8465879', '8465879', 'activo', '2024-09-30 06:34:03', '2024-10-14 20:38:21'),
(2, 'owen', 'terceros', 'sis8333834', '8333834', 'activo', '2024-10-14 20:46:16', '2024-10-14 20:46:16'),
(4, 'marcelo', 'marcelo', '7615313', '7625323', 'activo', '2024-11-11 20:55:57', '2024-11-11 20:55:57'),
(5, 'Hector', 'Lavoe', 'sis8333834', '8333834', 'activo', '2024-11-25 17:02:11', '2024-11-25 17:02:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cupones`
--

CREATE TABLE `cupones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descuento` decimal(5,2) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categorias_id` varchar(50) DEFAULT NULL,
  `productos_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cupones`
--

INSERT INTO `cupones` (`id`, `nombre`, `descuento`, `fecha_vencimiento`, `estado`, `created_at`, `updated_at`, `categorias_id`, `productos_id`) VALUES
(20, 'prueba categoria', 30.00, '2024-11-28', 'activo', '2024-11-26 16:06:12', '2024-11-26 16:29:49', '[\"2\",\"3\"]', '[]'),
(21, 'prueba producto', 50.00, '2024-11-27', 'activo', '2024-11-26 16:54:13', '2024-11-26 16:54:13', '[]', '[\"18\"]'),
(22, 'cupon mati', 100.00, '2024-11-27', 'activo', '2024-11-26 20:49:27', '2024-11-26 20:49:27', '[\"3\"]', '[]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `imageable_id` int(11) NOT NULL,
  `imageable_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_id`, `imageable_type`, `created_at`, `updated_at`) VALUES
(2, 'productos/66d72c1bbdc1d.jpg', 2, 'App\\Models\\Productos', '2024-09-03 19:32:43', '2024-09-03 19:32:43'),
(8, 'users/66e3a5641fdf0.jpg', 4, 'App\\Models\\User', '2024-09-13 06:37:24', '2024-09-13 06:37:24'),
(10, 'users/66e46ad2a0ff5.png', 7, 'App\\Models\\User', '2024-09-13 20:39:46', '2024-09-13 20:39:46'),
(11, 'productos/6744a334d46a4.png', 7, 'App\\Models\\Productos', '2024-11-25 16:17:56', '2024-11-25 16:17:56'),
(12, 'productos/6744a38351cad.png', 5, 'App\\Models\\Productos', '2024-11-25 16:19:15', '2024-11-25 16:19:15'),
(13, 'productos/6744a3a2ca66d.png', 3, 'App\\Models\\Productos', '2024-11-25 16:19:46', '2024-11-25 16:19:46'),
(14, 'productos/6744a3d10b96a.png', 1, 'App\\Models\\Productos', '2024-11-25 16:20:33', '2024-11-25 16:20:33'),
(15, 'productos/6744a43000b62.png', 8, 'App\\Models\\Productos', '2024-11-25 16:22:08', '2024-11-25 16:22:08'),
(16, 'productos/6744a6023a2d2.png', 9, 'App\\Models\\Productos', '2024-11-25 16:29:54', '2024-11-25 16:29:54'),
(17, 'productos/6744a63c8b970.png', 10, 'App\\Models\\Productos', '2024-11-25 16:30:52', '2024-11-25 16:30:52'),
(18, 'productos/6744a67c5429b.png', 11, 'App\\Models\\Productos', '2024-11-25 16:31:56', '2024-11-25 16:31:56'),
(19, 'productos/6744a6bc8bb30.png', 12, 'App\\Models\\Productos', '2024-11-25 16:33:00', '2024-11-25 16:33:00'),
(20, 'productos/6744a9e219ebc.png', 13, 'App\\Models\\Productos', '2024-11-25 16:46:26', '2024-11-25 16:46:26'),
(21, 'productos/6744aabc79665.png', 14, 'App\\Models\\Productos', '2024-11-25 16:50:04', '2024-11-25 16:50:04'),
(22, 'productos/6744ab0d2c8b7.png', 15, 'App\\Models\\Productos', '2024-11-25 16:51:25', '2024-11-25 16:51:25'),
(23, 'productos/6744ab37149f1.png', 16, 'App\\Models\\Productos', '2024-11-25 16:52:07', '2024-11-25 16:52:07'),
(24, 'productos/6744ab5e69fcb.png', 17, 'App\\Models\\Productos', '2024-11-25 16:52:46', '2024-11-25 16:52:46'),
(25, 'productos/6744ab851e777.png', 18, 'App\\Models\\Productos', '2024-11-25 16:53:25', '2024-11-25 16:53:25'),
(26, 'productos/6744abb085d6c.png', 19, 'App\\Models\\Productos', '2024-11-25 16:54:08', '2024-11-25 16:54:08'),
(27, 'productos/6744abdb409a2.png', 20, 'App\\Models\\Productos', '2024-11-25 16:54:51', '2024-11-25 16:54:51'),
(28, 'productos/6744ac0b259b4.png', 21, 'App\\Models\\Productos', '2024-11-25 16:55:39', '2024-11-25 16:55:39'),
(29, 'productos/6744ac322b554.png', 22, 'App\\Models\\Productos', '2024-11-25 16:56:18', '2024-11-25 16:56:18'),
(30, 'productos/6744ac70eeaf4.png', 23, 'App\\Models\\Productos', '2024-11-25 16:57:20', '2024-11-25 16:57:20'),
(31, 'productos/6744ac9750df3.png', 24, 'App\\Models\\Productos', '2024-11-25 16:57:59', '2024-11-25 16:57:59'),
(32, 'users/6744b5dc3edb0.png', 8, 'App\\Models\\User', '2024-11-25 17:37:32', '2024-11-25 17:37:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cupon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_ventas`
--

CREATE TABLE `item_ventas` (
  `id` int(11) NOT NULL,
  `ventas_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_09_11_142842_create_permission_tables', 2),
(7, '2024_10_01_192355_create_activity_log_table', 3),
(8, '2024_10_01_192356_add_event_column_to_activity_log_table', 3),
(9, '2024_10_01_192357_add_batch_uuid_column_to_activity_log_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'crear categoria', 'web', '2024-09-13 21:20:42', '2024-09-13 21:20:42'),
(2, 'editar categoria', 'web', '2024-09-13 21:20:50', '2024-09-13 21:20:50'),
(3, 'eliminar categoria', 'web', '2024-09-13 21:20:59', '2024-09-13 21:20:59'),
(4, 'Categoria ver', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(5, 'Categoria crear', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(6, 'Categoria editar', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(7, 'Categoria eliminar', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(8, 'Categoria baja', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(9, 'Proyecto ver', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(10, 'Proyecto crear', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(11, 'Proyecto editar', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(12, 'Proyecto eliminar', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(13, 'Proyecto baja', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(14, 'Sede ver', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(15, 'Sede crear', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(16, 'Sede editar', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(17, 'Sede eliminar', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(18, 'Sede baja', 'web', '2024-10-01 21:10:34', '2024-10-01 21:10:34'),
(19, 'Producto ver', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(20, 'Producto crear', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(21, 'Producto editar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(22, 'Producto eliminar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(23, 'Producto baja', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(24, 'Cupon ver', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(25, 'Cupon crear', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(26, 'Cupon editar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(27, 'Cupon eliminar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(28, 'Cupon baja', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(29, 'Usuario ver', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(30, 'Usuario crear', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(31, 'Usuario editar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(32, 'Usuario eliminar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(33, 'Usuario baja', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(34, 'Rol ver', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(35, 'Rol crear', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(36, 'Rol editar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(37, 'Rol eliminar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(38, 'Rol baja', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(39, 'Permiso ver', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(40, 'Permiso crear', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(41, 'Permiso editar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(42, 'Permiso eliminar', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(43, 'Permiso baja', 'web', '2024-10-01 21:10:35', '2024-10-01 21:10:35'),
(44, 'Cliente ver', 'web', '2024-10-14 20:36:56', '2024-10-14 20:36:56'),
(45, 'Cliente crear', 'web', '2024-10-14 20:37:08', '2024-10-14 20:37:08'),
(46, 'Cliente editar', 'web', '2024-10-14 20:37:22', '2024-10-14 20:37:22'),
(47, 'Cliente eliminar', 'web', '2024-10-14 20:37:36', '2024-10-14 20:37:36'),
(48, 'Cliente baja', 'web', '2024-10-14 20:37:44', '2024-10-14 20:37:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `categoria_id` int(11) NOT NULL,
  `proyecto_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sede_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `estado`, `categoria_id`, `proyecto_id`, `stock`, `created_at`, `updated_at`, `sede_id`, `slug`) VALUES
(14, 'Almohada viaje', 'Almohada con tela sirena', 55.00, 'activo', 3, 9, 50, '2024-11-25 16:50:04', '2024-11-26 17:12:19', 1, 'almohada-viaje'),
(15, 'Manta', 'Manta con tela sirena', 60.00, 'activo', 3, 9, 50, '2024-11-25 16:51:25', '2024-11-26 17:12:16', 1, 'manta'),
(16, 'Llavero', 'Llavero de PVC', 10.00, 'activo', 29, 9, 50, '2024-11-25 16:52:07', '2024-11-26 17:12:15', 1, 'llavero'),
(17, 'Pines', 'Boton de plastico y metal', 5.00, 'activo', 29, 9, 46, '2024-11-25 16:52:46', '2024-11-26 17:12:13', 1, 'pines'),
(18, 'Sana Sana', 'Peluches de tela polar', 30.00, 'activo', 3, 9, 10, '2024-11-25 16:53:25', '2024-11-26 17:12:12', 1, 'sana-sana'),
(19, 'Taza', 'Taza de ceramica', 30.00, 'activo', 28, 9, 50, '2024-11-25 16:54:08', '2024-11-26 17:12:10', 1, 'taza'),
(20, 'Estuche', 'Estuche de alhodon', 35.00, 'activo', 4, 9, 20, '2024-11-25 16:54:51', '2024-11-26 17:11:27', 1, 'estuche'),
(21, 'Cuaderno', 'Cartulina triple 250 g.\ny papel bondad 75 g.', 35.00, 'activo', 4, 9, 49, '2024-11-25 16:55:39', '2024-11-27 14:40:27', 1, 'cuaderno'),
(22, 'Bolsa', 'Bolsa de algodon', 35.00, 'activo', 2, 9, 49, '2024-11-25 16:56:18', '2024-11-27 14:40:27', 1, 'bolsa'),
(23, 'Tomatodo', 'Botella de cristal con\ntapón de acero inoxidable ', 50.00, 'activo', 28, 9, 6, '2024-11-25 16:57:20', '2024-11-27 20:16:58', 1, 'tomatodo'),
(24, 'Cabezones', 'Peluches de tela sirena', 55.00, 'activo', 3, 9, 20, '2024-11-25 16:57:59', '2024-11-27 20:16:58', 1, 'cabezones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_cupon`
--

CREATE TABLE `producto_cupon` (
  `id` int(11) NOT NULL,
  `cupon_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id`, `nombre`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'accion-rec', 'accion rec se encarga del reciclaje de materiales como papel, carton o metal', 'activo', '2024-09-02 21:18:10', '2024-09-05 17:35:20'),
(2, 'causa hay', 'Este proyecto busca potenciar una red de colaboradores y aliados estratégicos, que cultivan estas prácticas por la comunidad y que permiten que las pequeñas acciones se transformen en grandes “Causas” como la creación de ollas comunes para poblaciones desfavorecidas.', 'inactivo', '2024-09-02 21:26:52', '2024-11-25 17:38:38'),
(3, 'Doname', 'Este proyecto busca dar solución a la problemática del ¨medio ambiente¨ desarrollando actividades formativas y de sensibilización para que nuestra comunidad', 'inactivo', '2024-09-02 21:31:05', '2024-11-25 17:38:40'),
(4, 'hazlo x ellos', 'Este proyecto se dedica a mejorar la calidad de vida de animales en diferentes albergues a través de colectas comunitarias que proporcionan alimento y que mediante campañas de recaudación de fondos realizan esterilización para estos centros. ', 'inactivo', '2024-09-02 21:31:42', '2024-11-25 17:38:40'),
(5, 'proyecto chanchito', 'El proyecto Chanchito apoya a las actividades de la Fundación Unifranz para que mediante la oferta de diversos productos se genere esta recaudación de fondos.', 'inactivo', '2024-09-02 21:32:26', '2024-11-25 17:38:41'),
(9, 'Triqui-trueque', 'En este proyecto realiza la recolección de donaciones a cambio de recuerdos de la marca \"Sana Sana\", todos los fondos recolectados van dirigidos a las ayudas sociales que realiza la \"Fundación Unifranz\" como la compra de catéteres implantables, financiamiento de resonancias magnéticas, entre otras causas de tipo médico.', 'activo', '2024-11-25 16:49:05', '2024-11-25 16:49:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'web', '2024-09-13 21:20:22', '2024-09-13 21:20:22'),
(2, 'Super Admin', 'web', '2024-10-01 21:11:02', '2024-10-01 21:11:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `ubicacion`, `created_at`, `updated_at`) VALUES
(1, 'La paz', 'La paz, 6 de agosto', '2024-09-03 18:56:05', '2024-09-03 18:56:05'),
(2, 'Santa cruz', 'por el 2 anillo jaja', '2024-09-03 18:57:44', '2024-09-03 18:57:44'),
(4, 'el alto', 'le alto alado del aeropuerto', '2024-09-03 20:46:12', '2024-09-03 20:46:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `ci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `apellido_paterno`, `estado`, `ci`) VALUES
(4, 'owen', 'owen55boss@gmail.com', NULL, '12345678', NULL, '2024-09-12 22:37:00', '2024-11-25 20:30:05', 'terceros', 'activo', 8333834),
(5, 'admin', 'admin@gmail.com', NULL, '$2y$10$NxooOCwBSDXF9DeIWUS92OEWRa78ik3l4sp/o7C3rq6vX.QZaWqkW', 'pefx6clexqSteYqqhxBs3q4pJnvGEsLZ4fPabAGpq1D8wabHRWlUxMx59EqS', '2024-09-13 20:26:52', '2024-09-13 20:31:49', 'admin', 'activo', 18273645),
(7, 'Joaquin', 'joaquin@gmail.com', NULL, '$2y$10$L5ZbxUcxaY26QlTSJ7cpL.fbHSrI63hb4eT4QJegTXzZNuLfs3Yjq', NULL, '2024-09-13 20:39:46', '2024-09-13 22:32:41', 'Garcia', 'activo', 81276354),
(8, 'Super', 'superadmin@gmail.com', '2024-10-01 21:11:01', '$2y$10$4qbrvxg7m1H.C2IUqynouOMcv09kVqOSKTkE./Ttj9h00.XMF.DY6', NULL, '2024-10-01 21:11:02', '2024-10-01 21:11:02', 'Admin', 'activo', 12345678);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `pago` decimal(10,2) NOT NULL,
  `fecha` date NOT NULL,
  `users_id` int(11) NOT NULL,
  `clientes_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` enum('activo','anulado') DEFAULT 'activo',
  `fecha_anulacion` datetime DEFAULT NULL,
  `cupon_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cupones`
--
ALTER TABLE `cupones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_ventas`
--
ALTER TABLE `item_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ventas` (`ventas_id`),
  ADD KEY `fk_items` (`item_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria` (`categoria_id`),
  ADD KEY `fk_proyecto` (`proyecto_id`),
  ADD KEY `fk_sede_id` (`sede_id`);

--
-- Indices de la tabla `producto_cupon`
--
ALTER TABLE `producto_cupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cupon_id` (`cupon_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`users_id`),
  ADD KEY `fk_clientes` (`clientes_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cupones`
--
ALTER TABLE `cupones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `item_ventas`
--
ALTER TABLE `item_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `producto_cupon`
--
ALTER TABLE `producto_cupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `item_ventas`
--
ALTER TABLE `item_ventas`
  ADD CONSTRAINT `fk_items` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `fk_ventas` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_proyecto` FOREIGN KEY (`proyecto_id`) REFERENCES `proyectos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sede_id` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_cupon`
--
ALTER TABLE `producto_cupon`
  ADD CONSTRAINT `producto_cupon_ibfk_1` FOREIGN KEY (`cupon_id`) REFERENCES `cupones` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `producto_cupon_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_clientes` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `fk_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
