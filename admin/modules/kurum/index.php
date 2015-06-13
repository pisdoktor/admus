<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

$cid = mosGetParam($_REQUEST, 'cid');
$id = intval(mosGetParam($_REQUEST, 'id'));
$tipi = intval(mosGetParam($_REQUEST, 'tipi'));
$il = intval(mosGetParam($_REQUEST, 'il'));
$limit = intval(mosGetParam($_REQUEST, 'limit', 10));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getKurumList($tipi, $il);
	break;
	
	case 'add':
	editKurum(0);
	break;
	
	case 'edit':
	editKurum(intval(($cid[0])));
	break;
	
	case 'editx':
	editKurum($id);
	break;
	
	case 'save':
	saveKurum();
	break;
	
	case 'cancel':
	cancelKurum();
	break;
	
	case 'delete':
	delKurum($cid);
	break;
}

function delKurum(&$cid) {
	global $dbase;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Silmek için listeden bir duyuru seçin'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "DELETE FROM #__kurumlar"
	. "\n WHERE ( $cids )"
	;
	$dbase->setQuery( $query );
	if ( !$dbase->query() ) {
		echo "<script> alert('".$dbase->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect( 'index.php?option=yonetim&bolum=kurum', 'Seçili kurum(lar) silindi' );
}

function saveKurum() {
	 global $dbase;
	
	$row = new Kurumlar( $dbase );
	
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
	
	mosRedirect('index.php?option=yonetim&bolum=kurum', 'Kurum kaydedildi');
	
}

function cancelKurum() {
	global $dbase;
	
	$row = new Kurumlar( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=kurum');
}

function getKurumList($tipi, $il) {
	 global $dbase, $limit, $limitstart, $my;
	 
	 $where = array();
	 if ( $tipi ) {
		$where[] = "k.tipi = ".$dbase->Quote($tipi);
	}
	
	if ( $il ) {
		$where[] = "c.id = ".$dbase->Quote($il);
	}
	
	if ($my->groupid == 5) {
		$where[] = "c.id = ".$dbase->Quote($my->ilid);   
	 }
	 $query = "SELECT COUNT(k.id) FROM #__kurumlar AS k"
	  . "\n LEFT JOIN #__ilceler AS i ON i.id=k.ilceid"
	 . "\n LEFT JOIN #__iller AS c ON c.id=i.parent";
	 $query .= ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' );
	 
	 $dbase->setQuery($query);
	 $total = $dbase->loadResult();
	 
	 $pageNav = new pageNav( $total, $limitstart, $limit);
	 $query = "SELECT k.*, i.name AS ilceadi, c.name as iladi FROM #__kurumlar AS k"
	 . "\n LEFT JOIN #__ilceler AS i ON i.id=k.ilceid"
	 . "\n LEFT JOIN #__iller AS c ON c.id=i.parent";
	 $query .= ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' );
	 
	
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();
	
	KurumHTML::getKurumList($rows, $pageNav, $tipi, $il);
}

function editKurum($cid) {
	global $dbase, $my;
	
	$row = new Kurumlar($dbase);
	$row->load($cid);
	
	$where = '';
	($my->groupid == 5) ? $where = " WHERE i.id = ".$dbase->Quote($my->ilid) : NULL;
	
	$query = "SELECT c.id, c.name, i.name as groupname FROM #__ilceler AS c" 
	. "\n LEFT JOIN #__iller AS i ON i.id=c.parent";
	$query .= $where;
	$query .= " ORDER BY i.id, c.id ASC";
	$dbase->setQuery($query);
	$ilceler = $dbase->loadObjectList();
		
	$lists['ilce'] = mosHTML::selectoptgroup($ilceler, 'ilceid', 'class="inputbox" size="1"', $row->ilceid);
	
	KurumHTML::editKurum($row, $lists);
}

function kurumTipi($selected, $extra=null) {
	
	$option = array();
	$option[] = mosHTML::makeOption('0', 'Kurum Tipi Seçin');
	$option[] = mosHTML::makeOption('1', 'Sağlık Kurumu');
	$option[] = mosHTML::makeOption('2', 'Kolluk Kurumu');
	$option[] = mosHTML::makeOption('3', 'Savcılık Kurumu');
	
	$html = mosHTML::selectList($option, 'tipi', 'class="inputbox" size="1" '.$extra, 'value', 'text', $selected);
	
	echo $html;	
}

function kurumSehirSecim($selected, $extra) {
	global $dbase;
	
	$query = "SELECT * FROM #__iller";
	$dbase->setQuery($query);
	
	$iller = $dbase->loadObjectList();
	
	$option = array();
		$option[] = mosHTML::makeOption('0', 'İl Seçin');
	foreach ($iller as $il) {
		$option[] = mosHTML::makeOption($il->id, $il->name);
	}
	
	$html = mosHTML::selectList($option, 'il', 'class="inputbox" size="1"'.$extra, 'value', 'text', $selected);
	
	echo $html;
}