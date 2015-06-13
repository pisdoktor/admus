<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

$id = intval(mosGetParam($_REQUEST, 'id'));
$limit = intval(mosGetParam($_REQUEST, 'limit', 20));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));

include(dirname(__FILE__). '/html.php');

switch ($task) {
	default:
	VeriListeleme();
	break;
	
	case 'print':
	printForm($id);
	break;
}

function printForm($id) {
	
}

function VeriListeleme() {
	global $dbase, $my, $limit, $limitstart;
	
	$where = '';
	//doktorlar için listeleme
	if ($my->groupid == '2') {
	$where = "WHERE doldurankurumid = ".$my->kurumid;	
	}
	//kolluk için listeleme
	if ($my->groupid == '3') {
	$where = "WHERE gonderenkurumid = ".$my->kurumid;	
	}
	//savcılar için listeleme
	if ($my->groupid == '4') {
	$where = "WHERE gonderilenkurumid = ".$my->kurumid;	
	}
	
	$query = "SELECT COUNT(*) FROM #__muayene ".$where;
	$dbase->setQuery($query);
	
	$total = $dbase->loadResult();
	
	$pageNav = new pageNav( $total, $limitstart, $limit);
	
	$query = "SELECT m.*, k.name as kurumadi, u.name as ekleyen FROM #__muayene AS m"
	. "\n LEFT JOIN #__kurumlar AS k ON k.id=m.doldurankurumid "
	. "\n LEFT JOIN #__users AS u ON u.id=m.gonderenuserid "
	.$where
	;
	$dbase->setQuery($query);
	
	$rows = $dbase->loadObjectList();
	
	Liste::VeriListeleme($rows, $pageNav);
}
