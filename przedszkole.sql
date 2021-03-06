-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 13 Sty 2014, 23:07
-- Wersja serwera: 5.6.12-log
-- Wersja PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `przedszkole`
--
CREATE DATABASE IF NOT EXISTS `przedszkole` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `przedszkole`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imie` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `admins`
--

INSERT INTO `admins` (`id`, `imie`, `nazwisko`, `login`, `pass`) VALUES
(2, 'Robert', 'SzymaÅ„ski', 'dorian', 'prEHPU6MF9b4A');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `gals`
--

DROP TABLE IF EXISTS `gals`;
CREATE TABLE IF NOT EXISTS `gals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `gal` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `pos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=31 ;

--
-- Zrzut danych tabeli `gals`
--

INSERT INTO `gals` (`id`, `img`, `gal`, `pos`) VALUES
(19, '1386711812.jpg', 'g2', 3),
(20, '1386711821.jpg', 'g2', 1),
(21, '1386711833.jpg', 'g2', 2),
(22, '1386711841.jpg', 'g2', 3),
(23, '1386711870.jpg', 'g3', 1),
(24, '1386711877.jpg', 'g3', 2),
(25, '1386711885.jpg', 'g3', 3),
(26, '1386712036.jpg', 'g1', 1),
(27, '1386712045.jpg', 'g1', 2),
(28, '1386712051.jpg', 'g1', 4),
(29, '1386712057.jpg', 'g1', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `date`, `title`, `content`) VALUES
(2, '2013-11-21 17:29:32', 'Spotkania Å›wiÄ…teczne', 'Zapraszamy PaÅ„stwa dnia 17 grudnia na spotkania Å›wiÄ…teczne: gr. I â€“ 15.00, gr.II â€“ 15.40; gr. III â€“ 16.10'),
(3, '2013-11-19 14:14:59', 'Kiermasz Å›wiÄ…teczny', 'W zwiÄ…zku ze zbliÅ¼ajÄ…cymi siÄ™ Å›wiÄ™tami BoÅ¼ego Narodzenia i spotkaniami dzieci z rodzicami, ktÃ³re sÄ… zaplanowane na 17 grudnia ( trzy grupy z Meissnera) oraz\r\n19 grudnia (dwie grupy z WitoszyÅ„skiego), prosimy o wÅ‚Ä…czenie siÄ™ do akcji przedszkola â€žKiermasz Å›wiÄ…tecznyâ€ (tak jak w ubiegÅ‚ym roku).\r\nZa zebrane pieniÄ…dze opÅ‚acimy autokar podczas wycieczki do teatru.'),
(4, '2013-11-18 15:33:19', 'Teatrzyk', 'Jutro, tzn. 19.11.2013 r. o godz. 10.30 odbÄ™dzie siÄ™ teatrzyk dla dzieci,'),
(5, '2013-11-18 15:32:42', 'Akcja charytatywna', 'Drodzy Rodzice\r\n \r\n\r\nNasze przedszkole bierze udziaÅ‚ w akcji charytatywnej "Dzieci dzieciom" pod patronatem Przedszkola 108 i  Komendy GÅ‚Ã³wnej StraÅ¼y Granicznej (pomoc rodzinom wielodzietnym i paczka Å›wiÄ…teczna).\r\nW zwiÄ…zku z tym mamy ogromnÄ… proÅ›bÄ™ do PaÅ„stwa o zbiÃ³rkÄ™ darÃ³w Åšw. MikoÅ‚aja : Å¼ywnoÅ›Ä‡ paczkowanÄ…, suchy prowiant, porzÄ…dne, wyprane i niezniszczone zabawki, pomoce szkolne, witaminy dla dzieci. Dary rozdzielajÄ… OÅ›rodki Pomocy SpoÅ‚ecznej.\r\nTermin dostarczania darÃ³w do dnia 15.12.2013r\r\nZ gÃ³ry dziÄ™kujemy za okazanÄ… pomoc\r\n                                                                            Grono pedagogiczne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sites`
--

