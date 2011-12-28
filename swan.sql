-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2011 at 04:08 PM
-- Server version: 5.1.58
-- PHP Version: 5.3.6-13ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_message`
--

CREATE TABLE IF NOT EXISTS `admin_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `announce` varchar(50) DEFAULT 'no',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_message`
--

INSERT INTO `admin_message` (`id`, `message`, `username`, `announce`, `date`) VALUES
(1, 'test the message module', 'qays', 'no', '2011-12-28 06:53:55'),
(2, 'first test submit message', 'qays', 'no', '2011-12-28 07:54:36'),
(3, 'uploaded changes to github', 'qays', 'no', '2011-12-28 08:01:14');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `chapter_num` int(11) NOT NULL,
  `content` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `title`, `chapter_num`, `content`, `date`) VALUES
(3, 'Chapter One', 1, '<p>\n	A staff is made up of five horizontal lines and four spaces.</p>\n<p>\n	<img alt="staff" height="50" src="http://library.thinkquest.org/15413/media/images/blank-staff.gif" width="168" /></p>\n<p>\n	Pitches are named after the first seven letters of the alphabet (A B C D E F G).</p>\n<p>\n	<img alt="keyboard" height="120" src="http://library.thinkquest.org/15413/media/images/keyboard.gif" width="252" /></p>\n<p>\n	A clef is a musical symbol placed at the beginning of the staff that determines the letter names of the lines and spaces.</p>\n<p>\n	The two main clefs are the&nbsp;<i>treble</i>&nbsp;and the&nbsp;<i>bass</i>:<br />\n	<img alt="treble clef" height="135" src="http://library.thinkquest.org/15413/media/images/treble-labled.GIF" width="405" />&nbsp;<img alt="bass clef" height="135" src="http://library.thinkquest.org/15413/media/images/bass-labled.GIF" width="407" /></p>\n<p>\n	<br />\n	<br />\n	A grand staff is a combination of both the treble and bass clefs connected by a vertical line on the left side of the staves (plural staffs).</p>\n<p>\n	<img alt="grand-staff" height="120" src="http://library.thinkquest.org/15413/media/images/grand-staff.gif" width="423" /></p>\n<p>\n	Ledger Lines are an extension of the staff. They are additional lines both above and below which are parallel to the staff. Each ledger line contains one note.</p>\n<p>\n	&nbsp;</p>\n<table border="0" cellpadding="0" cellspacing="0" width="448">\n	<tbody>\n		<tr>\n			<td width="448">\n				<img align="left" alt="ledger lines" height="75" src="http://library.thinkquest.org/15413/media/images/treble-ledger-anim.gif" width="224" /><img align="right" alt="bass ledger lines" height="75" src="http://library.thinkquest.org/15413/media/images/bass-ledger-anim.gif" width="224" /><br />\n				&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n<p>\n	&nbsp;</p>\n', '2011-11-17 02:34:20'),
(4, 'Chapter Two', 2, '<p>\n	&nbsp;</p>\n<h2>\n	Note Values</h2>\n<p>\n	Each note has a specific duration.</p>\n<p>\n	<img alt="note values" height="312" src="http://library.thinkquest.org/15413/media/images/note_values.gif" width="306" /></p>\n<p>\n	<br />\n	<br />\n	<br />\n	<a name="meter"></a></p>\n<h2>\n	Meter</h2>\n<br />\n<p>\n	&nbsp;&nbsp;&nbsp;&nbsp;Meter is the regular recurring pattern of strong and weak beats of equal duration; also known as time. The meter or time signature in a musical composition is indicated by a fraction, and located at the beginning of a piece of music. The lower number of the fraction tells what kind of note receives one beat. The upper number tells how many beats are in a measure.</p>\n<p>\n	In Western music there are two types of meter, simple and compoud. In simple meter the upper number is either 2, 3, or 4. Each beat is subdivided by two.<img alt="Simple Meter" height="215" src="http://library.thinkquest.org/15413/media/images/meter1.gif" width="509" /></p>\n<p>\n	In compound meter the upper number is either 6,9, or 12. Each beat is a dotted note and subdivided into groups of three beats.</p>\n<p>\n	<img alt="Compound Meter" height="240" src="http://library.thinkquest.org/15413/media/images/meter2.gif" width="470" /></p>\n', '2011-11-17 02:52:17'),
(6, 'Chapter Three', 3, '<div>\n	<center>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><br />\n		<u>Intervals</u></a></center>\n	<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;An interval is the distance between two notes. Intervals are always counted from the lower note to the higher one, with the lower note being counted as one. Intervals come in different qualities and size. If the notes are sounded successively, it is a melodic interval. If sounded simultaneously, then it is a harmonic interval.</a>\n	<p>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The smallest interval used in Western music is the half step. A visual representation of a half step would be the distance between a consecutive white and black note on the piano. There are two exceptions to this rule, as two natural half steps occur between the notes E and F, and B and C.</a></p>\n	<p>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A whole step is the distance between two consecutive white or black keys. It is made up of two half steps.</a></p>\n	<p>\n		&nbsp;</p>\n	<center>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><img alt="Keyboard" height="177" src="http://library.thinkquest.org/15413/media/images/step_keyboard.gif" width="290" /></a></center>\n	<br />\n	<br />\n	<center>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><b><u>Qualities and Size</u></b></a></center>\n	<p>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">Intervals can be described as Major (M), Minor (m), Perfect (P), Augmented (A), and Diminished (d).</a></p>\n	<p>\n		<a name="intervals" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">Intervals come in various sizes: Unisons, Seconds, Thirds, Fourths, Fifths, Sixths, and Sevenths.</a></p>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		<a name="intervals">2nds, 3rds, 6ths, and 7ths can be found as Major and Minor.<br />\n		Unisons, 4ths, 5ths, and Octaves are Perfect.&nbsp;</a><a href="http://library.thinkquest.org/15413/media/midi/intervals1.mid">Listen</a></p>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		&nbsp;</p>\n	<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		<img alt="Staff" height="88" src="http://library.thinkquest.org/15413/media/images/staff_int.gif" width="447" /></center>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		When a major interval is raised by a half step, it becomes augmented.<br />\n		When a major interval is lowered by a half step, it becomes minor.<br />\n		When a major interval is lowered by two half steps, it becomes diminished.</p>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		When a minor interval is raised by a half step, it becomes major.<br />\n		When a minor interval is raised by two half steps, it becomes augmented.<br />\n		When a minor interval is lowered by a half step, it becomes diminished.</p>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		When a perfect interval is raised by a half step, it becomes augmented.<br />\n		When a perfect interval is lowered by a half step, it becomes diminished.</p>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		&nbsp;</p>\n	<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		<b><u>INVERSIONS OF INTERVALS</u></b></center>\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Intervals can be inverted, which basically means you turn them upside down. The lower note is raised up an octave so that the top note/bottom note relationship is reversed. The chart below shows the inversions of intervals.\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		&nbsp;</p>\n	<table border="0" cellpadding="0" cellspacing="0" width="560">\n		<tbody>\n			<tr>\n				<td>\n					<b><u>Qualities</u></b>\n					<ul type="disc">\n						<li>\n							Major becomes Minor</li>\n						<li>\n							Minor becomes Major</li>\n						<li>\n							Perfect remains Perfect</li>\n						<li>\n							Augmented becomes Diminished</li>\n						<li>\n							Diminished becomes Augmented</li>\n					</ul>\n				</td>\n				<td>\n					<b><u>Size</u></b>\n					<ul type="disc">\n						<li>\n							2 becomes 7</li>\n						<li>\n							3 becomes 6</li>\n						<li>\n							4 becomes 5</li>\n						<li>\n							5 becomes 4</li>\n						<li>\n							6 becomes 3</li>\n						<li>\n							7 becomes 2</li>\n					</ul>\n				</td>\n			</tr>\n		</tbody>\n	</table>\n	<br />\n	<u><b>Interval Identification</b></u><br />\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;It is important to be able to hear and identify intervals. This is a very important thing for musicians to do. Here is a list of familiar songs that will help you to identify the intervals.\n	<p>\n		&nbsp;</p>\n	<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n		&nbsp;</p>\n	<table border="1">\n		<tbody>\n			<tr>\n				<td>\n					m2- Stormy Weather</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/1.mid">m2</a></td>\n			</tr>\n			<tr>\n				<td>\n					M2- Happy Birthday</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/2.mid">M2</a></td>\n			</tr>\n			<tr>\n				<td>\n					m3- The Impossible Dream</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/3.mid">m3</a></td>\n			</tr>\n			<tr>\n				<td>\n					So Long, Farewell from The Sound of Music</td>\n				<td>\n					&nbsp;</td>\n			</tr>\n			<tr>\n				<td>\n					M3- Halls of Montezuma</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/4.mid">M3</a></td>\n			</tr>\n			<tr>\n				<td>\n					P4- Here comes the bride</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/5.mid">P4</a></td>\n			</tr>\n			<tr>\n				<td>\n					A4- Maria from West Side Story</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/6.mid">A4</a></td>\n			</tr>\n			<tr>\n				<td>\n					P5- Star Wars</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/7.mid">P5</a></td>\n			</tr>\n			<tr>\n				<td>\n					Twinkle, Twinkle, Little Star</td>\n				<td>\n					&nbsp;</td>\n			</tr>\n			<tr>\n				<td>\n					M6- NBC theme music</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/8.mid">M6</a></td>\n			</tr>\n			<tr>\n				<td>\n					m7- Somewhere from West Side Story</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/9.mid">m7</a></td>\n			</tr>\n			<tr>\n				<td>\n					M7- Bali Hai from South Pacific</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/10.mid">M7</a></td>\n			</tr>\n			<tr>\n				<td>\n					Octave- Over the rainbow\n					<p>\n						&nbsp;</p>\n				</td>\n				<td>\n					<a href="http://library.thinkquest.org/15413/media/midi/11.mid">Oct.</a></td>\n			</tr>\n		</tbody>\n	</table>\n	<p>\n		&nbsp;</p>\n</div>\n<p>\n	&nbsp;</p>\n', '2011-12-05 17:09:25'),
(7, 'Chapter Four', 4, '<center>\n	<p>\n		<a name="scales"><br />\n		<u>Scales</u></a></p>\n</center>\n<p>\n	<a name="scales" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are many different types of scales. They are the backbone of music.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="scales">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A major scale is a series of 8 consecutive notes that use the following pattern of half and whole steps:&nbsp;</a><a href="http://library.thinkquest.org/15413/media/midi/scale1.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<p>\n		<img alt="W W Â½ W W W Â½" height="115" src="http://library.thinkquest.org/15413/media/images/staff_step1.gif" width="447" /></p>\n	<p>\n		&nbsp;</p>\n</center>\n<p>\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Minor Scales come in three forms: Natural, Melodic, and Harmonic.</p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Natural Minor scales use the following pattern of half and whole steps:&nbsp;<a href="http://library.thinkquest.org/15413/media/midi/scale2.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="W Â½ W W Â½ W W" height="115" src="http://library.thinkquest.org/15413/media/images/step_keyboard2.gif" width="447" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Melodic Minor scales ascend and use the following pattern of half and whole steps. When descending, they do so in the natural minor form.&nbsp;<a href="http://library.thinkquest.org/15413/media/midi/scale3.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="W Â½ W W W W Â½       W Â½W W Â½ W W" height="300" src="http://library.thinkquest.org/15413/media/images/step_keyboard7.gif" width="447" /></center>\n<p>\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Harmonic Minor scales use the following pattern of half and whole steps:&nbsp;<a href="http://library.thinkquest.org/15413/media/midi/scale5.mid" style="font-family: ''Times New Roman''; font-size: medium; ">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="W Â½ W W Â½ W+ Â½  Â½" height="115" src="http://library.thinkquest.org/15413/media/images/step_keyboard3.gif" width="447" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chromatic Scales are made up entirely of half steps. When ascending, the scale uses sharps, when descending it uses flats.<a href="http://library.thinkquest.org/15413/media/midi/scale6.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="Chromatic scale" height="136" src="http://library.thinkquest.org/15413/media/images/chromatic.gif" width="555" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Whole Tone Scales differ from the other scales because it only has 6 tones. It uses the following pattern:&nbsp;<a href="http://library.thinkquest.org/15413/media/midi/scale7.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="W W W W W W" height="115" src="http://library.thinkquest.org/15413/media/images/step_keyboard4.gif" width="337" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A pentatonic Scale is a five-tone scale, which has its beginning in antiquity. There are traces of this scale in Oriental and American Indian music. This scale does not have a leading tone, which gives the scale it&#39;s unique sound. The scale has two forms. The first one uses the group of two black keys followed by three black keys. The pattern is as follows:&nbsp;<a href="http://library.thinkquest.org/15413/media/midi/scale8.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="W W+ Â½ W W" height="115" src="http://library.thinkquest.org/15413/media/images/step_keyboard5.gif" width="363" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; The second one used the group of three black keys followed by two black keys. The pattern is as follows:&nbsp;<a href="http://library.thinkquest.org/15413/media/midi/scale9.mid">Listen</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="W W W+Â½ W\n" height="115" src="http://library.thinkquest.org/15413/media/images/step_keyboard6.gif" width="363" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="keys"></a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="keys"><u><b>Key Signatures</b></u></a></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="keys">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; There are 15 major and 15 minor key signatures. The sharps or flats at the beginning of the staff indicate the main tone (diatonic) to which other tones are related.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="keys"></a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="keys"><img alt="Circle of 5ths" height="322" src="http://library.thinkquest.org/15413/media/images/circleof5ths.gif" width="300" /></a></center>\n<p>\n	<a name="keys" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><br />\n	<br />\n	<br />\n	Db-C#, Gb-F#, Cb-B, are enharmonic keys, meaning that they are written differently, but sound the same.</a></p>\n<p>\n	<a name="keys" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">There are 15 major and 15 minor key signatures. The sharps or flats at the beginning of the staff indicate the main tone (diatonic) to which other tones are related.</a></p>\n<p>\n	&nbsp;</p>\n<center>\n	<a name="keys" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><img alt="Key Signatures" height="311" src="http://library.thinkquest.org/15413/media/images/keys.gif" width="517" /></a></center>\n<p>\n	&nbsp;</p>\n<center>\n	<a name="keys" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><img alt="Relative Minor" height="311" src="http://library.thinkquest.org/15413/media/images/keys2.gif" width="517" /></a></center>\n', '2011-12-05 17:10:02'),
(8, 'Chapter Five', 5, '<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<h2>\n		Chords &amp; Symbols</h2>\n</center>\n<p>\n	<a name="triads" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "></a><u style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><b>Triad</b></u></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A triad is a group of three notes having a specific construction and relationship to one another. They are constructed on 3 consecutive lines or three consecutive spaces. Each member of the triad is separated by an interval of a third. The triad is composed of a Root, Third, and Fifth.</p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="Triad" height="130" src="http://library.thinkquest.org/15413/media/images/triad1.gif" width="200" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are four types of triads: major, minor, diminished and augmented.</p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	&nbsp;</p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<img alt="Major" height="118" src="http://library.thinkquest.org/15413/media/images/triad5.gif" width="167" /><img alt="Minor" height="118" src="http://library.thinkquest.org/15413/media/images/triad2.gif" width="167" /><img alt="Diminished" height="118" src="http://library.thinkquest.org/15413/media/images/triad3.gif" width="167" /><img alt="Augmented" height="118" src="http://library.thinkquest.org/15413/media/images/triad4.gif" width="167" /></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><b>Inversions of Triads</b></a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All triads have three positions that they can be arranged in. The root, 1st inversion, and 2nd inversion.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><u>Root Position Triad</u></a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the triad root is in the lowest voice then the triad is in Root Position.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""></a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><img alt="Root" height="118" src="http://library.thinkquest.org/15413/media/images/triad6.gif" width="167" /></a></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><u>1st Inversion Triad</u></a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the third of the triad is in the lowest voice the triad is the 1st inversion.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""></a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><img alt="1st Inversion" height="118" src="http://library.thinkquest.org/15413/media/images/triad7.gif" width="167" /></a></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><u>2nd Inversion Triad</u></a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;If the 5th of the triad is in the lowest voice, the triad is in the 2nd inversion.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""></a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""><img alt="2nd Inversion" height="118" src="http://library.thinkquest.org/15413/media/images/triad8.gif" width="167" /></a></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="inversions" u=""></a><a name="bass"><b><u>Figured Bass</u></b></a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Figured Bass was developed in the early Baroque period. It was a system of musical shorthand that made the writing of keyboard parts easier. It was customary for the composer to write out the bass line and to place Arabic numerals above or below the figured bass to indicate the harmonies. The keyboard part was called the continuo, which was improvised by the player.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In figured bass the Arabic numerals represent the intervals that sound above a given bass part. Certain abbreviations have become well known.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass"></a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<table border="0" cellpadding="0" cellspacing="0">\n		<tbody>\n			<tr>\n				<td>\n					<img alt="Figured Bass" height="154" src="http://library.thinkquest.org/15413/media/images/figbass1.gif" width="292" /></td>\n			</tr>\n			<tr>\n				<td>\n					<img alt="Figured Bass 2" height="154" src="http://library.thinkquest.org/15413/media/images/figbass2.gif" width="292" /></td>\n			</tr>\n			<tr>\n				<td>\n					<img alt="Figured Bass 3" height="154" src="http://library.thinkquest.org/15413/media/images/figbass3.gif" width="292" /></td>\n			</tr>\n		</tbody>\n	</table>\n	<a name="bass"></a></center>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass"><u>Alterations</u></a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Alterations from the given key signature are indicated by placing an accidental before the Arabic numeral.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;An accidental, such as a sharp, flat, or natural that appears by itself under a bass note indicates a triad in root position with the third interval above the bass note sharped, flatted or naturaled.</a></p>\n<p style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass">Any sharp, flat, or natural sign beside the Arabic number indicates that this interval above the bass note should be sharped, flatted, or naturaled depending on the symbol.</a></p>\n<center style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">\n	<a name="bass">#6,&nbsp;&nbsp; b6, &nbsp;&nbsp;6, &nbsp;&nbsp; #6<br />\n	&nbsp;&nbsp;4 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b4</a></center>\n<p>\n	<a name="bass" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><br />\n	Sometimes, composers used a slash through the Arabic number instead of a sharp. They both mean the same thing.</a></p>\n<p>\n	&nbsp;</p>\n<center>\n	&nbsp;</center>\n<p>\n	<a name="bass" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Roman Numeral Analysis</u></a></p>\n<p>\n	<a name="bass" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In the early 1800&#39;s, German composers started to use roman numerals to symbolize harmony. Each note in a scale can have a triad or chord built above it. Upper case (Major) and lower case (minor) Roman Numerals are used to indicate the type of chord. I, IV, V are major triads/chords, ii, iii, vi are minor triads/chords, and vii is diminished.</a></p>\n<p>\n	&nbsp;</p>\n<center>\n	<a name="bass" style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; "><img alt="Staff with Numerals" height="116" src="http://library.thinkquest.org/15413/media/images/romnum1.gif" width="478" /></a></center>\n<div>\n	&nbsp;</div>\n', '2011-12-05 17:18:30');

-- --------------------------------------------------------

--
-- Table structure for table `mainPages`
--

CREATE TABLE IF NOT EXISTS `mainPages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mainPages`
--

INSERT INTO `mainPages` (`id`, `title`, `content`, `date`) VALUES
(1, 'Frontpage', '<p>\n	<strong><span style="font-size:48px;"><span style="font-family:arial,helvetica,sans-serif;">Welcome To Theory 101</span></span></strong></p>\n<p>\n	<strong><span style="font-size:48px;"><span style="font-family:arial,helvetica,sans-serif;"><img alt="" src="/ckfinder/userfiles/images/modes.gif" style="width: 430px; height: 295px; " /></span></span></strong></p>\n<p>\n	<font class="Apple-style-span" face="arial, helvetica, sans-serif"><b>Music has many different fundamentals or elements. These include but are not limited to: pitch, beat or pulse, rhythm, melody, harmony, texture, allocation of voices, timbre or color, expressive qualities (dynamics and articulation), and form or structure. In addition to these &quot;fundamentals&quot; there are other important concepts employed in music both in&nbsp;<a href="http://en.wikipedia.org/wiki/Western_culture" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; " title="Western culture">Western</a>&nbsp;and non-Western cultures including &quot;Scales and/or Modes&quot; and &quot;Consonance vs. Dissonance.&quot;</b></font></p>\n', '2011-11-09 09:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter` int(11) NOT NULL,
  `question` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text,
  `d` text,
  `answer` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `chapter`, `question`, `a`, `b`, `c`, `d`, `answer`) VALUES
