<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

function loadAdminModule() {
	global $option, $bolum, $task;
	global $id, $cid;
	global $limit, $limitstart;
	global $mainframe, $my, $mosmsg;
	
	switch($option) {
	default:
	adminFrontPage();
	break;
	
	case 'yonetim':
	if ($bolum) {
	include_once(ABSPATH. '/admin/modules/'.$bolum.'/index.php');
	} else {
		mosRedirect('index.php');
	}
	break;
	}
}

function adminFrontPage() {
	AdminUserPanel();
	AdminMenuPanel();
}

function adminMenu() {
	global $my;
	?>
<div id="cssmenu">
<ul>
<li><a href="<?php echo SITEURL;?>"><span>Anasayfa</span></a></li>
<li class="has-sub"><a href="#">Yönetim</a><ul>
<?php if ($my->groupid == '1') {?>
<li><a href="index.php?option=yonetim&bolum=duyuru"><span>Duyuru Yönetimi</span></a></li>
<li><a href="index.php?option=yonetim&bolum=grup"><span>Grup Yönetimi</span></a></li>
<li><a href="index.php?option=yonetim&bolum=il"><span>İl Yönetimi</span></a></li>
<li><a href="index.php?option=yonetim&bolum=ilce"><span>İlçe Yönetimi</span></a></li>
<?php } ?>


<li><a href="index.php?option=yonetim&bolum=kullanici"><span>Kullanıcı Yönetimi</span></a></li>
<li><a href="index.php?option=yonetim&bolum=kurum"><span>Kurum Yönetimi</span></a></li>
<li><a href="index.php?option=yonetim&bolum=muayene"><span>Muayene Yönetimi</span></a></li>
<li><a href="index.php?option=yonetim&bolum=sebep"><span>Sebep Yönetimi</span></a></li>

</ul>
</li>
<?php if ($my->groupid == '1') {?>
<li><a href="index.php?option=yonetim&bolum=ayarlar"><span>Ayarlar</span></a></li>
<li><a href="index.php?option=yonetim&bolum=db"><span>Veritabanı Bakımı</span></a></li>
<?php } ?>
<li><a href="index.php?option=logout"><span>Çıkış Yap</span></a></li>
</ul>
</div>
	<?php
}

function AdminMenuPanel() {
	global $my;
	
	if ($my->groupid == '1') {
	echo quickiconButton('index.php?option=yonetim&bolum=duyuru', 'duyuru.png', 'Duyuru Yönetimi');  
	echo quickiconButton('index.php?option=yonetim&bolum=il', 'ilce.png', 'İl Yönetimi');  
	echo quickiconButton('index.php?option=yonetim&bolum=ilce', 'ilce.png', 'İlçe Yönetimi');
	echo quickiconButton('index.php?option=yonetim&bolum=db', 'veri.png', 'Veritabanı Bakımı');
	echo quickiconButton('index.php?option=yonetim&bolum=ayarlar', 'config.png', 'Ayarlar');
	}
	echo quickiconButton('index.php?option=yonetim&bolum=kullanici', 'kullanici.png', 'Kullanıcı Yönetimi');
	echo quickiconButton('index.php?option=yonetim&bolum=kurum', 'kurum.png', 'Kurum Yönetimi');
	echo quickiconButton('index.php?option=yonetim&bolum=muayene', 'form.png', 'Muayene Yönetimi');
	
}

function quickiconButton( $link, $image, $text ) {
?>
<div class="quickicon">
<span>
<a href="<?php echo $link; ?>">
<img src="<?php echo SITEURL;?>/images/<?php echo $image;?>" alt="<?php echo $text;?>" title="<?php echo $text;?>" border="0" /><br /><?php echo $text;?>
</a>
</span>
</div>
<?php
}

function AdminUserPanel() {
	global $my;
	
	$lastvisit = ($my->lastvisit == '0000-00-00 00:00:00') ? 'İlk Defa Giriş Yaptınız' : mosFormatDate($my->lastvisit, '%d-%m-%Y %H:%M:%S');
	
	echo '<div id="welcome">';
	echo '<span><center><strong>Hoşgeldiniz '.$my->name.'</strong></center></span><br />';
	echo '<span><strong><u>Kurumunuz:</u></strong><br />'. $my->kurumadi.'</span><br /><br />';
	echo '<span><strong><u>Kullanıcı Grubunuz:</u></strong><br />'.$my->usergroup.'</span><br /><br />';
	echo '<span><strong><u>Son Giriş Zamanı:</u></strong><br />'. $lastvisit.'</span>';
	echo '</div>';
}