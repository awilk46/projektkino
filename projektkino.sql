-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Sty 2018, 05:17
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projektkino`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `id` int(11) DEFAULT NULL,
  `nazwa` text COLLATE utf16_polish_ci NOT NULL,
  `opis` text COLLATE utf16_polish_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `kategoria` text COLLATE utf16_polish_ci NOT NULL,
  `plakat` text COLLATE utf16_polish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`id`, `nazwa`, `opis`, `cena`, `kategoria`, `plakat`) VALUES
(1, 'Atak paniki', 'Radiowiec, kelner, panna młoda, pisarka, mąż i żona oraz behawiorysta zwierząt dostają ataku paniki.', 17, 'baśń', 'http://1.fwcdn.pl/po/28/05/772805/7807260.6.jpg'),
(2, 'Cudowny chłopak', 'Auggie od urodzenia ma zdeformowaną twarz. W nowej szkole chłopiec chce udowodnić rówieśnikom, że piękno to więcej niż wygląd.', 17, 'akcja', 'http://1.fwcdn.pl/po/63/87/776387/7822508.6.jpg'),
(4, 'DJ', 'Maja to piękna oraz ambitna dziewczyna, utalentowana muzycznie. Przyjmuje pseudonim DJ Mini i wchodzi w świat muzyki klubowej. ', 17, 'horror', 'http://1.fwcdn.pl/po/57/60/795760/7819757.6.jpg'),
(5, 'Syn Królowej Śniegu', 'Sześcioletni Marcin, spragniony miłości i ciepła, ucieka w świat baśni H. C. Andersena.', 19, 'baśń', 'http://1.fwcdn.pl/po/79/33/767933/7816448.6.jpg'),
(6, 'Wszystkie pieniądze świata', 'Szesnastoletni wnuk najbogatszego człowieka świata zostaje uprowadzony. Jego oddana matka stara się przekonać nieustępliwego miliardera do zapłacenia okupu porywaczom.', 17, 'akcja', 'http://1.fwcdn.pl/po/20/92/782092/7822490.6.jpg'),
(7, 'Czas mroku', 'Winston Churchill zostaje premierem Wielkiej Brytanii. Jego pierwszym zadaniem jest zjednoczenie narodu w obliczu groźby inwazji nazistowskich Niemiec.', 17, 'komedia ', 'http://1.fwcdn.pl/po/20/92/782092/7822490.6.jpg'),
(8, 'Więzień labiryntu: Lek na śmierć', 'Thomas wyrusza na misję w celu znalezienia lekarstwa zwalczającego śmiertelną chorobę.', 14, 'horror', 'http://1.fwcdn.pl/po/04/44/740444/7819035.6.jpg'),
(9, 'Tedi i mapa skarbów', 'Tedi Jones wyjeżdża do Los Angeles, gdzie poznaje archeolożkę Sarę Lavroff. Niedługo potem zostaje porwana, a Tedi wyrusza jej na ratunek.', 17, 'baśń', 'http://1.fwcdn.pl/po/90/74/739074/7819193.6.jpg'),
(10, 'Dusza i ciało', 'Mária jest nowo przyjętą pracownicą działu kontroli mięsa w rzeźni, a Endre jej dyrektorem. Przypadkowo dowiadują się, że śnią identyczny sen, w którym są jeleniami. ', 19, 'akcja', 'http://1.fwcdn.pl/po/92/55/779255/7813488.6.jpg'),
(11, 'Atak paniki', 'Radiowiec, kelner, panna młoda, pisarka, mąż i żona oraz behawiorysta zwierząt dostają ataku paniki.', 17, 'baśń', 'http://1.fwcdn.pl/po/28/05/772805/7807260.6.jpg'),
(12, 'Cudowny chłopak', 'Auggie od urodzenia ma zdeformowaną twarz. W nowej szkole chłopiec chce udowodnić rówieśnikom, że piękno to więcej niż wygląd.', 17, 'akcja', 'http://1.fwcdn.pl/po/63/87/776387/7822508.6.jpg'),
(14, 'DJ', 'Maja to piękna oraz ambitna dziewczyna, utalentowana muzycznie. Przyjmuje pseudonim DJ Mini i wchodzi w świat muzyki klubowej. ', 17, 'horror', 'http://1.fwcdn.pl/po/57/60/795760/7819757.6.jpg'),
(15, 'Syn Królowej Śniegu', 'Sześcioletni Marcin, spragniony miłości i ciepła, ucieka w świat baśni H. C. Andersena.', 19, 'baśń', 'http://1.fwcdn.pl/po/79/33/767933/7816448.6.jpg'),
(16, 'Wszystkie pieniądze świata', 'Szesnastoletni wnuk najbogatszego człowieka świata zostaje uprowadzony. Jego oddana matka stara się przekonać nieustępliwego miliardera do zapłacenia okupu porywaczom.', 17, 'akcja', 'http://1.fwcdn.pl/po/20/92/782092/7822490.6.jpg'),
(17, 'Czas mroku', 'Winston Churchill zostaje premierem Wielkiej Brytanii. Jego pierwszym zadaniem jest zjednoczenie narodu w obliczu groźby inwazji nazistowskich Niemiec.', 17, 'komedia ', 'http://1.fwcdn.pl/po/20/92/782092/7822490.6.jpg'),
(18, 'Więzień labiryntu: Lek na śmierć', 'Thomas wyrusza na misję w celu znalezienia lekarstwa zwalczającego śmiertelną chorobę.', 14, 'horror', 'http://1.fwcdn.pl/po/04/44/740444/7819035.6.jpg'),
(19, 'Tedi i mapa skarbów', 'Tedi Jones wyjeżdża do Los Angeles, gdzie poznaje archeolożkę Sarę Lavroff. Niedługo potem zostaje porwana, a Tedi wyrusza jej na ratunek.', 17, 'baśń', 'http://1.fwcdn.pl/po/90/74/739074/7819193.6.jpg'),
(20, 'Dusza i ciało', 'Mária jest nowo przyjętą pracownicą działu kontroli mięsa w rzeźni, a Endre jej dyrektorem. Przypadkowo dowiadują się, że śnią identyczny sen, w którym są jeleniami. ', 19, 'akcja', 'http://1.fwcdn.pl/po/92/55/779255/7813488.6.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id_uzytkownik` int(15) NOT NULL,
  `id_film` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_uzytkownik`, `id_film`) VALUES
(2, 2),
(2, 11),
(2, 19);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `haslo` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `imieINazwisko` text COLLATE utf8_polish_ci NOT NULL,
  `rola` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `email`, `imieINazwisko`, `rola`) VALUES
(1, 'admin', '$2y$10$MBHG7EEDiKFVMdrhY4gkLuBiXn7qLgVpGgjF4osY9sP9VeYWAl5SC', 'admin@admin.com', 'admin', 'admin'),
(2, 'user', '$2y$10$MBHG7EEDiKFVMdrhY4gkLuBiXn7qLgVpGgjF4osY9sP9VeYWAl5SC', 'user@user.pl', 'user', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `filmy`
--
ALTER TABLE `filmy`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
