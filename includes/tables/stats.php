<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Stats extends DBTable {
	
	var $agent  = null;
	
	var $type   = null;
	
	var $hits   = null;
	
	function Stats( &$db ) {
		$this->DBTable( '#__stats', 'agent', $db );
	}
}