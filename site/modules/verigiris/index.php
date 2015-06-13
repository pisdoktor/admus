<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

$id = intval(mosGetParam($_REQUEST, 'id'));

include(dirname(__FILE__). '/html.php');

switch ($task) {
	default:
	VeriGirisFormu(0);
	break;
	
	case 'save':
	formKaydet();
	break;
	
	case 'edit':
	VeriGirisFormu($id);
	break;
	
	case 'cancel':
	cancelForm();
	break;
}

function cancelForm() {
	global $dbase;
	
	$row = new Muayene( $dbase );
	$row->bind( $_POST );
	$row->checkin();
	mosRedirect( 'index.php?option=site&bolum=liste');
}

function VeriGirisFormu($id) {
	global $dbase, $my;
	
	$row = new Muayene($dbase);
	$row->load($id);
	
	$gkurum = $row->gonderenkurumid ? $row->gonderenkurumid : $my->kurumid; 
	
	$add = " AND i.id = ".$dbase->Quote($my->ilid);
	
	//ildeki kollukları listeyelim
	$query = "SELECT k.*, ii.name as groupname FROM #__kurumlar AS k"
	. "\n LEFT JOIN #__ilceler AS ii ON ii.id=k.ilceid"
	. "\n LEFT JOIN #__iller AS i ON i.id=ii.parent"
	. "\n WHERE k.tipi = '2'".$add
	. "\n ORDER BY ii.name ASC";
	$dbase->setQuery($query);
	
	$kolluk = $dbase->loadObjectList(); 
	
	$lists['kolluk'] = mosHTML::selectoptgroup($kolluk, 'gonderenkurumid', 'id="kurumum" class="inputbox" size="1" disabled="disabled"', $gkurum);
	
	//ildeki sağlık kurumlarını listeyelim
	$query = "SELECT k.*, ii.name as groupname FROM #__kurumlar AS k"
	. "\n LEFT JOIN #__ilceler AS ii ON ii.id=k.ilceid"
	. "\n LEFT JOIN #__iller AS i ON i.id=ii.parent"
	. "\n WHERE k.tipi = '1'".$add
	. "\n ORDER BY ii.name ASC";
	$dbase->setQuery($query);
	
	$saglik = $dbase->loadObjectList();
	
	$lists['saglik'] = mosHTML::selectoptgroup($saglik, 'doldurankurumid', 'class="inputbox" size="1"', $row->doldurankurumid);
	
	//ildeki savcılıkları listeyelim
	$query = "SELECT k.*, ii.name as groupname FROM #__kurumlar AS k"
	. "\n LEFT JOIN #__ilceler AS ii ON ii.id=k.ilceid"
	. "\n LEFT JOIN #__iller AS i ON i.id=ii.parent"
	. "\n WHERE k.tipi = '3'".$add
	. "\n ORDER BY ii.name ASC";
	$dbase->setQuery($query);
	
	$savcilik = $dbase->loadObjectList();
	
	$lists['savcilik'] = mosHTML::selectoptgroup($savcilik, 'gonderilenkurumid', 'class="inputbox" size="1"', $row->gonderilenkurumid);
	
	//gonderim nedenlerini listele
	$dbase->setQuery("SELECT id as value, name as text FROM #__muayenesebepleri ORDER BY name ASC");
	$sebep = $dbase->loadObjectList();
	
	$row->gonderennedeni = explode(',', $row->gonderennedeni);
	
	$lists['sebep'] = mosHTML::checkboxList($sebep, 'gonderennedeni', 'class="inputbox" size="1"', 'value', 'text', $row->gonderennedeni);
	
	//cinsiyet seçimi
	$cins[] = mosHTML::makeOption('1', 'Erkek');
	$cins[] = mosHTML::makeOption('2', 'Kadın');
	
	$lists['cinsiyet'] = mosHTML::radioList($cins, 'gonderilencinsiyeti', 'class="inputbox" size="1"', 'value', 'text', $row->gonderilencinsiyeti);
	
	VeriGiris::VeriGirisFormu($row, $lists);
}

function formKaydet() {
	global $dbase;
	
	$row = new Muayene($dbase);
	
	$sebep = mosGetParam($_POST, 'gonderennedeni'); 
	
	if ( !$row->bind( $_POST ) ) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	$row->gonderennedeni = implode(',', $sebep);
	
	if (!$row->check()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if (!$row->checkTCKimlik()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	if (!$row->store()) {
		echo "<script> alert('".$row->getError()."'); window.history.go(-1); </script>\n";
		exit();
	}
	
	mosRedirect('index.php?option=site&bolum=liste', 'İstek kaydedildi');
	
}
