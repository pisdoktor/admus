<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

$id = intval(mosGetParam($_REQUEST, 'id'));

include(dirname(__FILE__). '/html.php');

switch ($task) {
	default:
	GelenKutusu();
	break;
	
	case 'edit':
	formDuzenle($id);
	break;
	
	case 'diagram':
	bodyDiagram($id);
	break;
		
	case 'cancel':
	cancelForm();
	break;
	
	case 'save':
	saveForm();
	break;
}
function bodyDiagram($id) {
	global $dbase;
	
	
}

function cancelForm() {
	global $dbase;
	
	$row = new Muayene( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=site&bolum=gelen');
}

function saveForm() {
	global $dbase;
	
}

function GelenKutusu() {
	global $dbase, $my, $limit, $limitstart;
	
	$query = "SELECT COUNT(*) FROM #__muayene WHERE raporno='' AND doldurankurumid=".$my->kurumid;
	$dbase->setQuery($query);
	
	$total = $dbase->loadResult();
	
	$pageNav = new pageNav( $total, $limitstart, $limit);
	
	$query = "SELECT m.*, k.name as kurumadi FROM #__muayene AS m"
	. "\n LEFT JOIN #__kurumlar AS k ON k.id=m.gonderenkurumid"
	. "\n WHERE m.raporno='' AND m.doldurankurumid=".$my->kurumid
	;
	$dbase->setQuery($query);
	
	$rows = $dbase->loadObjectList();
	
	Liste::Gelenler($rows, $pageNav);
}

function formDuzenle($id) {
	global $dbase;
	
	$row = new Muayene($dbase);
	$row->load($id);
	
	
	Liste::formDuzenle($row);
}