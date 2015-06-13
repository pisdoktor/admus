<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

if ($my->groupid != 1) {
	mosRedirect('index.php');
}

$cid = mosGetParam($_REQUEST, 'cid');
$id = intval(mosGetParam($_REQUEST, 'id'));
$limit = intval(mosGetParam($_REQUEST, 'limit', 5));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getDuyuruList();
	break;
	
	case 'add':
	editDuyuru(0);
	break;
	
	case 'edit':
	editDuyuru(intval(($cid[0])));
	break;
	
	case 'editx':
	editDuyuru($id);
	break;
	
	case 'save':
	saveDuyuru();
	break;
	
	case 'cancel':
	cancelDuyuru();
	break;
	
	case 'delete':
	delDuyuru($cid);
	break;
}

function delDuyuru(&$cid) {
	global $dbase;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Silmek için listeden bir duyuru seçin'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "DELETE FROM #__duyurular"
	. "\n WHERE ( $cids )"
	;
	$dbase->setQuery( $query );
	if ( !$dbase->query() ) {
		echo "<script> alert('".$dbase->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect( 'index.php?option=yonetim&bolum=duyuru', 'Seçili duyuru(lar) silindi' );
}

function saveDuyuru() {
	 global $dbase;
	
	$row = new Duyurular( $dbase );
	
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
	
	mosRedirect('index.php?option=yonetim&bolum=duyuru', 'Duyuru kaydedildi');
	
}

function cancelDuyuru() {
	global $dbase;
	
	$row = new Duyurular( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=duyuru');
}

function getDuyuruList() {
	 global $dbase, $limit, $limitstart;
	 
	 $dbase->setQuery("SELECT COUNT(*) FROM #__duyurular");
	 $total = $dbase->loadResult();
	 
	 $pageNav = new pageNav( $total, $limitstart, $limit);
	 $query = "SELECT * FROM #__duyurular";
	
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();
	
	DuyuruHTML::getDuyuruList($rows, $pageNav);
}

function editDuyuru($cid) {
	global $dbase;
	
	$row = new Duyurular($dbase);
	$row->load($cid);
	
	$grup = array();
	$grup[] = mosHTML::makeOption('1', 'Genel Duyuru');
	$grup[] = mosHTML::makeOption('2', 'Doktorlara Duyuru');
	$grup[] = mosHTML::makeOption('3', 'Kolluklara Duyuru'); 
	$grup[] = mosHTML::makeOption('4', 'Savcılara Duyuru');
	
	$lists['group'] = mosHTML::selectList($grup, 'group', 'class="inputbox" size="1"', 'value', 'text', $row->group);
	DuyuruHTML::editDuyuru($row, $lists);
}