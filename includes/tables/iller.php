<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Iller extends DBTable {
	
	var $id     = null;
	
	var $name   = null;
	
	function Iller( &$db ) {
		$this->DBTable( '#__iller', 'id', $db );
	}
}