<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

$cid = mosGetParam($_REQUEST, 'cid');
$id = intval(mosGetParam($_REQUEST, 'id'));
$limit = intval(mosGetParam($_REQUEST, 'limit', 10));
$limitstart = intval(mosGetParam($_REQUEST, 'limitstart', 0));
$search = mosGetParam($_REQUEST, 'search');

include(dirname(__FILE__). '/html.php');

switch($task) {
	default:
	getKullaniciList($search);
	break;
	
	case 'add':
	editKullanici(0);
	break;
	
	case 'edit':
	editKullanici(intval(($cid[0])));
	break;
	
	case 'editx':
	editKullanici($id);
	break;
	
	case 'save':
	saveKullanici();
	break;
	
	case 'cancel':
	cancelKullanici();
	break;
	
	case 'delete':
	delKullanici($cid);
	break;
}

function delKullanici(&$cid) {
	global $dbase;

	$total = count( $cid );
	if ( $total < 1) {
		echo "<script> alert('Silmek için listeden bir duyuru seçin'); window.history.go(-1);</script>\n";
		exit;
	}

	mosArrayToInts( $cid );
	$cids = 'id=' . implode( ' OR id=', $cid );
	$query = "DELETE FROM #__users"
	. "\n WHERE ( $cids )"
	;
	$dbase->setQuery( $query );
	if ( !$dbase->query() ) {
		echo "<script> alert('".$dbase->getErrorMsg()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect( 'index.php?option=yonetim&bolum=kullanici', 'Seçili kullanıcı(lar) silindi' );
}

function saveKullanici() {
	 global $dbase;
	
	$row = new admUsers( $dbase );
	
	if ( !$row->bind( $_POST ) ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	$isNew     = !$row->id;
	$pwd     = '';

	// MD5 hash convert passwords
	if ($isNew) {
		// new user stuff
		if ($row->password == '') {
			$pwd             = mosMakePassword();

			$salt = mosMakePassword(16);
			$crypt = md5($pwd.$salt);
			$row->password = $crypt.':'.$salt;
		} else {
			$pwd = trim( $row->password );

			$salt = mosMakePassword(16);
			$crypt = md5($pwd.$salt);
			$row->password = $crypt.':'.$salt;
		}
		$row->registerDate     = date( 'Y-m-d H:i:s' );
	} else {
		$original = new admUsers( $dbase );
		$original->load( (int)$row->id );

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
	}
	
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect('index.php?option=yonetim&bolum=kullanici', 'Kullanici kaydedildi');
	
}

function cancelKullanici() {
	global $dbase;
	
	$row = new admUsers( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=yonetim&bolum=kullanici');
}

function getKullaniciList($search) {
	 global $dbase, $limit, $limitstart, $my;
	 
	 $where = array();
	 if ($search) {
		 $search = mosStripslashes($search);
		 $where[] = "k.username LIKE '%" . $dbase->getEscaped( trim( strtolower( $search ) ) ) . "%'";
	 }
	 
	 if ($my->groupid == 5) {
		 $where[] = 'i.id = '.$dbase->Quote($my->ilid);
	 }
	 
	 $query = "SELECT COUNT(k.id) FROM #__users AS k"
	 . "\n LEFT JOIN #__kurumlar AS kk ON kk.id=k.kurumid"
	 . "\n LEFT JOIN #__usergroups AS g ON g.id=k.groupid"
	 . "\n LEFT JOIN #__ilceler AS c ON c.id=kk.ilceid"
	 . "\n LEFT JOIN #__iller AS i ON i.id=c.parent"
	 . ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "" )
	 ;
	 
	 
	 $dbase->setQuery($query);
	 $total = $dbase->loadResult();
	 
	 $pageNav = new pageNav( $total, $limitstart, $limit);
	 
	 $query = "SELECT k.*, kk.name as kurumadi, g.name as kullanicigrup, c.name as ilceadi, i.name AS iladi FROM #__users AS k"
	 . "\n LEFT JOIN #__kurumlar AS kk ON kk.id=k.kurumid"
	 . "\n LEFT JOIN #__usergroups AS g ON g.id=k.groupid"
	 . "\n LEFT JOIN #__ilceler AS c ON c.id=kk.ilceid"
	 . "\n LEFT JOIN #__iller AS i ON i.id=c.parent"
	 . ( count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : "" )
	 . "\n ORDER BY k.id"
	 ;
	
	$dbase->setQuery($query, $limitstart, $limit);
	$rows = $dbase->loadObjectList();
	
	KullaniciHTML::getKullaniciList($rows, $pageNav, $search);
}

function editKullanici($cid) {
	global $dbase, $my;
	
	$row = new admUsers($dbase);
	$row->load($cid);
	
	$where = '';
	($my->groupid == 5) ? $where = " WHERE i.id=".$dbase->Quote($my->ilid) : "";
	
	$query = "SELECT k.id, k.name, i.name as groupname FROM #__kurumlar AS k"
	. "\n LEFT JOIN #__ilceler AS ii ON ii.id=k.ilceid"
	. "\n LEFT JOIN #__iller AS i ON i.id=ii.parent"
	. $where
	. "\n ORDER BY i.id, k.id"
	;
	
	$dbase->setQuery($query);
	$kurumlar = $dbase->loadObjectList();
	
	$lists['kurum'] = mosHTML::selectoptgroup($kurumlar, 'kurumid', 'class="inputbox" size="1"', 'value', 'text', $row->kurumid);
	
	$query = "SELECT id, name FROM #__usergroups "
	. ($my->groupid == 5 ? "WHERE id NOT IN (1,5)":"")
	;
	$dbase->setQuery($query);
	$gruplar = $dbase->loadObjectList();
	
	$gruplist[] = mosHTML::makeOption('0', 'Grup Seçin');
	foreach ($gruplar as $grup) {
	$gruplist[] = mosHTML::makeOption($grup->id, $grup->name);    
	}
	
	$lists['grup'] = mosHTML::selectList($gruplist, 'groupid', 'class="inputbox" size="1"', 'value', 'text', $row->groupid);
	
	
	KullaniciHTML::editKullanici($row, $lists);
}