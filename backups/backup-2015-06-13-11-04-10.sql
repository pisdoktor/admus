CREATE TABLE `adm_duyurular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` datetime NOT NULL,
  `metin` mediumtext NOT NULL,
  `group` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5;

CREATE TABLE `adm_ilceler` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `parent` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=224;

CREATE TABLE `adm_iller` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) TYPE=MyISAM AUTO_INCREMENT=82;

CREATE TABLE `adm_kurumlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `tipi` int(3) NOT NULL,
  `ilceid` int(11) NOT NULL,
  `adres` text NOT NULL,
  `telefon` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=8;

CREATE TABLE `adm_muayene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raporno` varchar(30) NOT NULL,
  `gonderenkurumid` int(11) NOT NULL,
  `gonderenuserid` int(3) NOT NULL,
  `gonderentarih` varchar(10) NOT NULL,
  `gonderenyazino` int(11) NOT NULL,
  `gondereneslikeden` varchar(200) NOT NULL,
  `gondereneslikedensicil` varchar(20) NOT NULL,
  `gonderennedeni` varchar(50) NOT NULL,
  `doldurankurumid` int(11) NOT NULL,
  `dolduranuserid` int(11) NOT NULL,
  `doldurantarih` varchar(20) NOT NULL,
  `dolduransaat` varchar(5) NOT NULL,
  `dolduranuygunortam` int(3) NOT NULL,
  `dolduranbulunankisi` int(3) NOT NULL,
  `dolduranelbiseler` int(3) NOT NULL,
  `gonderilentc` varchar(11) NOT NULL,
  `gonderilenadsoyad` varchar(100) NOT NULL,
  `gonderilenbabaadi` varchar(100) NOT NULL,
  `gonderilendogumyeri` varchar(100) NOT NULL,
  `gonderilendogumtarihi` varchar(10) NOT NULL,
  `gonderilencinsiyeti` int(1) NOT NULL,
  `gonderilenmeslegi` varchar(50) NOT NULL,
  `gonderilenoyku` text NOT NULL,
  `gonderilensikayetler` text NOT NULL,
  `gonderilenozgecmis` text NOT NULL,
  `gonderilenkons` int(3) NOT NULL,
  `gonderilenbulgular` text NOT NULL,
  `gonderilenbulgubolge` int(3) NOT NULL,
  `gonderilengeneldurum` int(3) NOT NULL,
  `gonderilenbilinc` int(3) NOT NULL,
  `gonderilentansiyon` varchar(10) NOT NULL,
  `gonderilennabiz` varchar(4) NOT NULL,
  `gonderilensolunum` int(3) NOT NULL,
  `gonderilenpupiller` int(3) NOT NULL,
  `gonderilenisikrefleksi` int(3) NOT NULL,
  `gonderilentendonrefleksi` int(3) NOT NULL,
  `gonderilensistemmuayenesi` int(3) NOT NULL,
  `gonderilensistembulgu` text NOT NULL,
  `gonderilenpsikiyatrik` text NOT NULL,
  `gonderilentetkikler` int(3) NOT NULL,
  `gonderilentetkiksonuc` text NOT NULL,
  `gonderilensonucdurum` int(3) NOT NULL,
  `gonderilensonuc` text NOT NULL,
  `gonderilensonucdurum2` int(3) NOT NULL,
  `gonderilenkurumid` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `raporno` (`raporno`)
) TYPE=MyISAM AUTO_INCREMENT=2;

CREATE TABLE `adm_muayenesebepleri` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=15;

CREATE TABLE `adm_sessions` (
  `userid` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `time` varchar(150) NOT NULL,
  `session` varchar(255) NOT NULL,
  `groupid` tinyint(3) NOT NULL,
  `access_type` varchar(8) NOT NULL,
  PRIMARY KEY (`session`)
) TYPE=MyISAM;

CREATE TABLE `adm_stats` (
  `agent` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `hits` int(11) NOT NULL
) TYPE=MyISAM;

CREATE TABLE `adm_usergroups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `folder` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=6;

