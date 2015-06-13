<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Kurumlar extends DBTable {
	
	var $id     = null;
	
	var $name   = null;
	
	var $tipi   = null;
	
	var $ilceid = null;
	
	var $adres  = null;
	
	var $telefon= null;
	
	function Kurumlar( &$db ) {
		$this->DBTable( '#__kurumlar', 'id', $db );
	}
}