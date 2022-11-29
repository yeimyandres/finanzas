-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 20:52:16
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
  `nombre` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipomovimiento` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `nombre`, `tipomovimiento`) VALUES
(1, 'Salario', 'I'),
(2, 'Alimentación', 'E'),
(4, 'Transporte', 'E'),
(5, 'Consignaciones', 'I'),
(6, 'Salud', 'E'),
(7, 'Otros Ingresos', 'I'),
(8, 'Saldos', 'I'),
(9, 'Compartir', 'E'),
(10, 'Créditos', 'E'),
(11, 'Educación', 'E'),
(12, 'Impuestos', 'E'),
(13, 'Mascotas', 'E'),
(14, 'Recreación', 'E'),
(15, 'Servicios Públicos', 'E'),
(16, 'Telecomunicaciones', 'E'),
(17, 'Cuidado Personal', 'E'),
(18, 'Inversión', 'E'),
(19, 'Reservas', 'E'),
(20, 'Muebles', 'E'),
(21, 'Tecnología', 'E'),
(22, 'Vestido', 'E'),
(23, 'Costos Bancarios', 'E'),
(24, 'Gastos no Previstos', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id` int(11) NOT NULL,
  `idcuenta` int(11) NOT NULL,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id`, `idcuenta`, `nombre`, `descripcion`) VALUES
(5, 7, 'Consignaciones de terceros', 'Consignaciones realizadas a cuenta bancaria por terceros'),
(6, 7, 'No presupuestados', 'Ingresos no contemplados en el presupuesto'),
(7, 1, 'Sueldo CGR', 'Salario neto mensual recibido por CGR'),
(8, 8, 'Banco', 'Saldo ejercicio mes anterior en cuenta bancaria'),
(9, 8, 'Efectivo', 'Saldo ejercicio mes anterior en efectivo'),
(10, 2, 'Comidas familiares', 'Paseos y actividades en familia fuera de la casa'),
(11, 2, 'Comidas por fuera', 'Comidas no preparadas en casa'),
(12, 2, 'Mercado', 'Insumos, frutas, verduras, carnes, etc para preparación de comidas en casa'),
(13, 2, 'Mecato', 'Golosinas, dulces y similares'),
(14, 2, 'Otros no presupuestados', 'Adquisición de comida o alimentos no contemplados en presupuesto'),
(15, 9, 'Aportes a familia', 'Dinero aportado a miembros de la familia'),
(16, 9, 'Celebraciones familiares', 'Celebración en familia de cumpleaños o fiestas'),
(17, 9, 'Celebraciones no familiares', 'Eventos de amigos o de oficina'),
(18, 9, 'Regalos no familiares', 'Regalos u obsequios a personas no familiares'),
(19, 23, 'Cuota bancaseguros', 'Valor mensual debitado de cuenta - seguro de vida Bancolombia'),
(20, 23, 'Manejo cuenta de ahorros', 'Valor debitado mensual - manejo cuenta Bancolombia'),
(21, 10, 'Bancolombia', 'Pago de compras realizadas con la tarjeta CMR de Falabella'),
(22, 10, 'Fondo Nacional del Ahorro', 'Créditos adquiridos con el Fondo Nacional del Ahorro'),
(23, 10, 'Tarjeta Tuya', 'Pago de compras realizadas con la tarjeta Tuya de Éxito'),
(24, 10, 'Tarjeta CMR Falabella', 'Compras realizadas con tarjeta CMR de Falabella'),
(25, 10, 'Créditos personales', 'Créditos adquiridos con terceros diferentes a entidades bancarias'),
(26, 17, 'Corte de cabello', 'Pago de cortes de cabello en peluquería'),
(27, 11, 'Colegio Campestre Anglo Hispano', 'Aporte ahorro fondo para educación Andrés Daniel en CCAH'),
(28, 11, 'Otros no presupuestados', 'Gastos de educación no contemplados en el presupuesto'),
(29, 12, 'Renta', 'Pago impuesto anual a la renta - DIAN'),
(30, 12, 'Vehículo', 'Pago impuesto anual - Gobernación Valle del Cauca'),
(31, 12, 'Vivienda', 'Pago impuestos por vivienda - Alcaldía Distrital Santiago de Cali'),
(32, 13, 'Alimento blando', 'Pago por comida para mascotas - alimento blando'),
(33, 13, 'Alimento duro', 'Pago por comida para mascotas - alimento duro o sólido'),
(34, 13, 'Arena', 'Pago por arena para gatos'),
(35, 13, 'Salud', 'Pago por gastos de salud para mascotas'),
(36, 13, 'Otros no presupuestados', 'Pago por gastos de mascotas no contemplados en presupuesto'),
(37, 20, 'Muebles hogar', 'Compra o adquisición de muebles para el hogar'),
(38, 14, 'Actividades familiares', 'Actividades recreativas con la familia'),
(39, 14, 'Actividades no familiares', 'Actividades recreativas con personas no familiares'),
(40, 19, 'Reservas futuras', 'Reserva de dinero para pagos de obligaciones en meses posteriores'),
(41, 6, 'Emermédica', 'Pago mensual servicio de emergencias médicas'),
(42, 6, 'EPS', 'Pago mensual servicio de salud EPS'),
(43, 5, 'PAC', 'Pago mensual Plan de Atención Complementaria'),
(44, 6, 'PROEXA', 'Pagos afiliación a salud'),
(45, 6, 'Otros no presupuestados', 'Gastos de salud no contemplados en presupuesto'),
(46, 15, 'Emcali', 'Pago mensual servicios de agua y luz'),
(47, 15, 'Gases de Occidente', 'Pago mensual servicio de gas domiciliario'),
(48, 21, 'Microsoft Office 365 - Familia', 'Pago anual suscripción paquete ofimático'),
(49, 16, 'TIGO', 'Pago mensual servicios de telefonía móvil, internet y televisión por cable - TIGO'),
(50, 16, 'WOM', 'Pago mensual servicio de telefonía móvil - WOM'),
(51, 4, 'Combustible', 'Pago por gasolina para vehículo'),
(52, 4, 'Taller', 'Pago por mantenimiento, taller y/o repuestos para vehículo'),
(53, 4, 'Parqueadero', 'Gastos por pago de parqueadero de vehículo'),
(54, 4, 'Otros no presupuestados', 'Pagos por concepto de vehículo no contemplados en presupuesto'),
(55, 16, 'TV Streaming', 'Pagos mensuales o anuales por concepto de TV por streaming'),
(56, 24, 'Imprevistos', 'Pagos por gastos no contemplados en otras categorías'),
(57, 18, 'Inversiones bancarias', 'Inversiones realizadas a través de entidades bancarias'),
(58, 18, 'Otras inversiones', 'Inversiones realizadas a través de terceros - Entidades no bancarias o particulares'),
(59, 22, 'Ropa y accesorios', 'Adquisición de ropa y/o accesorios');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