CREATE TABLE `adm_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sicilno` varchar(50) NOT NULL,
  `groupid` int(8) NOT NULL,
  `kurumid` int(11) NOT NULL,
  `lastvisit` datetime NOT NULL,
  `nowvisit` datetime NOT NULL,
  `registerDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=7;

INSERT INTO `adm_duyurular` VALUES ('1', '2015-06-04 11:27:19', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.', '4');
INSERT INTO `adm_duyurular` VALUES ('2', '2015-06-04 13:55:49', 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli \'buraya metin gelecek, buraya metin gelecek\' yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır. Şu anda birçok masaüstü yayıncılık paketi ve web sayfa düzenleyicisi, varsayılan mıgır metinler olarak Lorem Ipsum kullanmaktadır. Ayrıca arama motorlarında \'lorem ipsum\' anahtar sözcükleri ile arama yapıldığında henüz tasarım aşamasında olan çok sayıda site listelenir. Yıllar içinde, bazen kazara, bazen bilinçli olarak (örneğin mizah katılarak), çeşitli sürümleri geliştirilmiştir.', '1');
INSERT INTO `adm_duyurular` VALUES ('3', '2015-06-04 13:59:26', 'Yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock, bir Lorem Ipsum pasajında geçen ve anlaşılması en güç sözcüklerden biri olan \'consectetur\' sözcüğünün klasik edebiyattaki örneklerini incelediğinde kesin bir kaynağa ulaşmıştır. Lorm Ipsum, Çiçero tarafından M.Ö. 45 tarihinde kaleme alınan \"de Finibus Bonorum et Malorum\" (İyi ve Kötünün Uç Sınırları) eserinin 1.10.32 ve 1.10.33 sayılı bölümlerinden gelmektedir. Bu kitap, ahlak kuramı üzerine bir tezdir ve Rönesans döneminde çok popüler olmuştur. Lorem Ipsum pasajının ilk satırı olan \"Lorem ipsum dolor sit amet\" 1.10.32 sayılı bölümdeki bir satırdan gelmektedir.', '2');
INSERT INTO `adm_duyurular` VALUES ('4', '2015-06-05 09:01:29', 'Lorem Ipsum pasajlarının birçok çeşitlemesi vardır. Ancak bunların büyük bir çoğunluğu mizah katılarak veya rastgele sözcükler eklenerek değiştirilmişlerdir. Eğer bir Lorem Ipsum pasajı kullanacaksanız, metin aralarına utandırıcı sözcükler gizlenmediğinden emin olmanız gerekir. İnternet\'teki tüm Lorem Ipsum üreteçleri önceden belirlenmiş metin bloklarını yineler. Bu da, bu üreteci İnternet üzerindeki gerçek Lorem Ipsum üreteci yapar. Bu üreteç, 200\'den fazla Latince sözcük ve onlara ait cümle yapılarını içeren bir sözlük kullanır. Bu nedenle, üretilen Lorem Ipsum metinleri yinelemelerden, mizahtan ve karakteristik olmayan sözcüklerden uzaktır.', '3');

INSERT INTO `adm_ilceler` VALUES ('1', '20', 'Merkezefendi');
INSERT INTO `adm_ilceler` VALUES ('2', '20', 'Pamukkale');
INSERT INTO `adm_ilceler` VALUES ('3', '20', 'Babadağ');
INSERT INTO `adm_ilceler` VALUES ('4', '20', 'Acıpayam');
INSERT INTO `adm_ilceler` VALUES ('5', '20', 'Baklan');
INSERT INTO `adm_ilceler` VALUES ('6', '20', 'Beyağaç');
INSERT INTO `adm_ilceler` VALUES ('7', '20', 'Bekilli');
INSERT INTO `adm_ilceler` VALUES ('8', '20', 'Buldan');
INSERT INTO `adm_ilceler` VALUES ('9', '20', 'Bozkurt');
INSERT INTO `adm_ilceler` VALUES ('10', '20', 'Çal');
INSERT INTO `adm_ilceler` VALUES ('11', '20', 'Çameli');
INSERT INTO `adm_ilceler` VALUES ('12', '20', 'Çardak');
INSERT INTO `adm_ilceler` VALUES ('13', '20', 'Çivril');
INSERT INTO `adm_ilceler` VALUES ('14', '20', 'Güney');
INSERT INTO `adm_ilceler` VALUES ('15', '20', 'Honaz');
INSERT INTO `adm_ilceler` VALUES ('16', '20', 'Kale');
INSERT INTO `adm_ilceler` VALUES ('17', '20', 'Sarayköy');
INSERT INTO `adm_ilceler` VALUES ('18', '20', 'Serinhisar');
INSERT INTO `adm_ilceler` VALUES ('19', '20', 'Tavas');
INSERT INTO `adm_ilceler` VALUES ('25', '1', 'Karaisalı');
INSERT INTO `adm_ilceler` VALUES ('24', '1', 'İmamoğlu');
INSERT INTO `adm_ilceler` VALUES ('23', '1', 'Feke');
INSERT INTO `adm_ilceler` VALUES ('22', '1', 'Çukurova');
INSERT INTO `adm_ilceler` VALUES ('21', '1', 'Ceyhan');
INSERT INTO `adm_ilceler` VALUES ('20', '1', 'Aladağ');
INSERT INTO `adm_ilceler` VALUES ('26', '1', 'Karataş');
INSERT INTO `adm_ilceler` VALUES ('27', '1', 'Kozan');
INSERT INTO `adm_ilceler` VALUES ('28', '1', 'Pozantı');
INSERT INTO `adm_ilceler` VALUES ('29', '1', 'Saimbeyli');
INSERT INTO `adm_ilceler` VALUES ('30', '1', 'Sarıçam');
INSERT INTO `adm_ilceler` VALUES ('31', '1', 'Seyhan');
INSERT INTO `adm_ilceler` VALUES ('32', '1', 'Tufanbeyli');
INSERT INTO `adm_ilceler` VALUES ('33', '1', 'Yumurtalık');
INSERT INTO `adm_ilceler` VALUES ('34', '1', 'Yüreğir');
INSERT INTO `adm_ilceler` VALUES ('35', '2', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('36', '2', 'Besni');
INSERT INTO `adm_ilceler` VALUES ('37', '2', 'Çelikhan');
INSERT INTO `adm_ilceler` VALUES ('38', '2', 'Gerger');
INSERT INTO `adm_ilceler` VALUES ('39', '2', 'Gölbaşı');
INSERT INTO `adm_ilceler` VALUES ('40', '2', 'Kahta');
INSERT INTO `adm_ilceler` VALUES ('41', '2', 'Samsat');
INSERT INTO `adm_ilceler` VALUES ('42', '2', 'Sincik');
INSERT INTO `adm_ilceler` VALUES ('43', '2', 'Tut');
INSERT INTO `adm_ilceler` VALUES ('44', '3', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('45', '3', 'Başmakçı');
INSERT INTO `adm_ilceler` VALUES ('46', '3', 'Bayat');
INSERT INTO `adm_ilceler` VALUES ('47', '3', 'Bolvadin');
INSERT INTO `adm_ilceler` VALUES ('48', '3', 'Çay');
INSERT INTO `adm_ilceler` VALUES ('49', '3', 'Çobanlar');
INSERT INTO `adm_ilceler` VALUES ('50', '3', 'Dazkırı');
INSERT INTO `adm_ilceler` VALUES ('51', '3', 'Dinar');
INSERT INTO `adm_ilceler` VALUES ('52', '3', 'Emirdağ');
INSERT INTO `adm_ilceler` VALUES ('53', '3', 'Evciler');
INSERT INTO `adm_ilceler` VALUES ('54', '3', 'Hocalar');
INSERT INTO `adm_ilceler` VALUES ('55', '3', 'İhsaniye');
INSERT INTO `adm_ilceler` VALUES ('56', '3', 'İscehisar');
INSERT INTO `adm_ilceler` VALUES ('57', '3', 'Kızılören');
INSERT INTO `adm_ilceler` VALUES ('58', '3', 'Sandıklı');
INSERT INTO `adm_ilceler` VALUES ('59', '3', 'Sinanpaşa');
INSERT INTO `adm_ilceler` VALUES ('60', '3', 'Sultandağı');
INSERT INTO `adm_ilceler` VALUES ('61', '3', 'Şuhut');
INSERT INTO `adm_ilceler` VALUES ('62', '4', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('63', '4', 'Diyadin');
INSERT INTO `adm_ilceler` VALUES ('64', '4', 'Doğubeyazıt');
INSERT INTO `adm_ilceler` VALUES ('65', '4', 'Eleşkirt');
INSERT INTO `adm_ilceler` VALUES ('66', '4', 'Hamur');
INSERT INTO `adm_ilceler` VALUES ('67', '4', 'Patnos');
INSERT INTO `adm_ilceler` VALUES ('68', '4', 'Taşlıçay');
INSERT INTO `adm_ilceler` VALUES ('69', '4', 'Tutak');
INSERT INTO `adm_ilceler` VALUES ('70', '68', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('71', '68', 'Ağaçören');
INSERT INTO `adm_ilceler` VALUES ('72', '68', 'Eskil');
INSERT INTO `adm_ilceler` VALUES ('73', '68', 'Gülağaç');
INSERT INTO `adm_ilceler` VALUES ('74', '68', 'Güzelyurt');
INSERT INTO `adm_ilceler` VALUES ('75', '68', 'Ortaköy');
INSERT INTO `adm_ilceler` VALUES ('76', '68', 'Sarıyahşi');
INSERT INTO `adm_ilceler` VALUES ('77', '5', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('78', '5', 'Göynücek');
INSERT INTO `adm_ilceler` VALUES ('79', '5', 'Gümüşhacıköy');
INSERT INTO `adm_ilceler` VALUES ('80', '5', 'Hamamözü');
INSERT INTO `adm_ilceler` VALUES ('81', '5', 'Merzifon');
INSERT INTO `adm_ilceler` VALUES ('82', '5', 'Suluova');
INSERT INTO `adm_ilceler` VALUES ('83', '5', 'Taşova');
INSERT INTO `adm_ilceler` VALUES ('84', '81', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('85', '81', 'Akçakoca');
INSERT INTO `adm_ilceler` VALUES ('86', '81', 'Cumayeri');
INSERT INTO `adm_ilceler` VALUES ('87', '81', 'Çilimli');
INSERT INTO `adm_ilceler` VALUES ('88', '81', 'Gölyaka');
INSERT INTO `adm_ilceler` VALUES ('89', '81', 'Gümüşova');
INSERT INTO `adm_ilceler` VALUES ('90', '81', 'Kaynaşlı');
INSERT INTO `adm_ilceler` VALUES ('91', '81', 'Yığılca');
INSERT INTO `adm_ilceler` VALUES ('92', '80', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('93', '80', 'Bahçe');
INSERT INTO `adm_ilceler` VALUES ('94', '80', 'Düziçi');
INSERT INTO `adm_ilceler` VALUES ('95', '80', 'Hasanbeyli');
INSERT INTO `adm_ilceler` VALUES ('96', '80', 'Kadirli');
INSERT INTO `adm_ilceler` VALUES ('97', '80', 'Sumbas');
INSERT INTO `adm_ilceler` VALUES ('98', '80', 'Toprakkale');
INSERT INTO `adm_ilceler` VALUES ('99', '79', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('100', '79', 'Elbeyli');
INSERT INTO `adm_ilceler` VALUES ('101', '79', 'Musabeyli');
INSERT INTO `adm_ilceler` VALUES ('102', '79', 'Polateli');
INSERT INTO `adm_ilceler` VALUES ('103', '78', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('104', '78', 'Eflani');
INSERT INTO `adm_ilceler` VALUES ('105', '78', 'Eskipazar');
INSERT INTO `adm_ilceler` VALUES ('106', '78', 'Ovacık');
INSERT INTO `adm_ilceler` VALUES ('107', '78', 'Safranbolu');
INSERT INTO `adm_ilceler` VALUES ('108', '78', 'Yenice');
INSERT INTO `adm_ilceler` VALUES ('109', '77', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('110', '77', 'Altınova');
INSERT INTO `adm_ilceler` VALUES ('111', '77', 'Armutlu');
INSERT INTO `adm_ilceler` VALUES ('112', '77', 'Çınarcık');
INSERT INTO `adm_ilceler` VALUES ('113', '77', 'Çiftlikköy');
INSERT INTO `adm_ilceler` VALUES ('114', '77', 'Termal');
INSERT INTO `adm_ilceler` VALUES ('115', '76', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('116', '76', 'Aralık');
INSERT INTO `adm_ilceler` VALUES ('117', '76', 'Karakoyunlu');
INSERT INTO `adm_ilceler` VALUES ('118', '76', 'Tuzluca');
INSERT INTO `adm_ilceler` VALUES ('119', '75', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('120', '75', 'Çıldır');
INSERT INTO `adm_ilceler` VALUES ('121', '75', 'Damal');
INSERT INTO `adm_ilceler` VALUES ('122', '75', 'Göle');
INSERT INTO `adm_ilceler` VALUES ('123', '75', 'Hanak');
INSERT INTO `adm_ilceler` VALUES ('124', '75', 'Posof');
INSERT INTO `adm_ilceler` VALUES ('125', '74', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('126', '74', 'Amasra');
INSERT INTO `adm_ilceler` VALUES ('127', '74', 'Kurucaşile');
INSERT INTO `adm_ilceler` VALUES ('128', '74', 'Ulus');
INSERT INTO `adm_ilceler` VALUES ('129', '73', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('130', '73', 'Beytüşşebap');
INSERT INTO `adm_ilceler` VALUES ('131', '73', 'Cizre');
INSERT INTO `adm_ilceler` VALUES ('132', '73', 'Güçlükonak');
INSERT INTO `adm_ilceler` VALUES ('133', '73', 'İdil');
INSERT INTO `adm_ilceler` VALUES ('134', '73', 'Silopi');
INSERT INTO `adm_ilceler` VALUES ('135', '73', 'Uludere');
INSERT INTO `adm_ilceler` VALUES ('136', '72', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('137', '72', 'Beşiri');
INSERT INTO `adm_ilceler` VALUES ('138', '72', 'Gercüş');
INSERT INTO `adm_ilceler` VALUES ('139', '72', 'Hasankeyf');
INSERT INTO `adm_ilceler` VALUES ('140', '72', 'Kozluk');
INSERT INTO `adm_ilceler` VALUES ('141', '72', 'Sason');
INSERT INTO `adm_ilceler` VALUES ('142', '71', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('143', '71', 'Bahşılı');
INSERT INTO `adm_ilceler` VALUES ('144', '71', 'Balışeyh');
INSERT INTO `adm_ilceler` VALUES ('145', '71', 'Çelebi');
INSERT INTO `adm_ilceler` VALUES ('146', '71', 'Delice');
INSERT INTO `adm_ilceler` VALUES ('147', '71', 'Karakeçili');
INSERT INTO `adm_ilceler` VALUES ('148', '71', 'Keskin');
INSERT INTO `adm_ilceler` VALUES ('149', '71', 'Sulakyurt');
INSERT INTO `adm_ilceler` VALUES ('150', '71', 'Yahşihan');
INSERT INTO `adm_ilceler` VALUES ('151', '70', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('152', '70', 'Ayrancı');
INSERT INTO `adm_ilceler` VALUES ('153', '70', 'Başyayla');
INSERT INTO `adm_ilceler` VALUES ('154', '70', 'Ermenek');
INSERT INTO `adm_ilceler` VALUES ('155', '70', 'Kazımkarabekir');
INSERT INTO `adm_ilceler` VALUES ('156', '70', 'Sarıveliler');
INSERT INTO `adm_ilceler` VALUES ('157', '69', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('158', '69', 'Aydıntepe');
INSERT INTO `adm_ilceler` VALUES ('159', '69', 'Demirözü');
INSERT INTO `adm_ilceler` VALUES ('162', '67', 'Çaycuma');
INSERT INTO `adm_ilceler` VALUES ('161', '67', 'Alaplı');
INSERT INTO `adm_ilceler` VALUES ('160', '67', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('163', '67', 'Devrek');
INSERT INTO `adm_ilceler` VALUES ('164', '67', 'Gökçebey');
INSERT INTO `adm_ilceler` VALUES ('165', '67', 'Kilimli');
INSERT INTO `adm_ilceler` VALUES ('166', '67', 'Kozlu');
INSERT INTO `adm_ilceler` VALUES ('167', '67', 'Ereğli');
INSERT INTO `adm_ilceler` VALUES ('168', '66', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('169', '66', 'Akdağmadeni');
INSERT INTO `adm_ilceler` VALUES ('170', '66', 'Aydıncık');
INSERT INTO `adm_ilceler` VALUES ('171', '66', 'Boğazlıyan');
INSERT INTO `adm_ilceler` VALUES ('172', '66', 'Çandır');
INSERT INTO `adm_ilceler` VALUES ('173', '66', 'Çayıralan');
INSERT INTO `adm_ilceler` VALUES ('174', '66', 'Çekerek');
INSERT INTO `adm_ilceler` VALUES ('175', '66', 'Kadışehri');
INSERT INTO `adm_ilceler` VALUES ('176', '66', 'Saraykent');
INSERT INTO `adm_ilceler` VALUES ('177', '66', 'Sarıkaya');
INSERT INTO `adm_ilceler` VALUES ('178', '66', 'Sorgun');
INSERT INTO `adm_ilceler` VALUES ('179', '66', 'Şefaatli');
INSERT INTO `adm_ilceler` VALUES ('180', '66', 'Yenifakılı');
INSERT INTO `adm_ilceler` VALUES ('181', '66', 'Yerköy');
INSERT INTO `adm_ilceler` VALUES ('182', '65', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('183', '65', 'Bahçesaray');
INSERT INTO `adm_ilceler` VALUES ('184', '65', 'Başkale');
INSERT INTO `adm_ilceler` VALUES ('185', '65', 'Çaldıran');
INSERT INTO `adm_ilceler` VALUES ('186', '65', 'Çatak');
INSERT INTO `adm_ilceler` VALUES ('187', '65', 'Edremit');
INSERT INTO `adm_ilceler` VALUES ('188', '65', 'Erciş');
INSERT INTO `adm_ilceler` VALUES ('189', '65', 'Gevaş');
INSERT INTO `adm_ilceler` VALUES ('190', '65', 'Gürpınar');
INSERT INTO `adm_ilceler` VALUES ('191', '65', 'İpekyolu');
INSERT INTO `adm_ilceler` VALUES ('192', '65', 'Muradiye');
INSERT INTO `adm_ilceler` VALUES ('193', '65', 'Özalp');
INSERT INTO `adm_ilceler` VALUES ('194', '65', 'Saray');
INSERT INTO `adm_ilceler` VALUES ('195', '65', 'Tuşba');
INSERT INTO `adm_ilceler` VALUES ('196', '64', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('197', '64', 'Banaz');
INSERT INTO `adm_ilceler` VALUES ('198', '64', 'Eşme');
INSERT INTO `adm_ilceler` VALUES ('199', '64', 'Karahallı');
INSERT INTO `adm_ilceler` VALUES ('200', '64', 'Sivaslı');
INSERT INTO `adm_ilceler` VALUES ('201', '64', 'Ulubey');
INSERT INTO `adm_ilceler` VALUES ('202', '63', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('203', '63', 'Akçakale');
INSERT INTO `adm_ilceler` VALUES ('204', '63', 'Birecik');
INSERT INTO `adm_ilceler` VALUES ('205', '63', 'Bozova');
INSERT INTO `adm_ilceler` VALUES ('206', '63', 'Ceylanpınar');
INSERT INTO `adm_ilceler` VALUES ('207', '63', 'Eyyübiye');
INSERT INTO `adm_ilceler` VALUES ('208', '63', 'Halfeti');
INSERT INTO `adm_ilceler` VALUES ('209', '63', 'Haliliye');
INSERT INTO `adm_ilceler` VALUES ('210', '63', 'Harran');
INSERT INTO `adm_ilceler` VALUES ('211', '63', 'Hilvan');
INSERT INTO `adm_ilceler` VALUES ('212', '63', 'Karaköprü');
INSERT INTO `adm_ilceler` VALUES ('213', '63', 'Siverek');
INSERT INTO `adm_ilceler` VALUES ('214', '63', 'Suruç');
INSERT INTO `adm_ilceler` VALUES ('215', '63', 'Viranşehir');
INSERT INTO `adm_ilceler` VALUES ('216', '62', 'Merkez');
INSERT INTO `adm_ilceler` VALUES ('217', '62', 'Çemişgezek');
INSERT INTO `adm_ilceler` VALUES ('218', '62', 'Hozat');
INSERT INTO `adm_ilceler` VALUES ('219', '62', 'Mazgirt');
INSERT INTO `adm_ilceler` VALUES ('220', '62', 'Nazimiye');
INSERT INTO `adm_ilceler` VALUES ('221', '62', 'Ovacık');
INSERT INTO `adm_ilceler` VALUES ('222', '62', 'Pertek');
INSERT INTO `adm_ilceler` VALUES ('223', '62', 'Pülümür');

INSERT INTO `adm_iller` VALUES ('1', 'Adana');
INSERT INTO `adm_iller` VALUES ('2', 'Adıyaman');
INSERT INTO `adm_iller` VALUES ('3', 'Afyonkarahisar');
INSERT INTO `adm_iller` VALUES ('4', 'Ağrı');
INSERT INTO `adm_iller` VALUES ('5', 'Amasya');
INSERT INTO `adm_iller` VALUES ('6', 'Ankara');
INSERT INTO `adm_iller` VALUES ('7', 'Antalya');
INSERT INTO `adm_iller` VALUES ('8', 'Artvin');
INSERT INTO `adm_iller` VALUES ('9', 'Aydın');
INSERT INTO `adm_iller` VALUES ('10', 'Balıkesir');
INSERT INTO `adm_iller` VALUES ('11', 'Bilecik');
INSERT INTO `adm_iller` VALUES ('12', 'Bingöl');
INSERT INTO `adm_iller` VALUES ('13', 'Bitlis');
INSERT INTO `adm_iller` VALUES ('14', 'Bolu');
INSERT INTO `adm_iller` VALUES ('15', 'Burdur');
INSERT INTO `adm_iller` VALUES ('16', 'Bursa');
INSERT INTO `adm_iller` VALUES ('17', 'Çanakkale');
INSERT INTO `adm_iller` VALUES ('18', 'Çankırı');
INSERT INTO `adm_iller` VALUES ('19', 'Çorum');
INSERT INTO `adm_iller` VALUES ('20', 'Denizli');
INSERT INTO `adm_iller` VALUES ('21', 'Diyarbakır');
INSERT INTO `adm_iller` VALUES ('22', 'Edirne');
INSERT INTO `adm_iller` VALUES ('23', 'Elazığ');
INSERT INTO `adm_iller` VALUES ('24', 'Erzincan');
INSERT INTO `adm_iller` VALUES ('25', 'Erzurum');
INSERT INTO `adm_iller` VALUES ('26', 'Eskişehir');
INSERT INTO `adm_iller` VALUES ('27', 'Gaziantep');
INSERT INTO `adm_iller` VALUES ('28', 'Giresun');
INSERT INTO `adm_iller` VALUES ('29', 'Gümüşhane');
INSERT INTO `adm_iller` VALUES ('30', 'Hakkari');
INSERT INTO `adm_iller` VALUES ('31', 'Hatay');
INSERT INTO `adm_iller` VALUES ('32', 'Isparta');
INSERT INTO `adm_iller` VALUES ('33', 'Mersin');
INSERT INTO `adm_iller` VALUES ('34', 'İstanbul');
INSERT INTO `adm_iller` VALUES ('35', 'İzmir');
INSERT INTO `adm_iller` VALUES ('36', 'Kars');
INSERT INTO `adm_iller` VALUES ('37', 'Kastamonu');
INSERT INTO `adm_iller` VALUES ('38', 'Kayseri');
INSERT INTO `adm_iller` VALUES ('39', 'Kırklareli');
INSERT INTO `adm_iller` VALUES ('40', 'Kırşehir');
INSERT INTO `adm_iller` VALUES ('41', 'Kocaeli');
INSERT INTO `adm_iller` VALUES ('42', 'Konya');
INSERT INTO `adm_iller` VALUES ('43', 'Kütahya');
INSERT INTO `adm_iller` VALUES ('44', 'Malatya');
INSERT INTO `adm_iller` VALUES ('45', 'Manisa');
INSERT INTO `adm_iller` VALUES ('46', 'Kahramanmaraş');
INSERT INTO `adm_iller` VALUES ('47', 'Mardin');
INSERT INTO `adm_iller` VALUES ('48', 'Muğla');
INSERT INTO `adm_iller` VALUES ('49', 'Muş');
INSERT INTO `adm_iller` VALUES ('50', 'Nevşehir');
INSERT INTO `adm_iller` VALUES ('51', 'Niğde');
INSERT INTO `adm_iller` VALUES ('52', 'Ordu');
INSERT INTO `adm_iller` VALUES ('53', 'Rize');
INSERT INTO `adm_iller` VALUES ('54', 'Sakarya');
INSERT INTO `adm_iller` VALUES ('55', 'Samsun');
INSERT INTO `adm_iller` VALUES ('56', 'Siirt');
INSERT INTO `adm_iller` VALUES ('57', 'Sinop');
INSERT INTO `adm_iller` VALUES ('58', 'Sivas');
INSERT INTO `adm_iller` VALUES ('59', 'Tekirdağ');
INSERT INTO `adm_iller` VALUES ('60', 'Tokat');
INSERT INTO `adm_iller` VALUES ('61', 'Trabzon');
INSERT INTO `adm_iller` VALUES ('62', 'Tunceli');
INSERT INTO `adm_iller` VALUES ('63', 'Şanlıurfa');
INSERT INTO `adm_iller` VALUES ('64', 'Uşak');
INSERT INTO `adm_iller` VALUES ('65', 'Van');
INSERT INTO `adm_iller` VALUES ('66', 'Yozgat');
INSERT INTO `adm_iller` VALUES ('67', 'Zonguldak');
INSERT INTO `adm_iller` VALUES ('68', 'Aksaray');
INSERT INTO `adm_iller` VALUES ('69', 'Bayburt');
INSERT INTO `adm_iller` VALUES ('70', 'Karaman');
INSERT INTO `adm_iller` VALUES ('71', 'Kırıkkale');
INSERT INTO `adm_iller` VALUES ('72', 'Batman');
INSERT INTO `adm_iller` VALUES ('73', 'Şırnak');
INSERT INTO `adm_iller` VALUES ('74', 'Bartın');
INSERT INTO `adm_iller` VALUES ('75', 'Ardahan');
INSERT INTO `adm_iller` VALUES ('76', 'Iğdır');
INSERT INTO `adm_iller` VALUES ('77', 'Yalova');
INSERT INTO `adm_iller` VALUES ('78', 'Karabük');
INSERT INTO `adm_iller` VALUES ('79', 'Kilis');
INSERT INTO `adm_iller` VALUES ('80', 'Osmaniye');
INSERT INTO `adm_iller` VALUES ('81', 'Düzce');

INSERT INTO `adm_kurumlar` VALUES ('1', 'Babadağ Toplum Sağlığı Merkezi', '1', '3', 'Hacı Mehmet Zorlu Cad. No:61 Babadağ Denizli', '0 (258) 481 20 06');
INSERT INTO `adm_kurumlar` VALUES ('2', 'Pamukkale Toplum Sağlığı Merkezi', '1', '2', '', '');
INSERT INTO `adm_kurumlar` VALUES ('3', 'BABADAĞ İLÇE EMNİYET AMİRLİĞİ', '2', '3', '', '0 (258) 481 20 00');
INSERT INTO `adm_kurumlar` VALUES ('4', 'Sarayköy Cumhuriyet Savcılığı', '3', '17', '', '0 (258) 222 22 22');
INSERT INTO `adm_kurumlar` VALUES ('5', 'Aladağ Toplum Sağlığı Merkezi', '1', '20', '', '');
INSERT INTO `adm_kurumlar` VALUES ('6', 'Merkezefendi Toplum Sağlığı Merkezi', '1', '1', '', '');
INSERT INTO `adm_kurumlar` VALUES ('7', 'Babadağ İlçe Jandarma Komutanlığı', '2', '3', '', '');

INSERT INTO `adm_muayene` VALUES ('1', '', '3', '5', '12-06-2015', '12', 'Test Edici', 'T1234567', '2,1', '2', '0', '', '', '0', '0', '0', '40090105582', 'SONER EKİCİ', 'SELAHATTİN', 'DENİZLİ', '30-07-1981', '1', 'DOKTOR', '', '', '', '0', '', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '', '', '0', '', '0', '', '0', '4');

INSERT INTO `adm_muayenesebepleri` VALUES ('1', 'Darp - Cebir');
INSERT INTO `adm_muayenesebepleri` VALUES ('2', 'Alkol Muayenesi');
INSERT INTO `adm_muayenesebepleri` VALUES ('3', 'Trafik Kazası');
INSERT INTO `adm_muayenesebepleri` VALUES ('4', 'Besin Zehirlenmesi');
INSERT INTO `adm_muayenesebepleri` VALUES ('5', 'Ateşli Silah Yaralanması');
INSERT INTO `adm_muayenesebepleri` VALUES ('6', 'Kesici-Delici Alet Yaralanması');
INSERT INTO `adm_muayenesebepleri` VALUES ('7', 'Düşme');
INSERT INTO `adm_muayenesebepleri` VALUES ('8', 'İntihar Girişimi');
INSERT INTO `adm_muayenesebepleri` VALUES ('9', 'Karbonmonoksit Zehirlenmesi');
INSERT INTO `adm_muayenesebepleri` VALUES ('10', 'Elektrik Çarpması');
INSERT INTO `adm_muayenesebepleri` VALUES ('11', 'İlaç Zehirlenmesi');
INSERT INTO `adm_muayenesebepleri` VALUES ('12', 'Yabancı Cisim Yutma');
INSERT INTO `adm_muayenesebepleri` VALUES ('13', 'Yanık');
INSERT INTO `adm_muayenesebepleri` VALUES ('14', 'Diğer');

INSERT INTO `adm_sessions` VALUES ('1', 'admin', '1434186249', '4d5222375088fc91b52546435f8a1b43', '1', 'admin');

INSERT INTO `adm_stats` VALUES ('Mozilla Firefox 38.0', '0', '4');
INSERT INTO `adm_stats` VALUES ('Windows 8.1', '1', '4');
INSERT INTO `adm_stats` VALUES ('LAPTOP', '2', '4');

INSERT INTO `adm_usergroups` VALUES ('1', 'Admin', 'admin');
INSERT INTO `adm_usergroups` VALUES ('2', 'Doktor', 'site/doktor');
INSERT INTO `adm_usergroups` VALUES ('3', 'Kolluk', 'site/kolluk');
INSERT INTO `adm_usergroups` VALUES ('4', 'Savcılık', 'site/savcilik');
INSERT INTO `adm_usergroups` VALUES ('5', 'İl Yöneticisi', 'admin');

INSERT INTO `adm_users` VALUES ('1', 'Soner Ekici', 'admin', '1796dcaa1dcfb34b545d491c11d15d3b:jHYuDPc2BvZ9XFgt', 'admin@admin.com', 'DR115547', '1', '1', '2015-06-12 09:55:27', '2015-06-13 11:04:00', '2015-06-03 00:00:00');
INSERT INTO `adm_users` VALUES ('2', 'Kolluk', 'kolluk', '69605f4572895b0ef169edaab0db1576:SVDjUR4bcyOmA5O5', 'kolluk@kolluk.com', 'K123456', '3', '3', '0000-00-00 00:00:00', '2015-06-04 13:49:35', '2015-06-04 13:47:10');
INSERT INTO `adm_users` VALUES ('3', 'İl Yöneticisi', 'iladmin', '7bba26d82222ca236d5f8f309ca8d9b5:wfLM3bPrVb3oY52s', 'iladmin@iladmin.com', '', '5', '1', '2015-06-06 00:50:03', '2015-06-09 10:23:20', '2015-06-05 11:20:36');
INSERT INTO `adm_users` VALUES ('4', 'Doktor', 'doktor', 'f8d4e18fe0beb0c9c6b6b0fe4f44b7d5:ln4rrfFzvjytIMG9', 'doktor@do.com', '', '2', '2', '2015-06-13 09:07:04', '2015-06-13 11:03:47', '2015-06-05 11:21:04');
INSERT INTO `adm_users` VALUES ('5', 'Kolluk Test', 'test', 'e71b08ff59cfa34b4de5f4553a69b73b:CB4DdfXt1jCRx371', 'test@yrtd.com', '', '3', '3', '2015-06-12 10:21:50', '2015-06-13 09:05:02', '2015-06-05 11:51:13');
INSERT INTO `adm_users` VALUES ('6', 'Deneme', '40090105582', '32f0d1095cf73ae9b85cdd803996ade7:ZBb6h3mvSoeClHAC', 'sonerekici@gmail.com', 'DR115547', '2', '1', '2015-06-06 00:26:13', '2015-06-08 19:20:12', '2015-06-06 00:25:35');

