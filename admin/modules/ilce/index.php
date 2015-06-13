<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

if ($my->groupid != 1) {
	mosRedirect('index.php');
}

$cid = mosGetParam($_REQUEST, 'cid');
$id = intval(mosGetParam($_REQUEST, 'id'));
$parent = intval(mosGetParam($_REQUEST, 'parent'));
$limit = intval(mosGetParam($_REQUEST, 'limit', 20));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getIlceList($parent);
	break;
	
	case 'add':
	editIlce(0);
	break;
	
	case 'edit':
	editIlce($cid[0]);
	break;
	
	case 'editx':
	editIlce($id);
	break;
	
	case 'save':
	saveIlce();
	break;
	
	case 'cancel':
	cancelIlce();
	break;
	
	case 'delete':
	delIlce($cid);
	break;
}

function delIlce(&$cid) {
	global $dbase;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Silmek için listeden bir ilçe seçin'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "DELETE FROM #__ilceler"
	. "\n WHERE ( $cids )"
	;
	$dbase->setQuery( $query );
	if ( !$dbase->query() ) {
		echo "<script> alert('".$dbase->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect( 'index.php?option=yonetim&bolum=ilce', 'Seçili ilçe(ler) silindi' );
}

function saveIlce() {
	 global $dbase;
	
	$row = new Ilceler( $dbase );
	
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
	
	mosRedirect('index.php?option=yonetim&bolum=ilce', 'İlçe kaydedildi');
	
}

function cancelIlce() {
	global $dbase;
	
	$row = new Ilceler( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=ilce');
}

function getIlceList($parent) {
	 global $dbase, $limit, $limitstart, $mainframe;
	 
	 $where = array();
	 if ( $parent ) {
		$where[] = "c.parent = ".$dbase->Quote($parent);
	}
	
	$query = "SELECT COUNT(c.id) FROM #__ilceler AS c";
	$query .= ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' );
	 
	 $dbase->setQuery($query);
	 $total = $dbase->loadResult();
	 
	 $pageNav = new pageNav( $total, $limitstart, $limit);
	 $query = "SELECT c.id, c.name, i.id as ilid, i.name as ilname FROM #__ilceler AS c ";
	 $query .= "LEFT JOIN #__iller AS i ON i.id=c.parent ";
	 $query .= ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' );
	 $query .= " ORDER BY i.id, c.id ASC";
	
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();
	
	$query = "SELECT id, name FROM #__iller";
	$dbase->setQuery($query);
	$iller = $dbase->loadObjectList();
	
	$illist[] = mosHTML::makeOption('0', 'İl Seçin');
	foreach ($iller as $il) {
	$illist[] = mosHTML::makeOption($il->id, $il->name);    
	}
	
	$lists['iller'] = mosHTML::selectList($illist, 'parent', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $parent);
	
	
	
	IlceHTML::getIlceList($rows, $pageNav, $lists);
}

function editIlce($cid) {
	global $dbase;
	
	$row = new Ilceler($dbase);
	$row->load($cid);
	
	$query = "SELECT id, name FROM #__iller";
	$dbase->setQuery($query);
	$iller = $dbase->loadObjectList();
	
	$illist[] = mosHTML::makeOption('0', 'İl Seçin');
	foreach ($iller as $il) {
	$illist[] = mosHTML::makeOption($il->id, $il->name);    
	}
	
	$lists['iller'] = mosHTML::selectList($illist, 'parent', 'class="inputbox" size="1"', 'value', 'text', $row->parent);
	
	IlceHTML::editIlce($row, $lists);
}