-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 dec 2018 om 13:08
-- Serverversie: 10.1.30-MariaDB
-- PHP-versie: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

Drop Database if exists `hr`;
CREATE Database `hr`;
use `hr`;s
-- Database: `hr`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_number` varchar(45) NOT NULL,
  `commission_pct` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `job_id` varchar(10) NOT NULL,
  `salary` int(11) NOT NULL,
  `manger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `email`, `phone_number`, `commission_pct`, `hire_date`, `department_id`, `job_id`, `salary`, `manger_id`) VALUES
(100, 'Steven', 'King', 'SKING', '515.123.4567', 17, '0000-00-00', 24000, '0', 0, 90),
(101, 'Neena', 'Kochhar', 'NKOCHHAR', '515.123.4568', 21, '0000-00-00', 17000, '0', 100, 90),
(102, 'Lex', 'De Haan', 'LDEHAAN', '515.123.4569', 13, '0000-00-00', 17000, '0', 100, 90),
(103, 'Alexander', 'Hunold', 'AHUNOLD', '590.423.4567', 3, '0000-00-00', 9000, '0', 102, 60),
(104, 'Bruce', 'Ernst', 'BERNST', '590.423.4568', 21, '0000-00-00', 6000, '0', 103, 60),
(105, 'David', 'Austin', 'DAUSTIN', '590.423.4569', 25, '0000-00-00', 4800, '0', 103, 60),
(106, 'Valli', 'Pataballa', 'VPATABAL', '590.423.4560', 5, '0000-00-00', 4800, '0', 103, 60),
(107, 'Diana', 'Lorentz', 'DLORENTZ', '590.423.5567', 7, '0000-00-00', 4200, '0', 103, 60),
(108, 'Nancy', 'Greenberg', 'NGREENBE', '515.124.4569', 17, '0000-00-00', 12000, '0', 101, 100),
(109, 'Daniel', 'Faviet', 'DFAVIET', '515.124.4169', 16, '0000-00-00', 9000, '0', 108, 100),
(110, 'John', 'Chen', 'JCHEN', '515.124.4269', 28, '0000-00-00', 8200, '0', 108, 100),
(111, 'Ismael', 'Sciarra', 'ISCIARRA', '515.124.4369', 30, '0000-00-00', 7700, '0', 108, 100),
(112, 'Jose Manuel', 'Urman', 'JMURMAN', '515.124.4469', 7, '0000-00-00', 7800, '0', 108, 100),
(113, 'Luis', 'Popp', 'LPOPP', '515.124.4567', 7, '0000-00-00', 6900, '0', 108, 100),
(114, 'Den', 'Raphaely', 'DRAPHEAL', '515.127.4561', 7, '0000-00-00', 11000, '0', 100, 30),
(115, 'Alexander', 'Khoo', 'AKHOO', '515.127.4562', 18, '0000-00-00', 3100, '0', 114, 30),
(116, 'Shelli', 'Baida', 'SBAIDA', '515.127.4563', 24, '0000-00-00', 2900, '0', 114, 30),
(117, 'Sigal', 'Tobias', 'STOBIAS', '515.127.4564', 24, '0000-00-00', 2800, '0', 114, 30),
(118, 'Guy', 'Himuro', 'GHIMURO', '515.127.4565', 15, '0000-00-00', 2600, '0', 114, 30),
(119, 'Karen', 'Colmenares', 'KCOLMENA', '515.127.4566', 10, '0000-00-00', 2500, '0', 114, 30),
(120, 'Matthew', 'Weiss', 'MWEISS', '650.123.1234', 18, '0000-00-00', 8000, '0', 100, 50),
(121, 'Adam', 'Fripp', 'AFRIPP', '650.123.2234', 10, '0000-00-00', 8200, '0', 100, 50),
(122, 'Payam', 'Kaufling', 'PKAUFLIN', '650.123.3234', 1, '0000-00-00', 7900, '0', 100, 50),
(123, 'Shanta', 'Vollman', 'SVOLLMAN', '650.123.4234', 10, '0000-00-00', 6500, '0', 100, 50),
(124, 'Kevin', 'Mourgos', 'KMOURGOS', '650.123.5234', 16, '0000-00-00', 5800, '0', 100, 50),
(125, 'Julia', 'Nayer', 'JNAYER', '650.124.1214', 16, '0000-00-00', 3200, '0', 120, 50),
(126, 'Irene', 'Mikkilineni', 'IMIKKILI', '650.124.1224', 28, '0000-00-00', 2700, '0', 120, 50),
(127, 'James', 'Landry', 'JLANDRY', '650.124.1334', 14, '0000-00-00', 2400, '0', 120, 50),
(128, 'Steven', 'Markle', 'SMARKLE', '650.124.1434', 8, '0000-00-00', 2200, '0', 120, 50),
(129, 'Laura', 'Bissot', 'LBISSOT', '650.124.5234', 20, '0000-00-00', 3300, '0', 121, 50),
(130, 'Mozhe', 'Atkinson', 'MATKINSO', '650.124.6234', 30, '0000-00-00', 2800, '0', 121, 50),
(131, 'James', 'Marlow', 'JAMRLOW', '650.124.7234', 16, '0000-00-00', 2500, '0', 121, 50),
(132, 'TJ', 'Olson', 'TJOLSON', '650.124.8234', 10, '0000-00-00', 2100, '0', 121, 50),
(133, 'Jason', 'Mallin', 'JMALLIN', '650.127.1934', 14, '0000-00-00', 3300, '0', 122, 50),
(134, 'Michael', 'Rogers', 'MROGERS', '650.127.1834', 26, '0000-00-00', 2900, '0', 122, 50),
(135, 'Ki', 'Gee', 'KGEE', '650.127.1734', 12, '0000-00-00', 2400, '0', 122, 50),
(136, 'Hazel', 'Philtanker', 'HPHILTAN', '650.127.1634', 6, '0000-00-00', 2200, '0', 122, 50),
(137, 'Renske', 'Ladwig', 'RLADWIG', '650.121.1234', 14, '0000-00-00', 3600, '0', 123, 50),
(138, 'Stephen', 'Stiles', 'SSTILES', '650.121.2034', 26, '0000-00-00', 3200, '0', 123, 50),
(139, 'John', 'Seo', 'JSEO', '650.121.2019', 12, '0000-00-00', 2700, '0', 123, 50),
(140, 'Joshua', 'Patel', 'JPATEL', '650.121.1834', 6, '0000-00-00', 2500, '0', 123, 50),
(141, 'Trenna', 'Rajs', 'TRAJS', '650.121.8009', 17, '0000-00-00', 3500, '0', 124, 50),
(142, 'Curtis', 'Davies', 'CDAVIES', '650.121.2994', 29, '0000-00-00', 3100, '0', 124, 50),
(143, 'Randall', 'Matos', 'RMATOS', '650.121.2874', 15, '0000-00-00', 2600, '0', 124, 50),
(144, 'Peter', 'Vargas', 'PVARGAS', '650.121.2004', 9, '0000-00-00', 2500, '0', 124, 50),
(145, 'John', 'Russell', 'JRUSSEL', '011.44.1344.429268', 1, '0000-00-00', 14000, '0.4', 100, 80),
(146, 'Karen', 'Partners', 'KPARTNER', '011.44.1344.467268', 5, '0000-00-00', 13500, '0.3', 100, 80),
(147, 'Alberto', 'Errazuriz', 'AERRAZUR', '011.44.1344.429278', 10, '0000-00-00', 12000, '0.3', 100, 80),
(148, 'Gerald', 'Cambrault', 'GCAMBRAU', '011.44.1344.619268', 15, '0000-00-00', 11000, '0.3', 100, 80),
(149, 'Eleni', 'Zlotkey', 'EZLOTKEY', '011.44.1344.429018', 29, '0000-00-00', 10500, '0.2', 100, 80),
(150, 'Peter', 'Tucker', 'PTUCKER', '011.44.1344.129268', 30, '0000-00-00', 10000, '0.3', 145, 80),
(151, 'David', 'Bernstein', 'DBERNSTE', '011.44.1344.345268', 24, '0000-00-00', 9500, '0.25', 145, 80),
(152, 'Peter', 'Hall', 'PHALL', '011.44.1344.478968', 20, '0000-00-00', 9000, '0.25', 145, 80),
(153, 'Christopher', 'Olsen', 'COLSEN', '011.44.1344.498718', 30, '0000-00-00', 8000, '0.2', 145, 80),
(154, 'Nanette', 'Cambrault', 'NCAMBRAU', '011.44.1344.987668', 9, '0000-00-00', 7500, '0.2', 145, 80),
(155, 'Oliver', 'Tuvault', 'OTUVAULT', '011.44.1344.486508', 23, '0000-00-00', 7000, '0.15', 145, 80),
(156, 'Janette', 'King', 'JKING', '011.44.1345.429268', 30, '0000-00-00', 10000, '0.35', 146, 80),
(157, 'Patrick', 'Sully', 'PSULLY', '011.44.1345.929268', 4, '0000-00-00', 9500, '0.35', 146, 80),
(158, 'Allan', 'McEwen', 'AMCEWEN', '011.44.1345.829268', 1, '0000-00-00', 9000, '0.35', 146, 80),
(159, 'Lindsey', 'Smith', 'LSMITH', '011.44.1345.729268', 10, '0000-00-00', 8000, '0.3', 146, 80),
(160, 'Louise', 'Doran', 'LDORAN', '011.44.1345.629268', 15, '0000-00-00', 7500, '0.3', 146, 80),
(161, 'Sarath', 'Sewall', 'SSEWALL', '011.44.1345.529268', 3, '0000-00-00', 7000, '0.25', 146, 80),
(162, 'Clara', 'Vishney', 'CVISHNEY', '011.44.1346.129268', 11, '0000-00-00', 10500, '0.25', 147, 80),
(163, 'Danielle', 'Greene', 'DGREENE', '011.44.1346.229268', 19, '0000-00-00', 9500, '0.15', 147, 80),
(164, 'Mattea', 'Marvins', 'MMARVINS', '011.44.1346.329268', 24, '0000-00-00', 7200, '0.1', 147, 80),
(165, 'David', 'Lee', 'DLEE', '011.44.1346.529268', 23, '0000-00-00', 6800, '0.1', 147, 80),
(166, 'Sundar', 'Ande', 'SANDE', '011.44.1346.629268', 24, '0000-00-00', 6400, '0.1', 147, 80),
(167, 'Amit', 'Banda', 'ABANDA', '011.44.1346.729268', 21, '0000-00-00', 6200, '0.1', 147, 80),
(168, 'Lisa', 'Ozer', 'LOZER', '011.44.1343.929268', 11, '0000-00-00', 11500, '0.25', 148, 80),
(169, 'Harrison', 'Bloom', 'HBLOOM', '011.44.1343.829268', 23, '0000-00-00', 10000, '0.2', 148, 80),
(170, 'Tayler', 'Fox', 'TFOX', '011.44.1343.729268', 24, '0000-00-00', 9600, '0.2', 148, 80),
(171, 'William', 'Smith', 'WSMITH', '011.44.1343.629268', 23, '0000-00-00', 7400, '0.15', 148, 80),
(172, 'Elizabeth', 'Bates', 'EBATES', '011.44.1343.529268', 24, '0000-00-00', 7300, '0.15', 148, 80),
(173, 'Sundita', 'Kumar', 'SKUMAR', '011.44.1343.329268', 21, '0000-00-00', 6100, '0.1', 148, 80),
(174, 'Ellen', 'Abel', 'EABEL', '011.44.1644.429267', 11, '0000-00-00', 11000, '0.3', 149, 80),
(175, 'Alyssa', 'Hutton', 'AHUTTON', '011.44.1644.429266', 19, '0000-00-00', 8800, '0.25', 149, 80),
(176, 'Jonathon', 'Taylor', 'JTAYLOR', '011.44.1644.429265', 24, '0000-00-00', 8600, '0.2', 149, 80),
(177, 'Jack', 'Livingston', 'JLIVINGS', '011.44.1644.429264', 23, '0000-00-00', 8400, '0.2', 149, 80),
(178, 'Kimberely', 'Grant', 'KGRANT', '011.44.1644.429263', 24, '0000-00-00', 7000, '0.15', 149, 0),
(179, 'Charles', 'Johnson', 'CJOHNSON', '011.44.1644.429262', 4, '0000-00-00', 6200, '0.1', 149, 80),
(180, 'Winston', 'Taylor', 'WTAYLOR', '650.507.9876', 24, '0000-00-00', 3200, '0', 120, 50),
(181, 'Jean', 'Fleaur', 'JFLEAUR', '650.507.9877', 23, '0000-00-00', 3100, '0', 120, 50),
(182, 'Martha', 'Sullivan', 'MSULLIVA', '650.507.9878', 21, '0000-00-00', 2500, '0', 120, 50),
(183, 'Girard', 'Geoni', 'GGEONI', '650.507.9879', 3, '0000-00-00', 2800, '0', 120, 50),
(184, 'Nandita', 'Sarchand', 'NSARCHAN', '650.509.1876', 27, '0000-00-00', 4200, '0', 121, 50),
(185, 'Alexis', 'Bull', 'ABULL', '650.509.2876', 20, '0000-00-00', 4100, '0', 121, 50),
(186, 'Julia', 'Dellinger', 'JDELLING', '650.509.3876', 24, '0000-00-00', 3400, '0', 121, 50),
(187, 'Anthony', 'Cabrio', 'ACABRIO', '650.509.4876', 7, '0000-00-00', 3000, '0', 121, 50),
(188, 'Kelly', 'Chung', 'KCHUNG', '650.505.1876', 14, '0000-00-00', 3800, '0', 122, 50),
(189, 'Jennifer', 'Dilly', 'JDILLY', '650.505.2876', 13, '0000-00-00', 3600, '0', 122, 50),
(190, 'Timothy', 'Gates', 'TGATES', '650.505.3876', 11, '0000-00-00', 2900, '0', 122, 50),
(191, 'Randall', 'Perkins', 'RPERKINS', '650.505.4876', 19, '0000-00-00', 2500, '0', 122, 50),
(192, 'Sarah', 'Bell', 'SBELL', '650.501.1876', 4, '0000-00-00', 4000, '0', 123, 50),
(193, 'Britney', 'Everett', 'BEVERETT', '650.501.2876', 3, '0000-00-00', 3900, '0', 123, 50),
(194, 'Samuel', 'McCain', 'SMCCAIN', '650.501.3876', 1, '0000-00-00', 3200, '0', 123, 50),
(195, 'Vance', 'Jones', 'VJONES', '650.501.4876', 17, '0000-00-00', 2800, '0', 123, 50),
(196, 'Alana', 'Walsh', 'AWALSH', '650.507.9811', 24, '0000-00-00', 3100, '0', 124, 50),
(197, 'Kevin', 'Feeney', 'KFEENEY', '650.507.9822', 23, '0000-00-00', 3000, '0', 124, 50),
(198, 'Donald', 'OConnell', 'DOCONNEL', '650.507.9833', 21, '0000-00-00', 2600, '0', 124, 50),
(199, 'Douglas', 'Grant', 'DGRANT', '650.507.9844', 13, '0000-00-00', 2600, '0', 124, 50),
(200, 'Jennifer', 'Whalen', 'JWHALEN', '515.123.4444', 17, '0000-00-00', 4400, '0', 101, 10),
(201, 'Michael', 'Hartstein', 'MHARTSTE', '515.123.5555', 17, '0000-00-00', 13000, '0', 100, 20),
(202, 'Pat', 'Fay', 'PFAY', '603.123.6666', 17, '0000-00-00', 6000, '0', 201, 20),
(203, 'Susan', 'Mavris', 'SMAVRIS', '515.123.7777', 7, '0000-00-00', 6500, '0', 101, 40),
(204, 'Hermann', 'Baer', 'HBAER', '515.123.8888', 7, '0000-00-00', 10000, '0', 101, 70),
(205, 'Shelley', 'Higgins', 'SHIGGINS', '515.123.8080', 7, '0000-00-00', 12000, '0', 101, 110),
(206, 'William', 'Gietz', 'WGIETZ', '515.123.8181', 7, '0000-00-00', 8300, '0', 205, 110);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_id_UNIQUE` (`employee_id`),
  ADD KEY `fk_employees_job_history1_idx` (`hire_date`),
  ADD KEY `fk_employees_departments1_idx` (`department_id`),
  ADD KEY `fk_employees_jobs1_idx` (`job_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_departments1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employees_job_history1` FOREIGN KEY (`hire_date`) REFERENCES `job_history` (`start_date`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employees_jobs1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
