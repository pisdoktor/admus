<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Ilceler extends DBTable {
	
	var $id     = null;
	
	var $parent = null;
	
	var $name   = null;
	
	function Ilceler( &$db ) {
		$this->DBTable( '#__ilceler', 'id', $db );
	}
}