<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

if ($my->groupid != 1) {
	mosRedirect('index.php');
}

$cid = mosGetParam($_REQUEST, 'cid');
$limit = intval(mosGetParam($_REQUEST, 'limit', 10));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getSebepList();
	break;
	
	case 'add':
	editSebep(0);
	break;
	
	case 'edit':
	editSebep(intval($cid[0]));
	break;
	
	case 'editx':
	editSebep($id);
	break;
	
	case 'save':
	saveSebep();
	break;
	
	case 'cancel':
	cancelSebep();
	break;
	
	case 'delete':
	delSebep($cid);
	break;
}

function delSebep($cid) {
	global $dbase;
	
	
}

function saveSebep() {
	 global $dbase;
	
	$row = new muayeneSebep( $dbase );
	
	if ( !$row->bind( $_POST ) ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}

	mosRedirect('index.php?option=yonetim&bolum=sebep', 'Sebep kaydedildi');
	
}

function cancelSebep() {
		global $dbase;
	
	$row = new muayeneSebep( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=sebep');
}

function editSebep($cid) {
	global $dbase;
	
	$row = new muayeneSebep($dbase);
	$row->load($cid);
		
	AccessHTML::editSebep($row);
}

function getSebepList() {
	global $dbase, $limit, $limitstart;
	
	$query = "SELECT COUNT(*) FROM #__muayenesebepleri";
	$dbase->setQuery($query);
	$total = $dbase->loadResult();
	
	$pageNav = new pageNav( $total, $limitstart, $limit);
	
	$query = "SELECT id, name FROM #__muayenesebepleri";
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();

	AccessHTML::getSebepList($rows, $pageNav);
	
}
