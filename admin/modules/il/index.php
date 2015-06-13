<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

if ($my->groupid != 1) {
	mosRedirect('index.php');
}

$cid = mosGetParam($_REQUEST, 'cid');
$id = intval(mosGetParam($_REQUEST, 'id'));
$limit = intval(mosGetParam($_REQUEST, 'limit', 20));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getIlList();
	break;
	
	case 'add':
	editIl(0);
	break;
	
	case 'edit':
	editIl($cid[0]);
	break;
	
	case 'editx':
	editIl($id);
	break;
	
	case 'save':
	saveIl();
	break;
	
	case 'cancel':
	cancelIl();
	break;
	
	case 'delete':
	delIl($cid);
	break;
}

function delIl(&$cid) {
	global $dbase;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Silmek için listeden bir il seçin'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "DELETE FROM #__iller"
	. "\n WHERE ( $cids )"
	;
	$dbase->setQuery( $query );
	if ( !$dbase->query() ) {
		echo "<script> alert('".$dbase->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect( 'index.php?option=yonetim&bolum=il', 'Seçili il(ler) silindi' );
}

function saveIl() {
	 global $dbase;
	
	$row = new Iller( $dbase );
	
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
	
	mosRedirect('index.php?option=yonetim&bolum=il', 'İl kaydedildi');
	
}

function cancelIl() {
	global $dbase;
	
	$row = new Iller( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=il');
}

function getIlList() {
	 global $dbase, $limit, $limitstart;
	 
	 $dbase->setQuery("SELECT COUNT(*) FROM #__iller");
	 $total = $dbase->loadResult();
	 
	 $pageNav = new pageNav( $total, $limitstart, $limit);
	 $query = "SELECT * FROM #__iller";
	
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();
	
	IlHTML::getIlList($rows, $pageNav);
}

function editIl($cid) {
	global $dbase;
	
	$row = new Iller($dbase);
	$row->load($cid);
	
	IlHTML::editIl($row);
}