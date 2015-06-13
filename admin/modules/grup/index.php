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
	getGroupList();
	break;
	
	case 'add':
	editGroup(0);
	break;
	
	case 'edit':
	editGroup(intval($cid[0]));
	break;
	
	case 'editx':
	editGroup($id);
	break;
	
	case 'save':
	saveGroup();
	break;
	
	case 'cancel':
	cancelGroup();
	break;
	
	case 'delete':
	delGroup($cid);
	break;
}

function delGroup($cid) {
	global $dbase;
	
	
}

function saveGroup() {
	 global $dbase;
	
	$row = new userGroups( $dbase );
	
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

	mosRedirect('index.php?option=yonetim&bolum=grup', 'Grup kaydedildi');
	
}

function cancelGroup() {
		global $dbase;
	
	$row = new userGroups( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=grup');
}

function editGroup($cid) {
	global $dbase;
	
	$row = new userGroups($dbase);
	$row->load($cid);
		
	AccessHTML::editGroup($row);
}

function getGroupList() {
	global $dbase, $limit, $limitstart;
	
	$query = "SELECT COUNT(*) FROM #__usergroups"
	//. "\n WHERE id!=1"
	;
	$dbase->setQuery($query);
	$total = $dbase->loadResult();
	
	$pageNav = new pageNav( $total, $limitstart, $limit);
	
	$query = "SELECT id, name FROM #__usergroups"
	//. "\n WHERE group_id!=1"
	;
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();

	AccessHTML::getGroupList($rows, $pageNav);
	
}
