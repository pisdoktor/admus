<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class userGroups extends DBTable {
	
	var $id     = null;
	
	var $name   = null;
	
	var $folder = null;
	
	function userGroups( &$db ) {
		$this->DBTable( '#__usergroups', 'id', $db );
	}
}