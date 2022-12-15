-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 17:56:03
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
(20, 'Excedentes', 'I'),
(21, 'Imprevistos', 'E');

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
(8, 2, 1, '2022-12-06', 'Salario mensual', 6145000),
(11, 71, 1, '2022-12-07', 'Devolución Williams', 28400),
(12, 19, 1, '2022-12-07', 'Devolución Gabriela', 9725),
(15, 23, 3, '2022-11-25', 'Pago mensual PAC Sura', 172413),
(16, 16, 3, '2022-11-25', 'Pago factura segundo piso', 14802),
(17, 15, 3, '2022-11-25', 'Pago factura primer piso', 20829),
(18, 24, 3, '2022-11-25', 'Pago mensual celular Angie', 37500),
(19, 72, 1, '2022-11-25', 'Saldo cuenta banco noviembre', 65000),
(20, 73, 2, '2022-12-07', 'Aporte novena - Cristian y Williams', 66200),
(21, 74, 1, '2022-12-07', 'Aporte novena - Gabriela e Isabela', 66200),
(22, 26, 3, '2022-11-25', 'Pago mensual celular Yeimy', 47500),
(23, 36, 3, '2022-11-25', 'Pago internet primer piso', 67240),
(24, 37, 3, '2022-11-25', 'Pago TV segundo piso', 63077),
(25, 14, 1, '2022-11-26', 'Compras quesera El Castillo', 23900),
(26, 58, 2, '2022-11-30', 'Arepa Yami', 3500),
(27, 14, 3, '2022-11-26', 'Carnes megamax', 131800),
(28, 14, 3, '2022-11-26', 'Fruver megamax', 15900),
(29, 76, 3, '2022-11-26', 'pago celular mamá Stella', 52500),
(30, 14, 3, '2022-11-27', 'Compras D1', 123150),
(31, 14, 1, '2022-11-27', 'Pedido domicilio El arepazo', 20000),
(32, 59, 3, '2022-11-27', 'Whiskas D1', 18320),
(33, 61, 3, '2022-11-27', 'Arena gatos D1', 31980),
(34, 56, 3, '2022-11-27', 'Compra gasolina estación Primax', 55017),
(35, 57, 1, '2022-11-27', 'Uber casa - ICCF', 8200),
(36, 57, 1, '2022-11-27', 'Uber ICCF - casa', 7900),
(37, 55, 1, '2022-11-28', 'Pedido domicilio El arepazo', 20500),
(38, 55, 1, '2022-11-28', 'Boletas celebración Navidad ICCF', 20000),
(39, 58, 2, '2022-11-29', 'Arepa y fruta', 5500),
(40, 14, 2, '2022-11-29', 'frutas', 6000),
(41, 17, 2, '2022-11-29', 'Aporte a mamá Stella', 100000),
(42, 55, 1, '2022-11-29', 'Regalo cumpleaños Daniel Amaya', 37500),
(43, 58, 2, '2022-11-30', 'Aguacate Parasoles Rojos', 3000),
(44, 14, 2, '2022-11-30', 'Compras varias', 13000),
(45, 14, 2, '2022-11-30', 'Cubos caldo de costilla', 5000),
(46, 77, 2, '2022-11-30', 'Pago cita domicilio EMI', 18500),
(47, 57, 1, '2022-11-30', 'Uber EPS a CCAH', 18500),
(48, 55, 2, '2022-11-30', 'Didi de CCAH a casa', 15500),
(49, 55, 2, '2022-11-30', 'Aporte actividad navideña CCAH', 10000),
(50, 55, 2, '2022-11-30', 'Aporte misa piso 7 CGR', 6000),
(51, 20, 1, '2022-11-30', 'Mensualidad netflix', 38900),
(52, 58, 2, '2022-12-01', 'Desayuno parasoles rojos', 6500),
(53, 14, 2, '2022-12-01', 'Compras varias', 3000),
(54, 18, 1, '2022-12-01', 'Transferencia mensual a Andrés Daniel CCAH', 800000),
(55, 60, 3, '2022-12-01', 'Don Kat Olímpica', 22300),
(56, 28, 3, '2022-12-01', 'Pago mensualidad salud mamá Stella', 125000),
(57, 22, 1, '2022-12-01', 'Pago mensualidad proexa', 298000),
(58, 27, 1, '2022-12-01', 'Pago cuota mensual', 580000),
(59, 35, 2, '2022-12-01', 'Parqueadero almacén Éxito', 9000),
(60, 55, 1, '2022-12-01', 'Uber de casa a ICCF', 10600),
(61, 55, 2, '2022-12-01', 'Compras varias', 5000),
(62, 55, 3, '2022-12-01', 'Compartir CCAH', 28850),
(63, 21, 1, '2022-12-01', 'Mensualidad Prime Video', 17900),
(64, 54, 2, '2022-12-02', 'Compras varias', 10000),
(65, 58, 2, '2022-12-02', 'Arepa Yami', 2500),
(66, 14, 1, '2022-12-02', 'Compras varias', 20500),
(67, 14, 2, '2022-12-02', 'Fríjoles parasoles rojos', 4000),
(68, 14, 2, '2022-12-02', 'Compras quesera calle 14', 6000),
(69, 14, 2, '2022-12-02', 'Compras varias', 23000),
(70, 60, 1, '2022-12-02', 'Don kat Quesera', 12000),
(71, 57, 2, '2022-12-02', 'Transportes varios', 32000),
(72, 54, 3, '2022-12-03', 'Almuerzo Montolivo Jardín Plaza', 78000),
(73, 14, 2, '2022-12-03', 'Compras varias', 17000),
(74, 55, 2, '2022-12-03', 'Reparación llanta Vehículo', 20000),
(75, 55, 2, '2022-12-03', 'Piscina de pelotas - jardín plaza', 20000),
(76, 51, 3, '2022-12-04', 'Compras Herpo - devolución parcial prestamo', 20800),
(77, 52, 3, '2022-12-04', 'Compra ropa Yeimy - almacén Herpo', 134600),
(78, 58, 2, '2022-12-05', 'Arepa Yami y empanada', 5000),
(79, 14, 2, '2022-12-05', 'Compras varias', 30000),
(80, 29, 3, '2022-12-05', 'pago celular mamá Tenny', 33000),
(81, 55, 2, '2022-12-05', 'Transportes varios 5 dic', 20000),
(82, 63, 1, '2022-12-06', 'Pizza papa johns domicilio', 16700),
(83, 14, 3, '2022-12-06', 'Ensalada pa tardear', 13000),
(84, 14, 3, '2022-12-06', 'Compras D1', 53940),
(85, 58, 2, '2022-12-07', 'Arepa Yami', 5000),
(86, 58, 3, '2022-12-07', 'Ensalada pa tardear', 13000),
(87, 14, 2, '2022-12-07', 'Compras varias', 54000),
(88, 55, 3, '2022-12-07', 'Compra tu360 Bancolombia', 100194),
(89, 55, 2, '2022-12-07', 'Moneda conmemorativa la china - 10.000', 20000),
(90, 55, 2, '2022-12-07', 'Buñuelos y velitas', 46000),
(91, 14, 2, '2022-12-08', 'Compras varias', 26200),
(93, 14, 2, '2022-12-09', 'Compras varias', 15000),
(94, 14, 3, '2022-12-09', 'Carnes megamax', 79000),
(95, 14, 2, '2022-12-09', 'Fruver megamax', 15000),
(96, 77, 2, '2022-12-09', 'Medicamentos varios', 31000),
(97, 57, 2, '2022-12-09', 'Taxi casa - clínica Colombia', 6000),
(98, 54, 2, '2022-12-11', 'Arepas en El Arepazo', 31000),
(99, 14, 2, '2022-12-11', 'Compras varias', 20000),
(100, 77, 3, '2022-12-11', 'Atención domiciliaria EMI - Yeimy', 14000),
(101, 14, 3, '2022-12-12', 'Compras D1', 116370),
(102, 30, 1, '2022-12-12', 'Pago mensual Plan Premium Sanitas - Angie', 37400),
(103, 58, 2, '2022-12-13', 'Arepa Yami', 2500),
(104, 70, 2, '2022-12-13', 'Aportes recolectados novena grupo 2', 200000),
(105, 31, 1, '2022-12-13', 'Pago mensual', 123341),
(106, 5, 1, '2022-12-13', 'Prima navidad 2022', 7954000),
(107, 34, 1, '2022-12-13', 'Pago mensual', 850000),
(108, 50, 1, '2022-12-13', 'Abono extraordinario a deuda', 520000),
(109, 41, 1, '2022-12-13', 'Aporte a Angie', 800000),
(110, 43, 1, '2022-12-13', 'Aporte a mamá Stella', 600000),
(111, 44, 1, '2022-12-13', 'Aporte a mamá Tenny', 600000),
(112, 45, 1, '2022-12-13', 'Aporte extraordinario', 700000),
(113, 49, 1, '2022-12-13', 'Primer pago deuda', 1000000),
(114, 49, 1, '2022-12-14', 'Segundo pago deuda', 250000),
(115, 56, 3, '2022-12-14', 'Gasolina corriente Primax', 90029),
(116, 57, 2, '2022-12-14', 'Transportes varios', 30000),
(117, 14, 2, '2022-12-14', 'Compras varias', 66000);

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
(2, 'Efectivo Yeimy', 'E'),
(3, 'Tarjeta Crédito MC Gold Bancolombia', 'T');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `transaccion` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `detalle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `transaccion`, `fecha`, `detalle`, `valor`) VALUES
(1, 'R', '2022-11-29', 'Retiro cajero Bancolombia - Astrocentro', 400000),
(2, 'R', '2022-12-07', 'Retiro cajero Bancolombia - Astrocentro', 500000),
(3, 'R', '2022-12-13', 'Retiro cajero Bancolombia - Astrocentro', 300000),
(4, 'R', '2022-12-14', 'Retiro cajero Bancolombia - Astrocentro', 1000000);

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
(5, 6, '2022-12-24', 'Prima de navidad 2022', 7900000, 'T'),
(14, 1, '2022-12-26', 'Compras de mercado para casa', 1300000, 'E'),
(15, 7, '2022-11-26', 'Factura Primer Piso', 20829, 'T'),
(16, 7, '2022-11-26', 'Factura Segundo Piso', 14802, 'T'),
(17, 8, '2022-11-27', 'Aporte a mamá Stella', 100000, 'T'),
(18, 9, '2022-11-30', 'Aporte ahorro CCAH', 800000, 'T'),
(19, 5, '2022-12-01', 'Devolución Gabriela Neflix', 9725, 'T'),
(20, 10, '2022-12-01', 'Suscripción Mensual Netflix', 38900, 'T'),
(21, 10, '2022-12-01', 'Suscripción Prime Video', 17900, 'T'),
(22, 11, '2022-12-01', 'Pago mensual', 298000, 'T'),
(23, 36, '2022-12-01', 'Mensualidad PAC Sura', 172413, 'T'),
(24, 40, '2022-12-01', 'Factura Celular Angie', 37500, 'T'),
(26, 40, '2022-12-01', 'Factura celular Yeimy', 47500, 'T'),
(27, 18, '2022-12-02', 'Pago mensual', 580000, 'T'),
(28, 34, '2022-12-03', 'Aporte mensual salud mamá Stella', 125000, 'T'),
(29, 39, '2022-12-07', 'Factura celular mamá Tenny', 33000, 'T'),
(30, 36, '2022-12-10', 'Mensualidad Plan Premium Sanitas', 37400, 'T'),
(31, 33, '2022-12-12', 'Pago mensual', 108193, 'T'),
(32, 52, '2022-12-13', 'Débito automático mensual', 29577, 'P'),
(33, 53, '2022-12-14', 'Débito automático mensual', 12990, 'P'),
(34, 16, '2022-12-15', 'Pago mensual Crédito Hipotecario', 850000, 'T'),
(35, 43, '2022-12-18', 'Pago mensualidad y ocasionales', 170000, 'E'),
(36, 40, '2022-12-19', 'Factura internet primer piso', 67240, 'T'),
(37, 40, '2022-12-19', 'factura TV segundo piso', 63077, 'T'),
(38, 22, '2022-12-21', 'Corte cabello Andrés Daniel', 30000, 'P'),
(39, 38, '2022-12-22', 'Factura primer piso', 230000, 'P'),
(40, 38, '2022-12-22', 'Factura Segundo Piso', 160000, 'P'),
(41, 8, '2022-12-24', 'Aporte a Angie', 800000, 'T'),
(42, 8, '2022-12-24', 'Aporte a Andrés Daniel', 570000, 'P'),
(43, 8, '2022-12-24', 'Aporte mamá Stella', 600000, 'T'),
(44, 8, '2022-12-24', 'Aporte mamá Tenny', 600000, 'T'),
(45, 9, '2022-12-24', 'Aporte extraordinario', 700000, 'T'),
(46, 14, '2022-12-24', 'Regalo Navidad Andrés Daniel', 120000, 'P'),
(47, 20, '2022-12-24', 'Regalo Navidad Andrés Daniel', 120000, 'P'),
(48, 14, '2022-12-24', 'Cena navideña', 150000, 'P'),
(49, 19, '2022-12-24', 'Pago préstamo Renta - Alejandro Melo', 1250000, 'T'),
(50, 18, '2022-12-24', 'Abono extraordinario', 520000, 'T'),
(51, 19, '2022-12-24', 'Pago préstamo reparación lavadora - Andrés Daniel', 500000, 'E'),
(52, 23, '2022-12-24', 'Compra ropa Yeimy', 160000, 'E'),
(54, 56, '2022-12-26', 'Salidas a comer diciembre', 250000, 'E'),
(55, 57, '2022-12-26', 'Gastos de emergencia, o no presupuestados', 500000, 'E'),
(56, 41, '2022-12-26', 'Gastos Gasolina vehículo familiar', 170000, 'E'),
(57, 44, '2022-12-26', 'Gastos de transporte: MIO, Taxis o similares', 90000, 'T'),
(58, 12, '2022-12-26', 'Compra de comida fuera de casa', 80000, 'E'),
(59, 27, '2022-12-26', 'Compra de alimento whiskas para gatos', 18320, 'T'),
(60, 28, '2022-12-26', 'Compra de CatChow o Donkat para gatos', 34300, 'T'),
(61, 29, '2022-12-26', 'Compra de arena para gatos', 31980, 'T'),
(63, 58, '2022-12-26', 'Gastos por concepto de Otras salidas', 80000, 'E'),
(64, 31, '2022-12-26', 'Salida con toda la familia de la casa', 500000, 'P'),
(65, 14, '2022-12-31', 'Cena de fin de año', 150000, 'P'),
(66, 14, '2023-01-02', 'Cumpleaños Andrés Daniel', 200000, 'P'),
(67, 20, '2023-01-02', 'Regalo cumpleaños Andrés Daniel', 120000, 'P'),
(68, 14, '2023-01-09', 'Cumpleaños mamá Tenny', 160000, 'P'),
(69, 14, '2023-01-26', 'Cumpleaños mamá Stella', 160000, 'P'),
(70, 57, '2022-12-12', 'Aporte recolectado novena CGR - grupo 2', 199200, 'T'),
(71, 5, '2022-12-01', 'Devolución Williams Netflix y Prime Video', 28400, 'T'),
(72, 3, '2022-11-25', 'Saldo en banco noviembre 2022', 65000, 'T'),
(73, 55, '2022-12-07', 'Aporte novena grupo 2 Cristian y Wiliams', 66200, 'T'),
(74, 55, '2022-12-07', 'Aporte novena grupo 2 Gabriela e Isabela', 66200, 'T'),
(75, 55, '2022-12-07', 'Aporte novena grupo 2 Alvaro', 33200, 'P'),
(76, 40, '2022-12-01', 'Factura celular mamá Stella', 52500, 'T'),
(77, 37, '2022-12-26', 'Gastos en salud no presupuestados', 65000, 'E');

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
(54, 13, 'Microsoft Office 365 - Familia', 'Pago anual suscripción paquete ofimático'),
(55, 3, 'Ingresos no previstos', 'Otros ingresos sin categoría específica o eventuales'),
(56, 10, 'Comidas Angie, Andrés y Yeimy', 'Salidas a comer hogar Arteaga Guerra'),
(57, 21, 'Imprevistos', 'Gastos no categorizados o eventuales'),
(58, 10, 'Salidas no presupuestadas', 'Gastos en salidas no previstas o eventuales');

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
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ejecutados`
--
ALTER TABLE `ejecutados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `fuentes`
--
ALTER TABLE `fuentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `programados`
--
ALTER TABLE `programados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
