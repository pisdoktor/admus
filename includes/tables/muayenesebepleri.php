<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class muayeneSebep extends DBTable {
	
	var $id     = null;
	
	var $name   = null;
	
	function muayeneSebep( &$db ) {
		$this->DBTable( '#__muayenesebepleri', 'id', $db );
	}
}