<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Duyurular extends DBTable {
	
	var $id     = null;
	
	var $tarih  = null;
	
	var $metin  = null;
	
	var $group  = null;
	
	function Duyurular( &$db ) {
		$this->DBTable( '#__duyurular', 'id', $db );
	}
}