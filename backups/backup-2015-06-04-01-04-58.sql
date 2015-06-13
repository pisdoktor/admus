CREATE TABLE `adm_duyurular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tarih` datetime NOT NULL,
  `metin` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2;

CREATE TABLE `adm_ilceler` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `parent` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) TYPE=MyISAM AUTO_INCREMENT=77;

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
) TYPE=MyISAM AUTO_INCREMENT=3;

CREATE TABLE `adm_muayene` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raporno` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

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
  `name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5;

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
) TYPE=MyISAM AUTO_INCREMENT=2;

INSERT INTO `adm_duyurular` VALUES ('1', '2015-06-04 11:27:19', 'Lorem Ipsum, dizgi ve baskı endüstrisinde kullanılan mıgır metinlerdir. Lorem Ipsum, adı bilinmeyen bir matbaacının bir hurufat numune kitabı oluşturmak üzere bir yazı galerisini alarak karıştırdığı 1500\'lerden beri endüstri standardı sahte metinler olarak kullanılmıştır. Beşyüz yıl boyunca varlığını sürdürmekle kalmamış, aynı zamanda pek değişmeden elektronik dizgiye de sıçramıştır. 1960\'larda Lorem Ipsum pasajları da içeren Letraset yapraklarının yayınlanması ile ve yakın zamanda Aldus PageMaker gibi Lorem Ipsum sürümleri içeren masaüstü yayıncılık yazılımları ile popüler olmuştur.');

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

INSERT INTO `adm_kurumlar` VALUES ('1', 'Babadağ Toplum Sağlığı Merkezi', '0', '3', 'Hacı Mehmet Zorlu Cad. No:61 Babadağ Denizli', '481 20 00');
INSERT INTO `adm_kurumlar` VALUES ('2', 'Pamukkale Toplum Sağlığı Merkezi', '0', '2', '', '');


INSERT INTO `adm_sessions` VALUES ('1', 'admin', '1433415898', '08bd9339a5f13ab3f96bf5acfb29fa31', '1', 'admin');


INSERT INTO `adm_usergroups` VALUES ('1', 'Admin');
INSERT INTO `adm_usergroups` VALUES ('2', 'Doktor');
INSERT INTO `adm_usergroups` VALUES ('3', 'Kolluk');
INSERT INTO `adm_usergroups` VALUES ('4', 'Savcılık');

INSERT INTO `adm_users` VALUES ('1', 'Soner Ekici', 'admin', '1796dcaa1dcfb34b545d491c11d15d3b:jHYuDPc2BvZ9XFgt', 'admin@admin.com', 'DR115547', '1', '1', '2015-06-04 10:19:52', '2015-06-04 10:54:37', '2015-06-03 00:00:00');

