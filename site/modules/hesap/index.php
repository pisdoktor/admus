<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getHesap();
	break;
	
	case 'save':
	saveHesap();
	break;
	
	case 'cancel':
	cancelHesap();
	break;
}

function cancelHesap() {
		global $dbase;
	
	$row = new admUsers( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php');
}

function saveHesap() {
	global $dbase;
	
	$row = new admUsers( $dbase );
	
	if ( !$row->bind( $_POST ) ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
		// existing user stuff
		if ($row->password == '') {
			// password set to null if empty
			$row->password = null;
		} else {
			$row->password = trim($row->password);
			$salt = mosMakePassword(16);
			$crypt = md5($row->password.$salt);
			$row->password = $crypt.':'.$salt;
		}
		
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect('index.php?option=site&bolum=hesap', 'Bilgileriniz kaydedildi');
}

function getHesap() {
	global $dbase, $my;
	
	$row = new admUsers($dbase);
	$row->load($my->id);	
	
	HesapHTML::getHesap($row);
}