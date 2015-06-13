<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );  

function siteMenu() {
	global $my;
	?>
<div id="cssmenu">
<ul>
<li><a href="<?php echo SITEURL;?>"><span>Anasayfa</span></a></li>
<?php
	// doktorlara özel menü yapalım
	if ($my->groupid == 2) {
?>
<li><a href="index.php?option=site&bolum=gelen"><span>İstekler</span></a></li>
<li><a href="index.php?option=site&bolum=listele"><span>Formlar</span></a></li>
<?php
	}
	
	//kolluklara özel menü yapalım
	if ($my->groupid == 3) {
?>
<li><a href="index.php?option=site&bolum=verigiris"><span>Yeni İstek</span></a></li>
<li><a href="index.php?option=site&bolum=liste"><span>İsteklerim</span></a></li>
<?php		
	}
	
	//savcılara özel menü yapalım
	if ($my->groupid == 4) {
?>
<li><a href="index.php?option=site&bolum=goster"><span>Gelen Formlar</span></a></li>
<?php		
	}
?>
<li><a href="index.php?option=site&bolum=hesap"><span>Bilgilerim</span></a></li>
<li><a href="index.php?option=logout"><span>Çıkış Yap</span></a></li>
</ul>
</div>
<?php    
}

function loadSiteModule() {
	global $option, $bolum, $task;
	global $id, $cid;
	global $limit, $limitstart;
	global $mainframe, $my, $mosmsg;
	
	switch($option) {
	default:
	UserPanel();
	loadDuyuru();
	break;
	
	case 'site':
	if ($bolum) {
	include_once(ABSPATH. '/site/modules/'.$bolum.'/index.php');
	} else {
		mosRedirect('index.php');
	}
	break;
	
	case 'barkod':
	loadBarkod($text);
	break;
	}
	
}

function loadDuyuru() {
	global $dbase, $my;
	
	$where = " WHERE `group` = '1' OR `group` = ".$dbase->Quote($my->groupid);
	
	$query = "SELECT * FROM #__duyurular"
	. $where
	. "\n ORDER BY tarih ASC";
	
	$dbase->setQuery($query);
	$rows = $dbase->loadObjectList();
	
?>
<div id="duyurular">
<h3><span> Son Duyurular</span></h3>
<?php
$t = 1;
	foreach ($rows as $row) {
		?>
		<div class="duyuru<?php echo $t;?>">
		<div class="duyuru-tarih">
		<strong>Duyuru Tarihi:</strong> <?php echo mosFormatDate($row->tarih, '%d-%m-%Y %H:%M:%S');?>
		</div>
		<div class="duyuru-metin">
		<?php echo $row->metin;?>
		</div>
		</div>
		<?php
		$t = 1 - $t;
	}
?>
</div>
<?php
	
}

function UserPanel() {
	global $my;
	
	$lastvisit = ($my->lastvisit == '0000-00-00 00:00:00') ? 'İlk Defa Giriş Yaptınız' : mosFormatDate($my->lastvisit, '%d-%m-%Y %H:%M:%S');
	
	echo '<div id="welcome">';
	echo '<span><center><strong>Hoşgeldiniz '.$my->name.'</strong></center></span><br />';
	echo '<span><strong><u>Kurumunuz:</u></strong><br />'. $my->kurumadi.'</span><br /><br />';
	echo '<span><strong><u>Kullanıcı Grubunuz:</u></strong><br />'.$my->usergroup.'</span><br /><br />';
	echo '<span><strong><u>Son Giriş Zamanı:</u></strong><br />'. $lastvisit.'</span>';
	echo '</div>';
}


function createBarkod($text) {
	// Including all required classes
require_once(ABSPATH.'/includes/barkod/class/BCGFontFile.php');
require_once(ABSPATH.'/includes/barkod/class/BCGColor.php');
require_once(ABSPATH.'/includes/barkod/class/BCGDrawing.php');

// Including the barcode technology
require_once(ABSPATH.'/includes/barkod/class/BCGcode128.barcode.php');

// Loading Font
$font = new BCGFontFile(ABSPATH.'/includes/barkod/font/DroidSans.ttf', 8);

// The arguments are R, G, B for color.
$color_black = new BCGColor(0, 0, 0);
$color_white = new BCGColor(255, 255, 255);

$drawException = null;
try {
	$code = new BCGcode128();
	$code->setScale(2); // Resolution
	$code->setThickness(30); // Thickness
	$code->setForegroundColor($color_black); // Color of bars
	$code->setBackgroundColor($color_white); // Color of spaces
	$code->setFont($font); // Font (or 0)
	$code->parse($text); // Text
} catch(Exception $exception) {
	$drawException = $exception;
}

$drawing = new BCGDrawing(ABSPATH.'/barkod/'.$text.'.png', $color_white);
if($drawException) {
	$drawing->drawException($drawException);
} else {
	$drawing->setBarcode($code);
	$drawing->setRotationAngle(0); // 0, 90, 180, 270
	$drawing->setDPI(72); //72 ile 300 arası
	$drawing->draw();
}

// Draw (or save) the image into PNG format.
$drawing->finish(BCGDrawing::IMG_FORMAT_PNG);
}