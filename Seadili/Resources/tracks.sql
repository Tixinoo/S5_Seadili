-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 03 Janvier 2015 à 15:06
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `seadili-db`
--

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `artist_id` int(11) NOT NULL,
`track_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `mp3_url` varchar(200) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tracks`
--

INSERT INTO `tracks` (`artist_id`, `track_id`, `title`, `mp3_url`) VALUES
(1, 1, 'Omnipresent', 'http://freedownloads.last.fm/download/86630288/Omnipresent.mp3'),
(1, 2, 'Jazz Break', 'http://freedownloads.last.fm/download/122891272/Jazz%2BBreak.mp3'),
(1, 3, 'Real Therapy', 'http://freedownloads.last.fm/download/122890005/Real%2BTherapy.mp3'),
(1, 4, 'No Destination', 'http://freedownloads.last.fm/download/582522960/No%2BDestination.mp3'),
(2, 5, 'Cumbia do Lutador', 'http://freedownloads.last.fm/download/108867325/Cumbia%2Bdo%2BLutador.mp3'),
(2, 6, 'Bela Vista', 'http://freedownloads.last.fm/download/108869047/Bela%2BVista.mp3'),
(2, 7, 'Mama Me Queira', 'http://freedownloads.last.fm/download/108870178/Mama%2BMe%2BQueira.mp3'),
(2, 8, 'Academia da Berlinda', 'http://freedownloads.last.fm/download/45702069/Academia%2Bda%2BBerlinda.mp3'),
(3, 9, 'Michelle', 'http://freedownloads.last.fm/download/163416630/Michelle.mp3'),
(3, 10, 'Cavatine', 'http://freedownloads.last.fm/download/163416633/Cavatine.mp3'),
(3, 11, 'Sons De Carillhoes', 'http://freedownloads.last.fm/download/86456318/Sons%2BDe%2BCarillhoes.mp3'),
(3, 12, 'Zorba', 'http://freedownloads.last.fm/download/163416627/Zorba.mp3'),
(4, 13, 'Tarrega - Recuerdos de la Alhambra', 'http://freedownloads.last.fm/download/111138168/Tarrega%2B-%2BRecuerdos%2Bde%2Bla%2BAlhambra.mp3'),
(4, 14, 'Sokolov L - Russische Polka', 'http://freedownloads.last.fm/download/115339190/Sokolov%2BL%2B-%2BRussische%2BPolka.mp3'),
(4, 15, 'Villa-Lobos - Präludium Nr. 3', 'http://freedownloads.last.fm/download/115340159/Villa-Lobos%2B-%2BPr%25C3%25A4ludium%2BNr.%2B3.mp3'),
(4, 16, 'Bach J S – Präludium in C-Dur', 'http://freedownloads.last.fm/download/133804039/Bach%2BJ%2BS%2B-%2BPr%25C3%25A4ludioum%2Bin%2BC-Dur.mp3'),
(5, 17, 'Strike Em Back', 'http://freedownloads.last.fm/download/138795168/Strike%2BEm%2BBack.mp3'),
(5, 18, 'Taste Of Underground', 'http://freedownloads.last.fm/download/171615610/Taste%2BOf%2BUnderground.mp3'),
(5, 19, 'One Of A Million', 'http://freedownloads.last.fm/download/242736142/One%2BOf%2BA%2BMillion.mp3'),
(5, 20, 'I Don''t Care', 'http://freedownloads.last.fm/download/168713633/I%2BDon%2527t%2BCare.mp3'),
(6, 21, 'Noise', 'http://freedownloads.last.fm/download/562244719/Noise.mp3'),
(6, 22, 'This is massive (Dub Mix)', 'http://freedownloads.last.fm/download/328258692/This%2Bis%2Bmassive%2B%2528Dub%2BMix%2529.mp3'),
(6, 23, 'It Was Only a Kiss', 'http://freedownloads.last.fm/download/291050526/It%2BWas%2BOnly%2Ba%2BKiss.mp3'),
(6, 24, 'My girlfriend', 'http://freedownloads.last.fm/download/346500841/My%2Bgirlfriend.mp3'),
(7, 25, 'Chama os Mulekes', 'http://freedownloads.last.fm/download/468546131/Chama%2Bos%2BMulekes.mp3'),
(7, 26, 'Rainha da Pista', 'http://freedownloads.last.fm/download/493019474/Rainha%2Bda%2BPista.mp3'),
(7, 27, 'Pensamentos ao Além', 'http://freedownloads.last.fm/download/157473580/Pensamentos%2Bao%2BAl%25C3%25A9m.mp3'),
(7, 28, 'Calma na Alma', 'http://freedownloads.last.fm/download/493020963/Calma%2Bna%2BAlma.mp3'),
(8, 29, 'I''ve Been Waiting for You', 'http://freedownloads.last.fm/download/30784575/I%2527ve%2BBeen%2BWaiting%2Bfor%2BYou.mp3'),
(8, 30, 'Riddle', 'http://freedownloads.last.fm/download/454337471/Riddle.mp3'),
(8, 31, 'Inches', 'http://freedownloads.last.fm/download/411891948/Inches.mp3'),
(8, 32, 'Words', 'http://freedownloads.last.fm/download/411892022/Words.mp3'),
(9, 33, 'Noisy Places', 'http://freedownloads.last.fm/download/665031130/Noisy%2BPlaces.mp3'),
(9, 34, 'Aural Mist', 'http://freedownloads.last.fm/download/92028524/Aural%2BMist.mp3'),
(9, 35, 'Opus', 'http://freedownloads.last.fm/download/665031147/Opus.mp3'),
(9, 36, 'Laurel Marty Scrapings', 'http://freedownloads.last.fm/download/92028517/Laurel%2BMarty%2BScrapings.mp3'),
(10, 37, '1997', 'http://freedownloads.last.fm/download/397340957/1997.mp3'),
(10, 38, 'Home Alone', 'http://freedownloads.last.fm/download/397341888/Home%2BAlone.mp3'),
(10, 39, 'Still Me', 'http://freedownloads.last.fm/download/397340555/Still%2BMe.mp3'),
(10, 40, 'It Was Beautiful', 'http://freedownloads.last.fm/download/302682649/It%2BWas%2BBeautiful.mp3'),
(11, 41, 'First Cavity', 'http://freedownloads.last.fm/download/246904334/First%2BCavity.mp3'),
(11, 42, 'Konvenience Is The Key', 'http://freedownloads.last.fm/download/246903417/Konvenience%2BIs%2BThe%2BKey.mp3'),
(11, 43, 'Bean Salad', 'http://freedownloads.last.fm/download/249520254/Bean%2BSalad.mp3'),
(11, 44, 'Drunk On Solo', 'http://freedownloads.last.fm/download/265364519/Drunk%2BOn%2BSolo.mp3'),
(12, 45, 'Tu-tu', 'http://freedownloads.last.fm/download/474380582/Tu-tu.mp3'),
(12, 46, 'I kill you with a smile', 'http://freedownloads.last.fm/download/431155593/I%2Bkill%2Byou%2Bwith%2Ba%2Bsmile.mp3'),
(12, 47, 'Come on dance', 'http://freedownloads.last.fm/download/471223890/Come%2Bon%2Bdance.mp3'),
(12, 48, 'I want your love', 'http://freedownloads.last.fm/download/480661693/I%2Bwant%2Byour%2Blove.mp3'),
(13, 49, 'Four Prophets', 'http://freedownloads.last.fm/download/225673521/Four%2BProphets.mp3'),
(13, 50, 'Goodbyes', 'http://freedownloads.last.fm/download/227718099/Goodbyes.mp3'),
(13, 51, 'acclimate', 'http://freedownloads.last.fm/download/92546213/acclimate.mp3'),
(13, 52, 'Warm Steel', 'http://freedownloads.last.fm/download/227711412/Warm%2BSteel.mp3'),
(14, 53, 'Quem é Ela?', 'http://freedownloads.last.fm/download/466712832/Quem%2B%25C3%25A9%2BEla%253F.mp3'),
(14, 54, 'O Escolhido', 'http://freedownloads.last.fm/download/466649932/O%2BEscolhido.mp3'),
(14, 55, 'Letristas', 'http://freedownloads.last.fm/download/462721540/Letristas.mp3'),
(14, 56, 'Prefácio', 'http://freedownloads.last.fm/download/488148582/Pref%25C3%25A1cio.mp3'),
(15, 57, 'Inside Me', 'http://freedownloads.last.fm/download/429392238/Inside%2BMe.mp3'),
(15, 58, 'Club House ''98', 'http://freedownloads.last.fm/download/503580864/Club%2BHouse%2B%252798.mp3'),
(15, 59, 'Mirage', 'http://freedownloads.last.fm/download/504498982/Mirage.mp3'),
(15, 60, 'Interlude', 'http://freedownloads.last.fm/download/466690592/Interlude.mp3'),
(16, 61, 'Dark Night Dreams', 'http://freedownloads.last.fm/download/476027237/Dark%2BNight%2BDreams.mp3'),
(16, 62, 'Hauntingly Silent', 'http://freedownloads.last.fm/download/496795788/Hauntingly%2BSilent.mp3'),
(16, 63, 'Hittin'' The Bottle', 'http://freedownloads.last.fm/download/528123496/Hittin%2527%2BThe%2BBottle.mp3'),
(16, 64, 'Searching London', 'http://freedownloads.last.fm/download/505444108/Searching%2BLondon.mp3'),
(17, 65, 'J.K. Mertz - Liebeslied', 'http://freedownloads.last.fm/download/141517761/J.K.%2BMertz%2B-%2BLiebeslied.mp3'),
(17, 66, 'J.S. Bach - Praeludium BWV 1008', 'http://freedownloads.last.fm/download/141517760/J.S.%2BBach%2B-%2BPraeludium%2BBWV%2B1008.mp3'),
(17, 67, 'N. Paganini - Vairazioni sul Carnavale di Venezia', 'http://freedownloads.last.fm/download/141517763/N.%2BPaganini%2B-%2BVairazioni%2Bsul%2B%2522Carnavale%2Bdi%2BVenezia%2522.mp3'),
(17, 68, 'J.K. Mertz - Unruhe', 'http://freedownloads.last.fm/download/141517762/J.K.%2BMertz%2B-%2BUnruhe.mp3'),
(18, 69, 'Before Long', 'http://freedownloads.last.fm/download/597538693/Before%2BLong.mp3'),
(18, 70, 'Wake Up', 'http://freedownloads.last.fm/download/597540395/Wake%2BUp.mp3'),
(18, 71, 'Toxic Shock', 'http://freedownloads.last.fm/download/597540950/Toxic%2BShock.mp3'),
(18, 72, 'Sexy Brown', 'http://freedownloads.last.fm/download/597533878/Sexy%2BBrown.mp3'),
(19, 73, '¿Cómo explicarte?', 'http://freedownloads.last.fm/download/86982982/%25C2%25BFC%25C3%25B3mo%2Bexplicarte%253F.mp3'),
(19, 74, 'Penjat', 'http://freedownloads.last.fm/download/86980511/Penjat.mp3'),
(19, 75, 'Despierto', 'http://freedownloads.last.fm/download/86982037/Despierto.mp3'),
(19, 76, 'Tomasín', 'http://freedownloads.last.fm/download/87116481/Tomas%25C3%25ADn.mp3'),
(20, 77, 'África', 'http://freedownloads.last.fm/download/319415234/%25C3%2581frica.mp3'),
(20, 78, 'Malos tiempos', 'http://freedownloads.last.fm/download/318762814/Malos%2Btiempos.mp3'),
(20, 79, 'Raíces', 'http://freedownloads.last.fm/download/319415236/Ra%25C3%25ADces.mp3'),
(20, 80, 'Esqueletos de la soledad', 'http://freedownloads.last.fm/download/319415238/Esqueletos%2Bde%2Bla%2Bsoledad.mp3'),
(21, 81, 'Cười Adam', 'http://freedownloads.last.fm/download/270051768/C%25C6%25B0%25E1%25BB%259Di%2BAdam.mp3'),
(21, 82, 'Đôi Bờ', 'http://freedownloads.last.fm/download/207473953/%25C4%2590%25C3%25B4i%2BB%25E1%25BB%259D.mp3'),
(21, 83, 'Thương', 'http://freedownloads.last.fm/download/270042259/Th%25C6%25B0%25C6%25A1ng.mp3'),
(21, 84, 'Nghe Tôi Kể Này', 'http://freedownloads.last.fm/download/265452592/Nghe%2BT%25C3%25B4i%2BK%25E1%25BB%2583%2BN%25C3%25A0y.mp3'),
(22, 85, 'Al Rouzana', 'http://freedownloads.last.fm/download/68328750/Al%2BRouzana.mp3'),
(22, 86, 'Ala Mowj Elbahr (Part I)', 'http://freedownloads.last.fm/download/137055986/Ala%2BMowj%2BElbahr%2B%2528Part%2BI%2529.mp3'),
(22, 87, 'Yamma Lala', 'http://freedownloads.last.fm/download/135195762/Yamma%2BLala.mp3'),
(22, 88, 'Daaoney Ajood', 'http://freedownloads.last.fm/download/137061083/Daaoney%2BAjood.mp3'),
(23, 89, 'Veja Bem Meu Bem', 'http://freedownloads.last.fm/download/3659037/Veja%2BBem%2BMeu%2BBem.mp3'),
(23, 90, 'A Flor', 'http://freedownloads.last.fm/download/3454126/A%2BFlor.mp3'),
(23, 91, 'Todo Carnaval Tem Seu Fim', 'http://freedownloads.last.fm/download/3454077/Todo%2BCarnaval%2BTem%2BSeu%2BFim.mp3'),
(23, 92, 'Cher Antoine', 'http://freedownloads.last.fm/download/4060778/Cher%2BAntoine.mp3'),
(24, 93, 'Third Skin', 'http://freedownloads.last.fm/download/6913631/Third%2BSkin.mp3'),
(24, 94, 'In', 'http://freedownloads.last.fm/download/32380310/In.mp3'),
(24, 95, 'Return to a Strange Disdain', 'http://freedownloads.last.fm/download/32384403/Return%2Bto%2Ba%2BStrange%2BDisdain.mp3'),
(24, 96, 'Wide-Eyed Platform', 'http://freedownloads.last.fm/download/32384648/Wide-Eyed%2BPlatform.mp3'),
(25, 97, '24', 'http://freedownloads.last.fm/download/241764226/24.mp3'),
(25, 98, 'Madhouse', 'http://freedownloads.last.fm/download/238264559/Madhouse.mp3'),
(25, 99, 'Cokeman', 'http://freedownloads.last.fm/download/248069728/Cokeman.mp3'),
(25, 100, 'Clearance Sale', 'http://freedownloads.last.fm/download/248074012/Clearance%2BSale.mp3'),
(26, 101, 'The Architect', 'http://freedownloads.last.fm/download/336170360/The%2BArchitect.mp3'),
(26, 102, 'Days to ashes (recuerdos)', 'http://freedownloads.last.fm/download/336171782/Days%2Bto%2Bashes%2B%2528recuerdos%2529.mp3'),
(26, 103, 'The beach', 'http://freedownloads.last.fm/download/336171786/The%2Bbeach.mp3'),
(26, 104, 'Intermission', 'http://freedownloads.last.fm/download/336171109/Intermission.mp3'),
(27, 105, 'A glorious afternoon', 'http://freedownloads.last.fm/download/414748533/A%2Bglorious%2Bafternoon.mp3'),
(27, 106, 'Warm', 'http://freedownloads.last.fm/download/78056986/Warm.mp3'),
(27, 107, 'Camper', 'http://freedownloads.last.fm/download/414748526/Camper.mp3'),
(27, 108, 'Background birds', 'http://freedownloads.last.fm/download/78057630/Background%2Bbirds.mp3'),
(28, 109, 'Cyanide', 'http://freedownloads.last.fm/download/591896002/Cyanide.mp3'),
(28, 110, 'Everything', 'http://freedownloads.last.fm/download/593895303/Everything.mp3'),
(28, 111, 'Silence', 'http://freedownloads.last.fm/download/605609894/Silence.mp3'),
(28, 112, 'Orbit', 'http://freedownloads.last.fm/download/605609950/Orbit.mp3'),
(29, 113, 'Small Hope', 'http://freedownloads.last.fm/download/184860214/Small%2BHope.mp3'),
(29, 114, 'Lost Tribes', 'http://freedownloads.last.fm/download/184860216/Lost%2BTribes.mp3'),
(29, 115, 'Maza Hen Bamidbar', 'http://freedownloads.last.fm/download/184860217/Maza%2BHen%2BBamidbar.mp3'),
(29, 116, 'The Call', 'http://freedownloads.last.fm/download/184860218/The%2BCall.mp3'),
(30, 117, 'Tình 2000', 'http://freedownloads.last.fm/download/264834489/T%25C3%25ACnh%2B2000.mp3'),
(30, 118, 'Chiếc Vòng Cầu Hôn', 'http://freedownloads.last.fm/download/264839192/Chi%25E1%25BA%25BFc%2BV%25C3%25B2ng%2BC%25E1%25BA%25A7u%2BH%25C3%25B4n.mp3'),
(30, 119, 'Thiên Đường Mong Manh', 'http://freedownloads.last.fm/download/214046881/Thi%25C3%25AAn%2B%25C4%2590%25C6%25B0%25E1%25BB%259Dng%2BMong%2BManh.mp3'),
(30, 120, 'Tiếng Chim Đa Đa', 'http://freedownloads.last.fm/download/325501267/Ti%25E1%25BA%25BFng%2BChim%2B%25C4%2590a%2B%25C4%2590a.mp3'),
(31, 121, 'Float', 'http://freedownloads.last.fm/download/15318420/Float.mp3'),
(31, 122, 'Only to Make Ammends', 'http://freedownloads.last.fm/download/79118729/Only%2Bto%2BMake%2BAmmends.mp3'),
(31, 123, 'Acts Rough', 'http://freedownloads.last.fm/download/80752272/Acts%2BRough.mp3'),
(31, 124, 'No Sky, No Rain!', 'http://freedownloads.last.fm/download/76889333/No%2BSky%252C%2BNo%2BRain%2521.mp3'),
(32, 125, 'Até O Final', 'http://freedownloads.last.fm/download/412091933/At%25C3%25A9%2BO%2BFinal.mp3'),
(32, 126, 'Acabou', 'http://freedownloads.last.fm/download/180784603/Acabou.mp3'),
(32, 127, 'Chuva De Novembro', 'http://freedownloads.last.fm/download/444614086/Chuva%2BDe%2BNovembro.mp3'),
(32, 128, 'A Rezadeira', 'http://freedownloads.last.fm/download/482715596/A%2BRezadeira.mp3'),
(33, 129, 'Hari', 'http://freedownloads.last.fm/download/76489031/Hari.mp3'),
(33, 130, 'Be Seeing You', 'http://freedownloads.last.fm/download/75310269/Be%2BSeeing%2BYou.mp3'),
(33, 131, 'Jupiter', 'http://freedownloads.last.fm/download/86743087/Jupiter.mp3'),
(33, 132, 'Ei Gaho', 'http://freedownloads.last.fm/download/72544667/Ei%2BGaho.mp3'),
(34, 133, 'Disco Music For Trees', 'http://freedownloads.last.fm/download/340353387/Disco%2BMusic%2BFor%2BTrees.mp3'),
(34, 134, 'Three (Untitled)', 'http://freedownloads.last.fm/download/340353388/Three%2B%2528Untitled%2529.mp3'),
(34, 135, 'False Eto', 'http://freedownloads.last.fm/download/340353386/False%2BEto.mp3'),
(34, 136, 'The Elephant''s Tusk', 'http://freedownloads.last.fm/download/326237453/The%2BElephant%2527s%2BTusk.mp3'),
(35, 137, 'Allhou', 'http://freedownloads.last.fm/download/21386366/Allhou.mp3'),
(35, 138, 'Drogue', 'http://freedownloads.last.fm/download/19620581/Drogue.mp3'),
(35, 139, 'Laare', 'http://freedownloads.last.fm/download/23102173/Laare.mp3'),
(35, 140, 'Tara', 'http://freedownloads.last.fm/download/21385970/Tara.mp3'),
(36, 141, 'Erasers', 'http://freedownloads.last.fm/download/171460001/Erasers.mp3'),
(36, 142, 'Spend Money On Your Misery', 'http://freedownloads.last.fm/download/425635492/Spend%2BMoney%2BOn%2BYour%2BMisery.mp3'),
(36, 143, 'Toyland', 'http://freedownloads.last.fm/download/388427953/Toyland.mp3'),
(36, 144, 'Aira', 'http://freedownloads.last.fm/download/456540406/Aira.mp3'),
(37, 145, 'Cinema Lights go Down', 'http://freedownloads.last.fm/download/605320082/Cinema%2BLights%2Bgo%2BDown.mp3'),
(37, 146, 'Like The Dust', 'http://freedownloads.last.fm/download/605320135/Like%2BThe%2BDust.mp3'),
(37, 147, 'Poor Thing', 'http://freedownloads.last.fm/download/566517960/Poor%2BThing.mp3'),
(37, 148, 'Behind', 'http://freedownloads.last.fm/download/605319712/Behind.mp3'),
(38, 149, 'Alter', 'http://freedownloads.last.fm/download/272061741/Alter.mp3'),
(38, 150, 'Eclipse Outro', 'http://freedownloads.last.fm/download/272065000/Eclipse%2BOutro.mp3'),
(38, 151, 'Climbing', 'http://freedownloads.last.fm/download/271838540/Climbing.mp3'),
(38, 152, 'Freddie Knows', 'http://freedownloads.last.fm/download/271839636/Freddie%2BKnows.mp3'),
(39, 153, 'Contigo yo subiré', 'http://freedownloads.last.fm/download/192308311/Contigo%2Byo%2Bsubir%25C3%25A9.mp3'),
(39, 154, 'Riitmo', 'http://freedownloads.last.fm/download/145111840/Riitmo.mp3'),
(39, 155, 'Quiero Caminar', 'http://freedownloads.last.fm/download/90679355/Quiero%2BCaminar.mp3'),
(39, 156, 'Mejor me voy', 'http://freedownloads.last.fm/download/178349894/Mejor%2Bme%2Bvoy.mp3'),
(40, 157, 'Gladhander', 'http://freedownloads.last.fm/download/342508494/Gladhander.mp3'),
(40, 158, 'Daylight Machine', 'http://freedownloads.last.fm/download/407300062/Daylight%2BMachine.mp3'),
(40, 159, 'We Were Flying Kites', 'http://freedownloads.last.fm/download/342508501/We%2BWere%2BFlying%2BKites.mp3'),
(40, 160, 'Ownsome', 'http://freedownloads.last.fm/download/407317839/Ownsome.mp3'),
(41, 161, 'Streamline', 'http://freedownloads.last.fm/download/53906872/Streamline.mp3'),
(41, 162, 'Feel', 'http://freedownloads.last.fm/download/54107800/Feel.mp3'),
(41, 163, 'Times', 'http://freedownloads.last.fm/download/54108248/Times.mp3'),
(41, 164, 'Tomorrow', 'http://freedownloads.last.fm/download/54108482/Tomorrow.mp3'),
(42, 165, 'Curls', 'http://freedownloads.last.fm/download/664719797/Curls.mp3'),
(42, 166, 'Wind', 'http://freedownloads.last.fm/download/632937686/Wind.mp3'),
(42, 167, 'Distillatio', 'http://freedownloads.last.fm/download/664719726/Distillatio.mp3'),
(42, 168, 'Return', 'http://freedownloads.last.fm/download/611380751/Return.mp3'),
(43, 169, 'Highly Sophisticated', 'http://freedownloads.last.fm/download/89578669/Highly%2BSophisticated.mp3'),
(43, 170, 'Afterlife', 'http://freedownloads.last.fm/download/48526384/Afterlife.mp3'),
(43, 171, 'The Story of the Dragon Slayer', 'http://freedownloads.last.fm/download/63012354/The%2BStory%2Bof%2Bthe%2BDragon%2BSlayer.mp3'),
(43, 172, 'Tired of Feeling Like This', 'http://freedownloads.last.fm/download/89578671/Tired%2Bof%2BFeeling%2BLike%2BThis.mp3'),
(44, 173, 'Cruel Thing', 'http://freedownloads.last.fm/download/105311058/Cruel%2BThing.mp3'),
(44, 174, 'Love With the Proper Stranger', 'http://freedownloads.last.fm/download/22976099/Love%2BWith%2Bthe%2BProper%2BStranger.mp3'),
(44, 175, 'Stay the Night', 'http://freedownloads.last.fm/download/22972239/Stay%2Bthe%2BNight.mp3'),
(44, 176, 'Can''t Get Started', 'http://freedownloads.last.fm/download/683373190/Can%2527t%2BGet%2BStarted.mp3'),
(45, 177, 'Ngọt và đắng', 'http://freedownloads.last.fm/download/181303924/Ng%25E1%25BB%258Dt%2Bv%25C3%25A0%2B%25C4%2591%25E1%25BA%25AFng.mp3'),
(45, 178, 'Điệu Ru Vực Sâu', 'http://freedownloads.last.fm/download/116113065/%25C4%2590i%25E1%25BB%2587u%2BRu%2BV%25E1%25BB%25B1c%2BS%25C3%25A2u.mp3'),
(45, 179, 'Vắng', 'http://freedownloads.last.fm/download/116112726/V%25E1%25BA%25AFng.mp3'),
(45, 180, 'Chờ', 'http://freedownloads.last.fm/download/92690690/Ch%25E1%25BB%259D.mp3'),
(46, 181, 'Nhờ Em Giữ Lấy Tình Ta', 'http://freedownloads.last.fm/download/221122908/Nh%25E1%25BB%259D%2BEm%2BGi%25E1%25BB%25AF%2BL%25E1%25BA%25A5y%2BT%25C3%25ACnh%2BTa.mp3'),
(46, 182, 'Như Chiếc Que Diêm', 'http://freedownloads.last.fm/download/162357151/Nh%25C6%25B0%2BChi%25E1%25BA%25BFc%2BQue%2BDi%25C3%25AAm.mp3'),
(46, 183, 'Dư Âm', 'http://freedownloads.last.fm/download/52852315/D%25C6%25B0%2B%25C3%2582m.mp3'),
(46, 184, 'Tình Khúc Thứ Nhất', 'http://freedownloads.last.fm/download/185020833/T%25C3%25ACnh%2BKh%25C3%25BAc%2BTh%25E1%25BB%25A9%2BNh%25E1%25BA%25A5t.mp3'),
(47, 185, 'Pão Com Cerveja', 'http://freedownloads.last.fm/download/7795317/P%25C3%25A3o%2BCom%2BCerveja.mp3'),
(47, 186, 'Siririca Baby', 'http://freedownloads.last.fm/download/4650350/Siririca%2BBaby.mp3'),
(47, 187, 'Muito bem comida', 'http://freedownloads.last.fm/download/6677042/Muito%2Bbem%2Bcomida.mp3'),
(47, 188, 'Beijos de Corpo', 'http://freedownloads.last.fm/download/10759670/Beijos%2Bde%2BCorpo.mp3'),
(48, 189, 'Young Money - Bedrock (Vindata Dance Remix)', 'http://freedownloads.last.fm/download/390272467/Young%2BMoney-%2BBedrock%2B%2528Vindata%2BDance%2BRemix%2529.mp3'),
(48, 190, 'Night Sky final', 'http://freedownloads.last.fm/download/417945669/Night%2BSky%2Bfinal.mp3'),
(48, 191, 'Wynter Gordon - Renegade (Vindata Remix)', 'http://freedownloads.last.fm/download/421985922/Wynter%2BGordon-%2BRenegade%2B%2528Vindata%2BRemix%2529.mp3'),
(48, 192, 'Band of Skulls - Fires (Vindata Remix)', 'http://freedownloads.last.fm/download/416371776/Band%2Bof%2BSkulls-%2BFires%2B%2528Vindata%2BRemix%2529.mp3'),
(49, 193, 'Unresolved', 'http://freedownloads.last.fm/download/502080123/Unresolved.mp3'),
(49, 194, 'Fragile Alliance', 'http://freedownloads.last.fm/download/502080178/Fragile%2BAlliance.mp3'),
(49, 195, 'Senior', 'http://freedownloads.last.fm/download/502081343/Senior.mp3'),
(49, 196, 'Kite House', 'http://freedownloads.last.fm/download/502081065/Kite%2BHouse.mp3'),
(50, 197, 'Nights Over Egypt feat. Carlitta Durand', 'http://freedownloads.last.fm/download/357048684/Nights%2BOver%2BEgypt%2Bfeat.%2BCarlitta%2BDurand.mp3'),
(50, 198, 'Crazy You feat. Sy Smith', 'http://freedownloads.last.fm/download/357051134/Crazy%2BYou%2Bfeat.%2BSy%2BSmith.mp3'),
(50, 199, 'Somethin'' Special feat. Yahzarah', 'http://freedownloads.last.fm/download/357049931/Somethin%2527%2BSpecial%2Bfeat.%2BYahzarah.mp3'),
(50, 200, 'Holding You, Loving You', 'http://freedownloads.last.fm/download/154605570/Holding%2BYou%252C%2BLoving%2BYou.mp3');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `tracks`
--
ALTER TABLE `tracks`
 ADD PRIMARY KEY (`track_id`), ADD KEY `artist_id` (`artist_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `tracks`
--
ALTER TABLE `tracks`
MODIFY `track_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=201;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tracks`
--
ALTER TABLE `tracks`
ADD CONSTRAINT `tracks_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