(2, 1, '<p>\n	What is a staff?</p>\n', '<p>\n	The sound of music</p>\n', '<p>\n	A musical symbol</p>\n', '<p>\n	Five horizontal lines and four spaces</p>\n', '<p>\n	An instrument</p>\n', 'c'),
(10, 1, '<p>\n	What is a clef?</p>\n', '<p>\n	The first seven letters of the alphabet</p>\n', '<p>\n	A musical symbol placed at the beginning of the staff that determines the letter names of the lines and spaces.</p>\n', '<p>\n	Pithces</p>\n', '<p>\n	A chord</p>\n', 'b'),
(11, 1, '<p>\n	<img alt="treble clef" height="135" src="http://library.thinkquest.org/15413/media/images/treble-labled.GIF" style="font-family: Cantarell, sans-serif; border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; font-size: 0px; color: transparent; vertical-align: middle; " width="405" /></p>\n<p>\n	What clef is the image above refering to?</p>\n', '<p>\n	Treble clef</p>\n', '<p>\n	Bass clef</p>\n', '<p>\n	Pitch</p>\n', '<p>\n	Staff</p>\n', 'a'),
(12, 1, '<p>\n	What are ledger lines?</p>\n', '<p>\n	Lines that are made up of five horizontal lines and four spaces.</p>\n', '<p>\n	A musical symbol placed at the beginning of the staff.</p>\n', '<p>\n	Combination of both the treble and bass clefs</p>\n', '<p>\n	An extension of the staff.</p>\n', 'd'),
(13, 2, '<p>\n	<img alt="musical_note_2_dennis_bo_01" src="http://www.public-domain-photos.com/free-cliparts-1/recreation/music/musical_note_2_dennis_bo_01.png" style="border-top-width: 0px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px; border-style: initial; border-color: initial; margin-top: 0px; margin-right: 0px; margin-bottom: 5px; margin-left: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 10px; text-align: center; " /></p>\n<p>\n	What is the note above?</p>\n', '<p>\n	Whole note</p>\n', '<p>\n	Half note</p>\n', '<p>\n	Quarter note</p>\n', '<p>\n	Eighth note</p>\n', 'd'),
(14, 2, '<p>\n	What is a meter?</p>\n', '<p>\n	The regular recurring pattern of strong and weak beats of equal duration; also known as time</p>\n', '<p>\n	It is a note value</p>\n', '<p>\n	It is a half note</p>\n', '<p>\n	It describes a duration of a note</p>\n', 'a'),
(15, 3, '<p>\n	What are intervals?</p>\n', '<p>\n	<span style="color: rgb(0, 0, 0); font-family: ''Times New Roman''; font-size: medium; ">Distance between two notes</span></p>\n<p>\n	&nbsp;</p>\n', '<p>\n	A duration of a note</p>\n', '<p>\n	A clef</p>\n', '<p>\n	An instrument</p>\n', 'a'),
(16, 3, '<p>\n	What is music?</p>\n', '<p>\n	A sport</p>\n', '<p>\n	A form of art</p>\n', '<p>\n	A subject</p>\n', '<p>\n	Sounds</p>\n', 'b'),
(17, 1, '<p>\n	This is a test question</p>\n', '<p>\n	Test answer</p>\n', '<p>\n	&nbsp;</p>\n<div>\n	<p>\n		Test answer</p>\n</div>\n<p>\n	&nbsp;</p>\n', '<p>\n	&nbsp;</p>\n<div>\n	<p>\n		Test answer</p>\n</div>\n<p>\n	&nbsp;</p>\n', '<p>\n	&nbsp;</p>\n<div>\n	<p>\n		Test answer</p>\n</div>\n<p>\n	&nbsp;</p>\n', 'c'),
(18, 2, '<p>\n	This is a test question</p>\n', '<p>\n	Test answer</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'a'),
(19, 2, '<p>\n	This is another test question</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'c'),
(20, 2, '<p>\n	Test</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'b'),
(21, 3, '<p>\n	To test function</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'd'),
(22, 3, '<p>\n	Check if the assess works</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'd'),
(23, 4, '<p>\n	What chapter 4 is about</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'a'),
(24, 4, '<p>\n	Looks like the functions work</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'A'),
(25, 4, '<p>\n	This is a test question</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', '<p>\n	Test answer</p>\n<p>\n	&nbsp;</p>\n', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_marks`
--

CREATE TABLE IF NOT EXISTS `quiz_marks` (
  `user_id` int(11) NOT NULL,
  `quiz_chapter` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_marks`
--

INSERT INTO `quiz_marks` (`user_id`, `quiz_chapter`, `total_question`, `marks`, `percentage`, `date`) VALUES
(16, 0, 1, 0, 0, '2011-12-09 20:52:32'),
(1, 1, 5, 3, 60, '2011-12-09 08:51:36'),
(16, 1, 5, 0, 0, '2011-12-09 20:52:42'),
(16, 1, 5, 3, 60, '2011-12-09 20:53:03'),
(16, 0, 1, 0, 0, '2011-12-09 20:53:17'),
(1, 2, 5, 5, 100, '2011-12-14 09:45:01'),
(1, 3, 5, 5, 100, '2011-12-14 09:45:26'),
(1, 4, 5, 5, 100, '2011-12-14 09:46:04'),
(16, 1, 5, 4, 80, '2011-12-14 19:34:18'),
(16, 2, 3, 2, 67, '2011-12-14 21:11:41'),
(16, 2, 3, 1, 33, '2011-12-14 21:12:20'),
(25, 1, 5, 3, 60, '2011-12-15 05:04:06'),
(25, 2, 3, 1, 33, '2011-12-15 05:04:27'),
(25, 0, 1, 0, 0, '2011-12-15 05:05:16'),
(25, 3, 2, 0, 0, '2011-12-15 05:05:59'),
(25, 0, 1, 0, 0, '2011-12-15 05:06:05'),
(1, 3, 2, 1, 50, '2011-12-15 07:38:33'),
(16, 2, 3, 0, 0, '2011-12-15 07:42:34'),
(16, 1, 5, 1, 20, '2011-12-15 07:42:48'),
(1, 2, 3, 0, 0, '2011-12-15 07:44:52'),
(1, 1, 4, 3, 60, '2011-12-15 07:51:27'),
(1, 1, 4, 1, 20, '2011-12-15 07:56:13'),
(1, 1, 4, 3, 60, '2011-12-15 07:58:57'),
(1, 1, 4, 4, 80, '2011-12-15 08:00:01'),
(1, 1, 4, 4, 100, '2011-12-15 08:00:39'),
(16, 0, 0, 0, 0, '2011-12-18 06:32:37'),
(25, 1, 4, 1, 25, '2011-12-21 16:32:24'),
(25, 1, 4, 2, 50, '2011-12-21 16:33:01'),
(25, 1, 4, 2, 50, '2011-12-21 16:33:52'),
(25, 1, 4, 1, 25, '2011-12-21 16:34:38'),
(25, 1, 4, 1, 25, '2011-12-21 16:34:58'),
(25, 1, 4, 2, 50, '2011-12-21 16:37:33'),
(25, 1, 4, 2, 50, '2011-12-21 16:38:00'),
(25, 1, 4, 1, 25, '2011-12-21 16:59:29'),
(25, 1, 4, 1, 25, '2011-12-21 17:01:21'),
(25, 1, 4, 1, 25, '2011-12-21 17:12:23'),
(25, 1, 4, 3, 75, '2011-12-21 17:13:43'),
(25, 2, 2, 1, 50, '2011-12-21 17:13:51'),
(1, 1, 4, 2, 50, '2011-12-22 04:02:57'),
(1, 1, 4, 3, 75, '2011-12-22 04:03:38'),
(1, 2, 2, 0, 0, '2011-12-22 04:04:10'),
(1, 0, 0, 0, 0, '2011-12-22 04:07:18'),
(16, 4, 3, 1, 33, '2011-12-22 04:19:27'),
(1, 3, 4, 1, 25, '2011-12-23 18:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `admin` varchar(4) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `admin`) VALUES
(1, 'qays', 'qazwsx', 'klipnov@gmail.com', 'yes'),
(12, 'testUser', 'testingzxc', 'asd@com.com.my', 'no'),
(14, 'zxczxc', 'zxcasd', 'as@wqe.com', 'no'),
(15, 'micha', 'asdjkl', 'asd@sdf.com', 'no'),
(16, 'hazley', 'qazwsx', 'hazley@hazley.com', 'yes'),
(24, 'tesing', 'asdjkl', 'asd@asd.com', 'no'),
(25, 'abc', 'aaaaa', 'angeline@mmu.edu.my', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson`
--

CREATE TABLE IF NOT EXISTS `user_lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_lesson`
--

INSERT INTO `user_lesson` (`id`, `title`, `content`, `user_id`, `username`, `date`) VALUES
(1, 'test', '<p>\n	ahha</p>\n', '1', 'qays', '2011-12-23 17:46:43'),
(2, 'test2', '<p>\n	test34</p>\n', '1', 'qays', '2011-12-23 17:55:41');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `content`, `date`) VALUES
(2, 'Video One', '<p>\n	<iframe allowfullscreen="" frameborder="0" height="480" src="http://www.youtube.com/embed/6gHEIF0rT2w?wmode=transparent" width="853"></iframe></p>\n', '2011-12-20 04:09:01'),
(3, 'Video Two', '\n	<iframe allowfullscreen="" frameborder="0" height="480" src="http://www.youtube.com/embed/TxBUnvrexhA?wmode=transparent" width="853"></iframe>\n', '2011-12-21 12:39:48'),
(4, 'Video Three', '\n	<iframe allowfullscreen="" frameborder="0" height="480" src="http://www.youtube.com/embed/7V6YgTa6DUI?wmode=Transparent" width="853"></iframe>\n', '2011-12-21 12:42:11'),
(5, 'Video Four', '\n	<iframe allowfullscreen="" frameborder="0" height="480" src="http://www.youtube.com/embed/CakZxWpkIg0?wmode=Transparent" width="640"></iframe>\n', '2011-12-21 12:42:52'),
(6, 'Video Five', '\n	<iframe allowfullscreen="" frameborder="0" height="480" src="http://www.youtube.com/embed/DOqQepiRRWM?wmode=Transparent" width="640"></iframe>\n', '2011-12-21 12:43:28');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
