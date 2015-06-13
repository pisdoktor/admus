<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Muayene extends DBTable {
	//genel değerler	
	var $id = null;
	
	var $raporno   = null;
	
	//gönderen kuruma ait bilgiler
	var $gonderenkurumid = null;
	
	var $gonderenuserid = null;
	
	var $gonderentarih = null;
	
	var $gonderenyazino = null;
	
	var $gondereneslikeden = null;
	
	var $gondereneslikedensicil = null;
	
	var $gonderennedeni = null;
	
	//dolduran kuruma ait bilgiler
	var $doldurankurumid = null;
	
	var $dolduranuserid = null;
	
	var $doldurantarih = null;
	
	var $dolduransaat = null;
	
	var $dolduranuygunortam = null;
	
	var $dolduranbulunankisi = null;
	
	var $dolduranelbiseler = null;
	
	//gönderilen şahsın bilgileri
	//SAYFA 1
	var $gonderilentc = null;
	
	var $gonderilenadsoyad = null;
	
	var $gonderilenbabaadi = null;
	
	var $gonderilendogumyeri = null;
	
	var $gonderilendogumtarihi = null;
	
	var $gonderilencinsiyeti = null;
	
	var $gonderilenmeslegi = null;
	
	var $gonderilenoyku = null;
	
	var $gonderilensikayetler = null;
	
	var $gonderilenozgecmis = null;
	
	//SAYFA 2
	var $gonderilenkons = null;
	
	var $gonderilenbulgular = null;
	
	var $gonderilenbulgubolge = null;
	
	var $gonderilengeneldurum = null;
	
	var $gonderilenbilinc = null;
	
	var $gonderilentansiyon = null;
	
	var $gonderilennabiz = null;
	
	var $gonderilensolunum = null;
	
	var $gonderilenpupiller = null;
	
	var $gonderilenisikrefleksi = null;
	
	var $gonderilentendonrefleksi = null;
	
	var $gonderilensistemmuayenesi = null;
	
	var $gonderilensistembulgu = null;
	
	var $gonderilenpsikiyatrik = null;
	
	var $gonderilentetkikler = null;
	
	var $gonderilentetkiksonuc = null;
	
	//SAYFA 3
	var $gonderilensonucdurum = null;
	
	var $gonderilensonucdurum2 = null;
	
	var $gonderilensonuc = null;
	 
	//gönderilen kuruma ait bilgiler
	var $gonderilenkurumid = null;
	
	
	function Muayene( &$db ) {
		$this->DBTable( '#__muayene', 'id', $db );
	}
	
	function uygunOrtam() {
		return mosHTML::yesnoRadioList('dolduranuygunortam', 'class="inputbox"', $this->dolduranuygunortam);
	}
	
	function bulunanKisiler() {
		$kisiler = array();
		$kisiler[] = mosHTML::makeOption('1', 'Tabip ve Muayene Edilen');
		$kisiler[] = mosHTML::makeOption('2', 'Güvenlik Görevlisi');
		$kisiler[] = mosHTML::makeOption('3', 'Sağlık Personeli');
		$kisiler[] = mosHTML::makeOption('4', 'Muayene edilenen müdafii');
		
		return mosHTML::checkboxList($kisiler, 'dolduranbulunankisi', 'class="inputbox"', 'value', 'text', $this->dolduranbulunankisi);
	}
	
	function elbiseDurum() {
		$elbise = array();
		$elbise[] = mosHTML::makeOption('1', 'Tamamen Çıkarıldı');
		$elbise[] = mosHTML::makeOption('2', 'Kısmen Çıkarıldı');
		$elbise[] = mosHTML::makeOption('3', 'Çıkartılmadı');
		
		return mosHTML::radioList($elbise, 'dolduranelbiseler', 'class="inputbox"', 'value', 'text', $this->dolduranelbiseler);
	}
	
	
	
	function bulguBolgeleri() {
		$bolge = array();
		$bolge[] = mosHTML::makeOption('1', 'Baş-Boyun');
		$bolge[] = mosHTML::makeOption('2', 'Göğüs');
		$bolge[] = mosHTML::makeOption('3', 'Batın');
		$bolge[] = mosHTML::makeOption('4', 'Sırt-Bel');
		$bolge[] = mosHTML::makeOption('5', 'Üst Ekstremite');
		$bolge[] = mosHTML::makeOption('6', 'Alt Ekstremite');
		$bolge[] = mosHTML::makeOption('7', 'Genital Bölge');
		
		return mosHTML::checkboxList($bolge, 'gonderilenbulgubolge', 'class="inputbox"', 'value', 'text', $this->gonderilenbulgubolge);
	}
	
	function sistemMuayenesi() {
		$sistem = array();
		$sistem[] = mosHTML::makeOption('1', 'Merkezi Sinir Sistemi');
		$sistem[] = mosHTML::makeOption('2', 'Kalp Damar Sistemi');
		$sistem[] = mosHTML::makeOption('3', 'Solunum Sistemi');
		$sistem[] = mosHTML::makeOption('4', 'Sindirim Sistemi');
		$sistem[] = mosHTML::makeOption('5', 'Ürogenital Sistem');
		$sistem[] = mosHTML::makeOption('6', 'Kas İskelet Sistemi');
		$sistem[] = mosHTML::makeOption('7', 'Duyu Organları');
		
		return mosHTML::checkboxList($sistem, 'gonderilensistembulgu', 'class="inputbox"', 'value', 'text', $this->gonderilensistembulgu);
	}
	
	function psikiyatrikMuayene() {
		$secenek = array();
		$secenek[] = mosHTML::makeOption('1', 'Belirgin bir psikopatolojik bulgu saptanmadı');
		$secenek[] = mosHTML::makeOption('2', 'Ayrıntılı psikiyatrik muayeneye gerek duyuldu');
		$secenek[] = mosHTML::makeOption('3', 'Psikiyatri konsültasyonu istendi');
		
		return mosHTML::radioList($secenek, 'gonderilenpsikiyatrik', 'class="inputbox"', 'value', 'text', $this->gonderilenpsikiyatrik);		
	}
	
	function tetkikler() {
		$tetkik = array();
		$tetkik[] = mosHTML::makeOption('1', 'Laboratuvar');
		$tetkik[] = mosHTML::makeOption('2', 'Direkt Grafi');
		$tetkik[] = mosHTML::makeOption('3', 'BT/MR');
		$tetkik[] = mosHTML::makeOption('4', 'Ultrasonografi');
		$tetkik[] = mosHTML::makeOption('5', 'Biyopsi');
		$tetkik[] = mosHTML::makeOption('6', 'Diğer');
		
		return mosHTML::checkboxList($tetkik, 'gonderilentetkikler', 'class="inputbox"', 'value', 'text', $this->gonderilentetkikler); 
	}
	
	function sonucDurum() {
		$sonuc = array();
		$sonuc[] = mosHTML::makeOption('1', 'Gerek görülmedi');
		$sonuc[] = mosHTML::makeOption('2', 'Gerek görüldü');
				
		return mosHTML::radioList($sonuc, 'gonderilensonucdurum', 'class="inputbox"', 'value', 'text', $this->gonderilensonucdurum);		
	}
	
	function sonucDurum2() {
		$sonuc2 = array();
		$sonuc2[] = mosHTML::makeOption('1', 'Kesin Rapor');
		$sonuc2[] = mosHTML::makeOption('2', 'Durum bildirir geçici rapor');
		return mosHTML::radioList($sonuc2, 'gonderilensonucdurum2', 'class="inputbox"', 'value', 'text', $this->gonderilensonucdurum2);
	}
	
	function createRaporNo() {
		global $my;
		$date = date('Ymd');
		
		$query = "SELECT MAX(raporno) FROM #__muayene WHERE `doldurankurumid`=".$this->_db->Quote($my->kurumid);
		$this->_db->setQuery( $query );
		$rno = $this->_db->loadResult();
		
		if ($rno) {
			$raporno = $rno + 1;
		} else {
			$raporno = $date.$my->ilid.$my->kurumid.'0001';
		}
		
		return $raporno;
	}
	
	function checkTCKimlik() {
		
		if (trim( $this->gonderilentc ) == '') {
			$this->_error = addslashes( 'TC Kimlik numarası boş bırakılamaz' );
			return false;
		}
		
		if (strlen($this->gonderilentc) !== 11) {
			$this->_error = addslashes( 'TC Kimlik Numarası 11 basamaklı olmalıdır!' );
			return false;
		}
		
		if ( $this->gonderilentc[0]==0 || !ctype_digit($this->gonderilentc)) {
			$this->_error = addslashes( 'TC Kimlik Numarası hatalı!' );
			return false;
		} else {
			$first = '';
			$last = '';
			$all = '';
			for ( $a=0;$a<9;$a=$a+2) {
				$first=$first+$this->gonderilentc[$a];
			}
			for ( $a=1;$a<9;$a=$a+2) {
				$last=$last+$this->gonderilentc[$a];
			}
			for ( $a=0;$a<10;$a=$a+1) {
				$all=$all+$this->gonderilentc[$a];
			}
			if ( ( $first*7-$last )%10!=$this->gonderilentc[9] || $all%10!=$this->gonderilentc[10]) {
				$this->_error = addslashes( 'TC Kimlik Numarası hatalı!' );
				return false;
			} else {
				return true;
			}
		}
		
		return true;
	}
}