DROP TABLE IF EXISTS `sites`;
CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `style` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `pos` int(11) DEFAULT NULL,
  `parrent` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `link` (`link`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=25 ;

--
-- Zrzut danych tabeli `sites`
--

INSERT INTO `sites` (`id`, `name`, `link`, `type`, `active`, `style`, `content`, `pos`, `parrent`) VALUES
(2, 'Strona gÅ‚Ã³wna', 'main', 'main', 1, 'bg1', '<h2>NowoÅ›ci i inne rzeczy!</h2>\r\n\r\n<p>Strona moÅ¼e posiadaÄ‡ sw&oacute;j nagÅ‚&oacute;wek z kr&oacute;tkim opisem przedszkola i informacji zawartych na stronie. PoniÅ¼ej bÄ™dÄ… siÄ™ znajdowaÅ‚o 5 skr&oacute;t&oacute;w najÅ›wieÅ¼szych informacji pozostawionych w zakÅ‚adce &quot;WaÅ¼ne informacje&quot;.</p>\r\n', 1, '/'),
(3, 'O nas', 'o_nas', 'text', 1, 'bg2', '<h3>W dzieciÅ„stwie niewiele zaleÅ¼y od nas, wiele zaÅ› od tych, kt&oacute;rzy sÄ… z nami.</h3>\r\n\r\n<p>Wszystkich rodzic&oacute;w, kt&oacute;rzy pragnÄ…, aby ich dziecko majÄ…c zapewnione poczucie bezpieczeÅ„stwa wkraczaÅ‚o w samodzielnoÅ›Ä‡, miÅ‚o i tw&oacute;rczo spÄ™dzaÅ‚o czas - zapraszamy do naszego przedszkola Niezmiennie istniejemy od 1982 roku. Dzieci przebywajÄ…ce w naszej plac&oacute;wce sÄ… podzielone na 5 grup.</p>\r\n\r\n<p>2 grupy w oddziaÅ‚ach zamiejscowych przy ul. WitoszyÅ„skiego1.</p>\r\n\r\n<p>Budynek przy ul. Meissnera 8b jest parterowy, ma duÅ¼e, kolorowe, bogato wyposaÅ¼one sale, nowo wyremontowane Å‚azienki dla dzieci, a takÅ¼e piÄ™kny, peÅ‚en zieleni ogr&oacute;d.</p>\r\n\r\n<p>Grupy przy ul. WitoszyÅ„skiego1 mieszczÄ… siÄ™ w bloku mieszkalnym. Panuje tam prawdziwa rodzinna, ciepÅ‚a atmosfera.</p>\r\n\r\n<p><br />\r\n<strong>Zapewniamy:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>SerdecznÄ…, troskliwÄ… opiekÄ™ w godzinach 7.00-17.30,</li>\r\n	<li>Indywidualne podejÅ›cie do kaÅ¼dego dziecka,</li>\r\n	<li>OpiekÄ™ specjalist&oacute;w: logopedy, psychologa,</li>\r\n	<li>Dobre przygotowanie do podjÄ™cia nauki w szkole,</li>\r\n	<li>Uczestnictwo dzieci w ciekawych formach edukacyjnych.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Przedszkole nasze otrzymaÅ‚o certyfikat CHRONIMY DZIECI na lata 2011/2012 oraz 2012/2013 Szczeg&oacute;Å‚owe informacje na stronie: <a href="http://www.fdn.pl">www.fdn.pl</a></p>\r\n\r\n<p>&nbsp;</p>\r\n', 2, '/'),
(4, 'Program', 'program', 'text', 1, 'bg4', '<h3><em>Programy dopuszczone do uÅ¼ytku szkolnego w roku szkolnym 2013/2014;</em></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border="1" cellspacing="0" style="width:600px">\r\n	<tbody>\r\n		<tr>\r\n			<th>TytuÅ‚ programu</th>\r\n			<th>Autor</th>\r\n		</tr>\r\n		<tr>\r\n			<td>&bdquo; Zanim bÄ™dÄ™ uczniem&rdquo;</td>\r\n			<td>ElÅ¼bieta Tokarska i Jolanta KapaÅ‚a</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&bdquo; Klucz do uczenia siÄ™&rdquo;<br />\r\n			oparty na ideach Lwa Wygotskiego.</td>\r\n			<td>Galina Dolya</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&bdquo; Nauka czytania i pisania&rdquo;</td>\r\n			<td>BronisÅ‚aw RocÅ‚awski</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&bdquo;DzieciÄ™ca matematyka. Program dla przedszkoli, klas zerowych i plac&oacute;wek integracyjnych.&rdquo;</td>\r\n			<td>Edyta Gruszczyk-KolczyÅ„ska, Ewa ZieliÅ„ska<br />\r\n			Wydawnictwo Szkolne i Pedagogiczne S.A</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 3, '/'),
(5, 'Kadra', 'kadra', 'text', 1, 'bg3', '			<center>\r\n				<table cellpadding="5px">\r\n					<tr><td style="text-align:right; font-weight:bold;">Dyrektor:</td><td>BoÅ¼ena OrliÅ„ska</td></tr>\r\n					<tr><td colspan="2">&nbsp;</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;"><strong>MEISSNERA 8b</strong></td></tr>\r\n					<tr><td colspan="2" style="text-align:center;">Gr. I - 3-latki</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Nauczycielki:</td><td>Irmina RawiÅ„ska<br>BoÅ¼ena OrliÅ„ska</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Pomoc nauczyciela:</td><td>Ewa CzerwiÅ„ska</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;">Gr. II - 4-latki</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Nauczycielki:</td><td>Hanna KÅ‚os â€“ Trojan<br>Wioleta TaÅ‚aÅ‚aj</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;">Gr. III - 4- latki</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Nauczycielki:</td><td>Katarzyna Kruk<br>Beata Zuzga</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;">&nbsp;</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;"><strong>ODDZIAÅY ZAMIEJSCOWE â€“ WITOSZYÅƒSKIEGO 1</strong></td></tr>\r\n					<tr><td colspan="2" style="text-align:center;">Gr. IV - 4, 5- latki</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Nauczycielki:</td><td>Gabriela KamiÅ„ska<br>Marzena Matasek</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;">Gr. V - 5- latki</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Nauczycielki:</td><td>Katarzyna Raczkowska<br>Marzenna Hutkowska</td></tr>\r\n					<tr><td colspan="2">&nbsp;</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Logopeda:</td><td>Urszula Folczak</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Psycholog:</td><td>Lidia Zienkiewicz</td></tr>\r\n					<tr><td colspan="2">&nbsp;</td></tr>\r\n					<tr><td colspan="2" style="text-align:center;"><strong>POZOSTALI PRACOWNICY PRZEDSZKOLA</strong></td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Kierownik gospodarczy:</td><td>Wanda DÄ™biÅ„ska</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Sekretarka:</td><td>Marlena Kotkowska</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">WoÅºne oddziaÅ‚owe:</td><td>Anna MarczyÅ„ska<br>Anna Matuszewicz<br>Sylwia JaÅ›kiewicz<br>Krystyna Kowalska<br>BogumiÅ‚a Niewiatowska</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Szatniarki:</td><td>BoÅ¼ena PeÅ‚ka<br>Elwira Kobierska</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Konserwator:</td><td>Tadeusz DziugieÅ‚</td></tr>\r\n					<tr><td style="text-align:right; font-weight:bold;">Kucharki:</td><td>Teresa BÄ…k<br>Ewa Michalska<br>Zofia TrzciÅ„ska<br>Katarzyna Madejska</td></tr>\r\n				</table>\r\n			</center>', 4, '/'),
(6, 'Grupy', 'grupy', 'text', 1, 'bg5', '<p>JakiÅ› opis grup, oby dÅ‚ugi i obszerny, moÅ¼na zrobiÄ‡ podziaÅ‚ na grupy z podmenu tak, jak w przypadku programu.</p>\r\n\r\n<h2>Grupa I</h2>\r\n\r\n<p>##gal(g1)</p>\r\n\r\n<h2>Grupa II</h2>\r\n\r\n<p>##gal(g2)</p>\r\n\r\n<h2>Grupa III</h2>\r\n\r\n<p>##gal(g3)</p>\r\n', 5, '/'),
(7, 'ZajÄ™cia dodatkowe', 'zajecia_dodatkowe', 'text', 1, 'bg6', '<p>W roku szkolnym 2013/2014 WÅ‚adze stolicy podjÄ™Å‚y decyzjÄ™ o sfinansowaniu z budÅ¼etu miasta dodatkowych zajÄ™Ä‡. KaÅ¼de dziecko w przedszkolu bÄ™dzie mogÅ‚o skorzystaÄ‡ z dwÃ³ch zajÄ™Ä‡ dodatkowych tygodniowo w ramach opÅ‚aty 1 zÅ‚. za godzinÄ™. DobÃ³r zajÄ™Ä‡ moÅ¼e odbywaÄ‡ siÄ™ w konsultacji z rodzicami, ktÃ³rych reprezentuje rada rodzicÃ³w, ale decyzja naleÅ¼y do dyrektora przedszkola.</p>', 6, '/'),
(8, 'Nasze sukcesy', 'sukcesy', 'text', 1, 'bg7', '<h3>Nasze sukcesy w roku szkolnym 2012/2013</h3>\r\n				<strong>UdziaÅ‚ dzieci w konkursach: </strong>\r\n				<ol>\r\n					<li>Plastycznych (na terenie dzielnicy, miasta oraz ogÃ³lnopolskich): \r\n					<ul>\r\n							<li>â€žMiÅ› bawi, uczy i wychowujeâ€ - wyrÃ³Å¼nienie</li>\r\n							<li>â€žMÃ³j ukochany MiÅ›â€ â€“ wyrÃ³Å¼nienie</li>\r\n							<li>â€žWielki Konkurs Ekologicznyâ€ â€“ portal Buliba</li>\r\n							<li>â€žBarwy WisÅ‚yâ€ </li>\r\n							<li>Ptaki w mieÅ›cieâ€ </li>\r\n							<li>â€ž Przyjaciele Kubusia Puchatka - udziaÅ‚ w plenerze malarskim; </li>\r\n							<li>â€ž Kartki dla hospicjumâ€ - â€žPola Nadzieiâ€ â€“ wyrÃ³Å¼nienie; </li>\r\n							<li>â€žMaÅ‚e czerwone jabÅ‚uszkoâ€ </li>\r\n							<li>â€žKocham, lubiÄ™, szanujÄ™ i nie Å›miecÄ™â€ </li>\r\n							<li>â€žKartka wielkanocnaâ€ </li>\r\n							<li>â€žPrzedszkolak sprawny i zdrowy do zabawy zawsze gotowyâ€ â€“ zajÄ™cie II miejsca</li>\r\n						</ul>\r\n					</li>\r\n					<li>Tanecznych: \r\n						<ul>\r\n							<li>Taniec romski</li>\r\n							<li>UdziaÅ‚ w Festiwalu â€“ RozwiÅ„ Talent 2013 r. â€“ zajÄ™cie II miejsca</li>\r\n						</ul>\r\n					</li>\r\n					<li>Sportowych: \r\n						<ul>\r\n							<li>UdziaÅ‚ w Dzielnicowej Olimpiadzie Sportowej</li>\r\n						</ul>\r\n					</li>\r\n				</ol>\r\n				<p>Mamy za sobÄ… wiele osiÄ…gniÄ™Ä‡, ale dla nas najwaÅ¼niejszym osiÄ…gniÄ™ciem jest efektywna realizacja przyjÄ™tych priorytetÃ³w wychowawczych, zadowolenie z dobrej wspÃ³Å‚pracy z rodzicami i radoÅ›Ä‡ dzieci. Dzieci opuszczajÄ…ce nasze przedszkole radzÄ… sobie w sytuacjach trudnych, umiejÄ… rozwiÄ…zywaÄ‡ problemy, dziÄ™ki czemu przekraczajÄ… progi szkoÅ‚y bez lÄ™ku i niepotrzebnego stresu. </p[>\r\n				<p>Wspomagamy rozwÃ³j i wczesnÄ… edukacjÄ™, wprowadzamy dzieci w Å›wiat wartoÅ›ci uniwersalnych, zaspakajamy poczucie bezpieczeÅ„stwa. </p>', 7, '/'),
(9, 'Kalendarium', 'kalendarium', 'text', 1, 'bg8', '<p>W dniu 4 wrzeÅ›nia 2013 r. o godz. 17.30 zapraszamy na zebranie organizacyjne rodzicÃ³w dzieci z grup przy ul. Meissnera.</p>\r\n				<p>W dniu 5 wrzeÅ›nia 2013 r. o godz. 17.30 zapraszamy na zebranie organizacyjne rodzicÃ³w dzieci z grup przy ul. WitoszyÅ„skiego.</p>\r\n				<h2>KALENDARIUM  IMPREZ W ROKU SZKOLNYM 2012 / 2013</h2>\r\n				<b>WrzesieÅ„:</b>\r\n				<ul>\r\n					<li>Teatrzyk â€“ â€ž Misiowa draka o drogowych znakachâ€</li>\r\n					<li>Teatrzyk â€“ â€ž Pierwsza pomocâ€</li>\r\n					<li>Spotkania z policjÄ… â€ž Bezpieczna droga do przedszkolaâ€</li>\r\n					<li>Spotkania ze StraÅ¼Ä… MiejskÄ…</li>\r\n				</ul>\r\n				<b>PaÅºdziernik:</b>\r\n				<ul>\r\n					<li>Teatrzyk â€“ â€ž Numer 112â€</li>\r\n					<li>Teatrzyk  - â€žKrÃ³liczek WÄ™drowniczekâ€</li>\r\n					<li>Warsztaty multimedialne z elementami  dramy dla poszczegÃ³lnych grup; â€žPlaneta Ziemiaâ€</li>\r\n				</ul>\r\n				<b>Listopad:</b>\r\n				<ul>\r\n					<li>Koncert muzyczny â€“ â€žCztery pory rokuâ€</li>\r\n					<li>Spotkania z ekologiÄ… â€“ segregacja Å›mieci</li>\r\n					<li>Koncert muzyczny â€“ â€žBajka o elektrycznych klawiszachâ€</li>\r\n					<li>Wycieczka do gospodarstwa â€žCztery pory rokuâ€ â€“ budowanie karmikÃ³w, wykonanie anioÅ‚Ã³w, zwiedzanie farmy, jazda na kucykach.</li>\r\n				</ul>\r\n				<b>GrudzieÅ„:</b>\r\n				<ul>\r\n					<li>MikoÅ‚ajki</li>\r\n					<li>Koncert kolÄ™d</li>\r\n					<li>WystÄ™py Å›wiÄ…teczne wraz z warsztatami plastycznymi dla rodzicÃ³w;</li>\r\n					<li>Odwiedziny MikoÅ‚aja â€“ teatrzyk oraz paczki dla dzieci.</li>\r\n				</ul>\r\n				<b>StyczeÅ„:</b>\r\n				<ul>\r\n					<li>Bal KarnawaÅ‚owy</li>\r\n				</ul>\r\n				<b>Luty:</b>\r\n				<ul>\r\n					<li>Koncert muzyczny â€“ â€žJak Kuba zostaÅ‚ szeryfemâ€</li>\r\n					<li>Warsztaty multimedialne z elementami  dramy dla poszczegÃ³lnych grup : â€žWodaâ€</li>\r\n				</ul>\r\n				<b>Marzec:</b>\r\n				<ul>\r\n					<li>Koncert muzyczny: â€žWiosna, tatoâ€</li>\r\n					<li>Teatrzyk: â€ž JaÅ› i MaÅ‚gosiaâ€</li>\r\n					<li>Warsztaty multimedialne z elementami  dramy dla poszczegÃ³lnych grup: â€žWiosnaâ€.</li>\r\n				</ul>\r\n				<b>KwiecieÅ„</b>\r\n				<ul>\r\n					<li>Teatrzyk â€“ â€žRatujmy lasâ€</li>\r\n					<li>Teatrzyk â€“ â€žJaÅ› i MaÅ‚gosiaâ€  </li>\r\n				</ul>\r\n				<b>Maj:</b>\r\n				<ul>\r\n					<li>Spotkanie w Bibliotece Publicznej przy ul. Meissnera â€“ â€žDni Ekwadoruâ€</li>\r\n					<li>Wyjazd dzieci do Zamku KrÃ³lewskiego â€“ starsze grupy</li>\r\n					<li>Pasowanie na przedszkolaka â€“ uroczystoÅ›Ä‡ z udziaÅ‚em rodzicÃ³w</li>\r\n					<li>DzieÅ„ Mamy - uroczystoÅ›Ä‡ z udziaÅ‚em rodzicÃ³w</li>\r\n				</ul>\r\n				<b>Czerwiec:</b>\r\n				<ul>\r\n					<li>CaÅ‚odniowa wycieczka autokarowa do â€žRanczo w Dolinieâ€</li>\r\n					<li>ZakoÅ„czenia roku - uroczystoÅ›Ä‡ z udziaÅ‚em rodzicÃ³w</li>\r\n					<li>Wyjazd do Zamku KrÃ³lewskiego â€“ starsze grupy</li>\r\n					<li>Wyjazd do Fabryki cukierkÃ³w â€“ grupa III</li>\r\n					<li>Piknik rodzinny w ogrodzie</li>\r\n				</ul>', 8, '/'),
(10, 'WaÅ¼ne informacje', 'informacje', 'news', 1, 'bg9', '<p>Wallboard informacyjny zawierajÄ…cy najwaÅ¼niejsze aktualnoÅ›ci, kt&oacute;rych zajawki bÄ™dÄ… widoczne na stronie gÅ‚&oacute;wnej, dodatkowo moÅ¼na &quot;przypiÄ…Ä‡&quot; na staÅ‚e jakieÅ› informacje, kt&oacute;re powinny byÄ‡ zawsze widoczne i nie zasypane aktualnoÅ›ciami.</p>\r\n', 9, '/'),
(11, 'Ankiety', 'ankiety', 'text', 0, 'bg10', '<p>Jeszcze nie mam pomysÅ‚u, jak by to mogÅ‚o wyglÄ…daÄ‡, ale w sumie jeszcze takiej ankiety nie widziaÅ‚em. Przy braku aktywnej ankiety moÅ¼na ten element ukryÄ‡, bÄ…dÅº pozostawiÄ‡ ze stowonym komunikatem.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem Ipsum</p>\r\n', 10, '/'),
(12, 'Kontakt', 'kontakt', 'text', 1, 'bg11', '<script>\r\n			function initialize() {\r\n			  var LatLng = new google.maps.LatLng(52.2238167, 21.0881000);\r\n			  var mapOptions = {\r\n				zoom:16,\r\n				center: LatLng,\r\n				mapTypeId: google.maps.MapTypeId.ROADMAP,\r\n			  };\r\n			  var map = new google.maps.Map(document.getElementById(''map-canvas''),\r\n				  mapOptions);\r\n			  \r\n			    var marker = new google.maps.Marker({\r\n					  position: LatLng,\r\n					  map: map,\r\n					  title: ''Przedszkole 384''\r\n				  });\r\n			}\r\n\r\n			google.maps.event.addDomListener(window, ''load'', initialize);		\r\n		</script>\r\n<h2>Kontakt</h2>\r\n				<div style="float:left; padding-right:20px;">\r\n					<h3>Adres korespondencyjny</h3>\r\n					Przedszkole 384<br>ul. Meissnera 8b<br>03-982 Warszawa<br>\r\n					<h3> Telefony</h3>\r\n					ul. Meissnera: 22 613 68 00<br>ul. WitoszyÅ„skiego: 22 613 57 42\r\n					<h3>e-mail</h3>\r\n					przedszkole384@op.pl\r\n				</div>\r\n				<div id="map-canvas"></div>', 11, '/'),
(13, 'Metodyka', 'metodyka', 'text', 1, 'bg4', '<h3><em>ZaÅ‚oÅ¼enia pracy dydaktyczno &ndash; wychowawczej na rok szkolny 2013/2014 (koncepcja)</em></h3>\r\n\r\n<ol>\r\n	<li>Promocja Przedszkola w Å›rodowisku lokalnym:\r\n	<ul>\r\n		<li>Wystawy prac plastycznych dzieci np. biblioteki: WitoszyÅ„skiego, Meissnera</li>\r\n		<li>UdziaÅ‚ w konkursach dzielnicowych</li>\r\n		<li>Organizacja imprez, w kt&oacute;rych uczestniczÄ… rodziny &ndash; Wigilia, DzieÅ„ Babci i Dziadka, DzieÅ„ Mamy, zakoÅ„czenie roku, piknik w ogrodzie, pasowanie na przedszkolaka.</li>\r\n		<li>Organizacja JaseÅ‚ek w KoÅ›ciele, Parafia Ojca Pio, dla caÅ‚ej spoÅ‚ecznoÅ›ci lokalnej.</li>\r\n		<li>Wsp&oacute;Å‚praca z gabinetem stomatologicznym GORDENT, w ramach kt&oacute;rej prowadzone sÄ… darmowe konsultacje stomatologa i ortodonty dla dzieci i rodzic&oacute;w.</li>\r\n		<li>Organizacja warsztat&oacute;w umiejÄ™tnoÅ›ci wychowawczych dla chÄ™tnych rodzic&oacute;w, finansowanych przez WydziaÅ‚ Spraw Socjalnych przy UrzÄ™dzie Dzielnicy Praga PoÅ‚udnie.</li>\r\n		<li>Szkolenia dla rodzic&oacute;w w ramach programu &bdquo;Chronimy dzieci&rdquo;.</li>\r\n		<li>Dni adaptacyjne dla dzieci nowo przyjÄ™tych.</li>\r\n		<li>Uczestnictwo w r&oacute;Å¼nych akcjach charytatywnych</li>\r\n	</ul>\r\n	</li>\r\n	<li>Rozwijanie postaw prozdrowotnych w zakresie szeroko pojÄ™tego bezpieczeÅ„stwa\r\n	<ul>\r\n		<li>Spotkanie z PolicjÄ…, StraÅ¼Ä… MiejskÄ…, StraÅ¼Ä… PoÅ¼arnÄ… itp.</li>\r\n		<li>Dalsze wdraÅ¼anie programu koleÅ¼anki K. Kruk &bdquo;Jedno zdrowie mam, wiÄ™c o nie dbam&rdquo;(wprowadzenie we wszystkich grupach)</li>\r\n		<li>Rozszerzenie oferty programowej o zajÄ™cia dodatkowe z zakresu zajÄ™Ä‡ ruchowych, z wykorzystaniem ciekawych metod, prowadzone przez nauczycielki naszego przedszkola.</li>\r\n		<li>UdziaÅ‚ w programie &bdquo;Chronimy dzieci&rdquo; (certyfikat)</li>\r\n		<li>WdroÅ¼enie programu wÅ‚asnego Katarzyny Raczkowskiej: &bdquo;Bezpieczny przedszkolak&rdquo;.</li>\r\n		<li>Wsp&oacute;Å‚praca z poradnia stomatologicznÄ….</li>\r\n		<li>Teatrzyki o tematyce dotyczÄ…cej zdrowia i bezpieczeÅ„stwa.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Rozwijanie postaw tw&oacute;rczych dzieci w zakresie muzyczno &ndash; plastycznym\r\n	<ul>\r\n		<li>UdziaÅ‚ dzieci w konkursach plastycznych i imprezach wokalno &ndash; tanecznych</li>\r\n		<li>Dostarczanie dzieciom przykÅ‚ad&oacute;w r&oacute;Å¼norodnej muzyki</li>\r\n		<li>Stosowanie metody pedagogiki zabawy oraz Batti Strauss w codziennej pracy z dzieÄ‡mi.</li>\r\n		<li>Wykorzystywanie r&oacute;Å¼norodnych technik plastycznych podczas zajÄ™Ä‡ z dzieÄ‡mi, wystawa prac dzieci na tablicach przedszkolnych oraz w bibliotekach.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Rozwijanie wartoÅ›ci wychowawczych zgodnie z przyjÄ™tym kanonem norm spoÅ‚ecznych\r\n	<ul>\r\n		<li>Praca z bajkÄ… profilaktyczno &ndash; wychowawczÄ… A.Grzelak &bdquo;Cukierek&rdquo; (grupy starsze)</li>\r\n		<li>Praca z programem profilaktycznym &bdquo;JuÅ¼ wiem co zrobiÄ‡&rdquo;</li>\r\n		<li>Pedagogizacja rodzic&oacute;w &ndash; warsztaty umiejÄ™tnoÅ›ci wychowawczych</li>\r\n		<li>Realizacja &bdquo;ZaÅ‚oÅ¼eÅ„ wychowawczych i profilaktycznych&rdquo; wypracowanych przez RadÄ™ PedagogicznÄ… przedszkola.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<h3><em>Metody pracy dydaktyczno - wychowawczej (dokÅ‚adniejszy opis):</em></h3>\r\n\r\n<ul>\r\n	<li><strong>Pedagogika zabawy</strong> &ndash; to zbi&oacute;r metod pomagajÄ…cych nauczycielowi w budowaniu pozytywnych i dobrych relacji miÄ™dzy czÅ‚onkami grupy. Metody pedagogiki zabawy zawierajÄ… w sobie element zabawy i nauki. W zabawie uczestnik ma okazjÄ™ zdobyÄ‡ wiedzÄ™, umiejÄ™tnoÅ›ci, wartoÅ›ci spoÅ‚eczne i moralne, doÅ›wiadczyÄ‡ wraÅ¼eÅ„, emocji i uczuÄ‡.</li>\r\n	<li><strong>Kinezjologia edukacyjna Paula Dennisona</strong> &ndash; jest to gimnastyki m&oacute;zgu &ndash; skoordynowany zestaw ruch&oacute;w integrujÄ…cych, kt&oacute;re usprawniajÄ… proces uczenia siÄ™;</li>\r\n	<li><strong>Ruch RozwijajÄ…cy Weroniki Sherborne</strong> &ndash; Ä‡wiczenia, kt&oacute;re majÄ… pom&oacute;c dzieciom w poznaniu samych siebie, w zdobyciu do siebie zaufania, poznaniu innych i nauczenie siÄ™ ufania im. A dalej &ndash; poprzez nabranie pewnoÅ›ci siebie i wiary we wÅ‚asne moÅ¼liwoÅ›ci &ndash; w nauczeniu siÄ™ aktywnego i tw&oacute;rczego Å¼ycia;</li>\r\n	<li><strong>Metoda glottodydaktyki</strong> &ndash; wczesna nauka czytania poprzez zabawÄ™. Ä†wiczenia ortofoniczne, emisyjne, oddechowe, logopedyczne oraz ciÄ…gÅ‚y kontakt z gÅ‚oskÄ… i literÄ….</li>\r\n	<li><strong>Metoda projekt&oacute;w badawczych</strong> &ndash; umoÅ¼liwienie dzieciom, dziÄ™ki ich wÅ‚asnej aktywnoÅ›ci, poznawanie Å›wiata i rozumienie jego sensu. Praca tÄ… metodÄ… wyzwala w dzieciach to, co ukryte, pozwala wyciÄ…gnÄ…Ä‡ na Å›wiatÅ‚o dziennego, to czego byÄ‡ moÅ¼e nigdy byÅ›my nie zauwaÅ¼yli, wszystkie talenty, emocje, uczucia, przeÅ¼ycia.</li>\r\n	<li>Matematyka wg metody profesor Edyty Gruszczyk &ndash; KolczyÅ„skiej;</li>\r\n</ul>\r\n', 3, 'program'),
(14, 'Koncepcja', 'koncepcja', 'text', 1, 'bg4', '<h2>KONCEPCJA PRACY PRZEDSZKOLA</h2>\r\n\r\n<p>zatwierdzona przez RadÄ™ PedagogicznÄ… w dniu 20. 10. 2011r.</p>\r\n\r\n<p>Koncepcja pracy naszego przedszkola oparta jest na celach i zadaniach zawartych w aktach prawnych: Ustawa o Systemie OÅ›wiaty, Statucie Przedszkola nr 384 w Warszawie.</p>\r\n\r\n<h3><em>Wizja, Misja</em></h3>\r\n\r\n<ul>\r\n	<li>KaÅ¼de dziecko jest dla nas waÅ¼ne! Jest dla nas indywidualnoÅ›ciÄ…, do kt&oacute;rej poszukujemy niejednokrotnie trudnego do odnalezienia klucza. Robimy wszystko, aby czuÅ‚o siÄ™ bezpieczne i szczÄ™Å›liwe oraz pomagamy mu poznaÄ‡ siebie, staÄ‡ siÄ™ samodzielnym i otwartym na Å›wiat.</li>\r\n	<li>Dzieci opuszczajÄ…ce nasze przedszkole sÄ… otwarte, tw&oacute;rcze i spontaniczne. ZnajÄ… siebie i swoje moÅ¼liwoÅ›ci, szanujÄ… odrÄ™bnoÅ›Ä‡ innych. RadzÄ… sobie w sytuacjach trudnych, umiejÄ… rozwiÄ…zywaÄ‡ problemy i sÄ… dobrze przygotowane do obowiÄ…zku szkolnego.</li>\r\n	<li>Wychowankowie, potrzebujÄ…cy pomocy, znajdujÄ… oparcie w nauczycielach i specjalistach.</li>\r\n	<li>Organizujemy imprezy, kt&oacute;re pozwalajÄ… nam wsp&oacute;lnie, przyjemnie spÄ™dziÄ‡ czas.</li>\r\n	<li>Wsp&oacute;Å‚pracujemy ze Å›rodowiskiem lokalnym, odwiedzamy instytucje, poznajemy ciekawych ludzi.</li>\r\n	<li>Nasze przedszkole jest przytulne, ciepÅ‚e i kolorowe. Mamy ciekawe pomoce dydaktyczne i zabawki. Nasz ogr&oacute;d zachÄ™ca do zabaw, - dbamy o higienÄ™, ruch i aktywnie spÄ™dzamy czas.</li>\r\n	<li>Organizujemy zajÄ™cia dodatkowe, wspomagajÄ…ce rozw&oacute;j dziecka.</li>\r\n	<li>Kadra wychodzÄ…c naprzeciw potrzebom wsp&oacute;Å‚czesnoÅ›ci, na bieÅ¼Ä…co doskonali swe umiejÄ™tnoÅ›ci.</li>\r\n</ul>\r\n\r\n<p>Nasze przedszkole to miejsce:</p>\r\n\r\n<ul>\r\n	<li>wzajemnego szacunku, akceptacji i zaufania,</li>\r\n	<li>sukcesu intelektu, ducha, woli i ciaÅ‚a,</li>\r\n	<li>zadowolenia z wÅ‚asnej aktywnoÅ›ci i samodzielnoÅ›ci,</li>\r\n	<li>kreatywnego myÅ›lenia,</li>\r\n	<li>radoÅ›ci i humoru.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3><em>Cele i zadania gÅ‚&oacute;wne:</em></h3>\r\n\r\n<ol>\r\n	<li>Zapewnienie wychowankom bezpieczeÅ„stwa oraz optymalnych warunk&oacute;w dla ich prawidÅ‚owego rozwoju odpowiednio do ich potrzeb i moÅ¼liwoÅ›ci przedszkola.</li>\r\n	<li>Organizowanie procesu ksztaÅ‚cenia zapewniajÄ…cego wszechstronny i harmonijny rozw&oacute;j kaÅ¼dego wychowanka w tym przygotowanie dziecka do podjÄ™cia nauki w szkole.</li>\r\n	<li>Wspieranie uzdolnieÅ„ oraz wspomaganie dziecka zgodnie z jego wrodzonym potencjaÅ‚em i moÅ¼liwoÅ›ciami rozwojowymi.</li>\r\n	<li>Tworzenie warunk&oacute;w do rozwoju aktywnoÅ›ci dziecka wobec siebie, innych ludzi i otaczajÄ…cego go Å›wiata, na r&oacute;Å¼nych pÅ‚aszczyznach jego dziaÅ‚alnoÅ›ci:\r\n	<ul>\r\n		<li>ksztaÅ‚towanie u dziecka umiejÄ™tnoÅ›ci odbioru sztuki (rozwijanie wraÅ¼liwoÅ›ci estetycznej, wyobraÅºni, ekspresji plastycznej, muzycznej, ruchowej, rozwijanie umiejÄ™tnoÅ›ci wyraÅ¼ania swoich myÅ›li i przeÅ¼yÄ‡),</li>\r\n		<li>ksztaÅ‚towanie postawy w obcowaniu z otoczeniem przyrodniczym i spoÅ‚ecznym,</li>\r\n		<li>nabywanie doÅ›wiadczeÅ„ w obcowaniu z kulturÄ….</li>\r\n	</ul>\r\n	</li>\r\n	<li>Wspomaganie rodziny w wychowaniu dziecka, wsp&oacute;Å‚dziaÅ‚anie z rodzicami w celu ujednolicenia oddziaÅ‚ywaÅ„ wychowawczych.</li>\r\n	<li>Wspomaganie rozwoju zawodowego nauczycieli.</li>\r\n	<li>Stworzenie sprawnego, skutecznego systemu zarzÄ…dzania plac&oacute;wkÄ….</li>\r\n	<li>Zapewnienie odpowiedniej bazy i wyposaÅ¼enia przedszkola gwarantujÄ…cego wÅ‚aÅ›ciwÄ… realizacjÄ™ zadaÅ„ plac&oacute;wki.</li>\r\n	<li>banie o pozytywny wizerunek przedszkola w Å›rodowisku.</li>\r\n</ol>\r\n', 2, 'program'),
(15, 'Absolwent', 'absolwent', 'text', 1, 'bg4', '<center>\r\n					<h3><i>Sylwetka absolwenta:</i></h3>\r\n				</center>\r\n				<p>\r\n					Absolwent Przedszkola:\r\n					<ul>\r\n						<li>jest dobrze przygotowany do podjÄ™cia obowiÄ…zkÃ³w szkolnych,</li>\r\n						<li>ma dobrze rozwiniÄ™te procesy poznawcze,</li>\r\n						<li>potrafi wspÃ³Å‚dziaÅ‚aÄ‡ w zespole,</li>\r\n						<li>jest zainteresowany naukÄ… i literaturÄ…,</li>\r\n						<li>jest samodzielny,</li>\r\n						<li>jest aktywny w podejmowaniu dziaÅ‚aÅ„,</li>\r\n						<li>lubi dziaÅ‚ania twÃ³rcze,</li>\r\n						<li>jest wraÅ¼liwy estetycznie,</li>\r\n						<li>akceptuje zdrowy styl Å¼ycia,</li>\r\n						<li>ma bogatÄ… wiedzÄ™ o Å›rodowisku przyrodniczym,</li>\r\n						<li>cechuje siÄ™ gotowoÅ›ciÄ… do dziaÅ‚ania na rzecz Å›rodowiska przyrodniczego i spoÅ‚ecznego,</li>\r\n						<li>czuje siÄ™ Polakiem i Europejczykiem.</li>\r\n					</ul>\r\n				</p>', 1, 'program');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
