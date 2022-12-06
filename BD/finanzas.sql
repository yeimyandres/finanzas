-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2022 a las 22:04:04
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finanzas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipomovimiento` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `nombre`, `tipomovimiento`) VALUES
(1, 'Laborales', 'I'),
(3, 'Otros Ingresos', 'I'),
(4, 'Comida', 'E'),
(5, 'Compartir', 'E'),
(6, 'Créditos', 'E'),
(7, 'Educación', 'E'),
(8, 'Impuestos', 'E'),
(9, 'Mascotas', 'E'),
(10, 'Recreación', 'E'),
(11, 'Salud y Seguridad Social', 'E'),
(12, 'Servicios Públicos', 'E'),
(13, 'Tecnología', 'E'),
(14, 'Transporte', 'E'),
(15, 'Cuidado Personal', 'E'),
(16, 'Inversiones', 'E'),
(17, 'Reservas futuras', 'E'),
(18, 'Hogar', 'E'),
(19, 'Costos Bancarios', 'E'),
(20, 'Excedentes', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejecutados`
--

CREATE TABLE `ejecutados` (
  `id` int(11) NOT NULL,
  `idprogramado` int(11) NOT NULL,
  `idfuente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejecutados`
--

INSERT INTO `ejecutados` (`id`, `idprogramado`, `idfuente`, `fecha`, `detalle`, `valor`) VALUES
(2, 7, 1, '2022-12-05', 'Factura mensual', 14802),
(3, 8, 1, '2022-12-05', 'Factura mensual', 20829),
(6, 13, 1, '2022-12-06', 'carnes megamax', 104700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuentes`
--

CREATE TABLE `fuentes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipofuente` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fuentes`
--

INSERT INTO `fuentes` (`id`, `nombre`, `tipofuente`) VALUES
(1, 'Cuenta Bancaria Yeimy', 'B'),
(2, 'Efectivo Yeimy', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programados`
--

CREATE TABLE `programados` (
  `id` int(11) NOT NULL,
  `idrubro` int(11) NOT NULL,
  `fechalimite` date NOT NULL,
  `detalle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL,
  `estado` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'P'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `programados`
--

INSERT INTO `programados` (`id`, `idrubro`, `fechalimite`, `detalle`, `valor`, `estado`) VALUES
(2, 2, '2022-11-25', 'Salario mensual', 6145000, 'T'),
(3, 3, '2022-11-25', 'Saldo en banco noviembre 2022', 67000, 'T'),
(4, 5, '2022-12-01', 'Devolución suscripción Netflix y Amazon Prime Video', 38125, 'P'),
(5, 6, '2022-12-24', 'Prima de navidad 2022', 7900000, 'P'),
(14, 1, '2022-12-26', 'Compras de mercado para casa', 1300000, 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id` int(11) NOT NULL,
  `idcuenta` int(11) NOT NULL,
  `nombre` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id`, `idcuenta`, `nombre`, `descripcion`) VALUES
(1, 4, 'Mercado', 'Adquisición de alimentos, insumos y víveres para preparar en casa'),
(2, 1, 'Salario CGR', 'Sueldo percibido mensualmente por trabajar en CGR'),
(3, 20, 'Saldo Banco', 'Saldo disponible en Banco mes anterior'),
(4, 20, 'Saldo Efectivo', 'Saldo disponible en Efectivo mes anterior'),
(5, 3, 'Suscripción TV Streaming', 'Pago mensual suscripción a servicio de TV por streaming'),
(6, 1, 'Prima Navidad', 'Pago por prima de navidad recibida en Diciembre'),
(7, 12, 'Gases de Occidente', 'Pagos mensuales facturas del servicio de gas'),
(8, 5, 'Aportes a Familia', 'Aportes económicos realizados a miembros de la familia'),
(9, 7, 'Ahorro Andrés Daniel', 'Aportes a Fondo gastos educativos Andrés Daniel'),
(10, 13, 'TV Streaming', 'Pago servicio de TV por Streaming'),
(11, 11, 'PROEXA', 'Pago mensual aporte salud y pensiones'),
(12, 4, 'Comidas por fuera', 'Compra de comida en restaurantes'),
(13, 4, 'Mecato', 'Compra de mecato'),
(14, 5, 'Celebraciones familiares', 'Celebraciones y reuniones familiares'),
(16, 6, 'Fondo Nacional del Ahorro', 'Créditos adquiridos con el Fondo Nacional del Ahorro'),
(17, 6, 'Tarjeta CMR Falabella', 'Compras realizadas con tarjeta CMR de Falabella'),
(18, 6, 'Tarjeta Tuya', 'Compras realizadas con tarjeta Tuya Éxito'),
(19, 6, 'Créditos personales', 'Créditos adquiridos con terceros diferentes a entidades bancarias'),
(20, 5, 'Regalos familiares', 'Regalos u obsequios a miembros de la familia'),
(21, 7, 'Otros no presupuestados', 'Gastos de educación no contemplados en el presupuesto'),
(22, 15, 'Peluquería', 'Gastos por concepto de Cortes de cabello y relacionados'),
(23, 15, 'Vestuario', 'Gastos por concepto de adquisición de ropa y accesorios'),
(24, 8, 'Renta', 'Pagos por concepto de impuesto a la renta'),
(25, 8, 'Vehículo', 'Pagos por concepto de impuesto vehicular'),
(26, 8, 'Vivienda', 'Pagos por concepto de impuesto inmobiliario'),
(27, 9, 'Alimento blando', 'Compra de alimento blando para las mascotas'),
(28, 9, 'Alimento duro', 'Compra de alimento sólido para las mascotas'),
(29, 9, 'Arena para gatos', 'Compra de arena para gatos'),
(30, 9, 'Imprevistos', 'Gastos relacionados con mascotas no contemplados en presupuesto'),
(31, 10, 'Paseos familiares', 'Paseos y actividades en familia fuera de la casa'),
(32, 10, 'Paseos no familiares', 'Paseos y actividades con amigos o compañeros'),
(33, 11, 'Emermédica', 'Pago mensual servicio de emergencias médicas'),
(34, 11, 'EPS Sura', 'Pago mensual servicio de salud EPS'),
(36, 11, 'PAC', 'Pago mensual Plan de Atención Complementaria'),
(37, 11, 'Otros no presupuestados', 'Gastos de salud no contemplados en presupuesto'),
(38, 12, 'Emcali', 'Pago mensual servicio de energía, acueducto y alcantarillado'),
(39, 13, 'WOM', 'Pago mensual servicio de telefonía móvil - WOM'),
(40, 13, 'TIGO', 'Pago mensual servicio de telefonía, internet o televisión - TIGO'),
(41, 14, 'Combustible', 'Gastos por concepto de combustible vehículo'),
(42, 14, 'Taller', 'Gastos por concepto de mantenimiento, reparación o repuestos vehículo'),
(43, 14, 'Parqueadero', 'Pago por concepto de servicio de parqueadero'),
(44, 14, 'Transporte público', 'Gastos por concepto de uso de transporte público'),
(45, 16, 'Inversiones bancarias', 'Inversiones realizadas a través de entidades bancarias'),
(46, 16, 'Inversiones no bancarias', 'Inversiones realizadas a través de terceros - Entidades no bancarias o particulares'),
(47, 17, 'Reservas', 'Valores reservados para pagos en periodos posteriores al actual'),
(48, 18, 'Muebles', 'Compra de muebles para el hogar'),
(49, 18, 'Electrodomésticos', 'Compra de electrodomésticos para el hogar'),
(50, 18, 'Mantenimiento', 'Gastos en reparaciones, mantenimiento o repuestos en el hogar'),
(51, 18, 'Otros no presupuestados', 'Gastos de hogar no contemplados en presupuesto'),
(52, 19, 'Bancaseguros', 'Debito automático mensual - seguro de vida cuenta de ahorros'),
(53, 19, 'Cuota de manejo', 'Débito automático mensual - manejo cuenta de ahorros'),
(54, 13, 'Microsoft Office 365 - Familia', 'Pago anual suscripción paquete ofimático');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ejecutados`
--
ALTER TABLE `ejecutados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programados`
--
ALTER TABLE `programados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `ejecutados`
--
ALTER TABLE `ejecutados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programados`
--
ALTER TABLE `programados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
