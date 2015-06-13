<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

class KurumHTML {
	static function editKurum($row, $lists) {
		?>
		<div id="module_header">Kurum <?php echo $row->id ? 'Düzenle' : 'Ekle';?></div>
		<div id="module">
	<script language="javascript" type="text/javascript">		
		<!--
		function submitbutton(pressbutton) {
			var form = document.adminForm;

			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			// do field validation
			if (form.name.value == ""){
				alert( "Kurum Adı boş bırakmışsınız" );
			}  else {
		submitform( pressbutton );
			}
		}
		//-->
		</script> 
<form action="index.php" method="post" name="adminForm">
<table width="100%">
  <tr>
	<td width="30%">
	<strong>Kurum Adı:</strong>
	</td>
	<td width="70%">
	<input type="text" name="name" class="inputbox" value="<?php echo $row->name;?>">
	</td>
  </tr>
   <tr>
	<td width="30%">
	<strong>Kurum Çeşidi:</strong>
	</td>
	<td width="70%">
	<?php kurumTipi($row->tipi);?>
	</td>
  </tr>
  <tr>
	<td width="30%">
	<strong>Kurum İlçesi:</strong>
	</td>
	<td width="70%">
	<?php echo $lists['ilce'];?>
	</td>
  </tr>
  <tr>
	<td width="30%">
	<strong>Kurum Telefon:</strong>
	</td>
	<td width="70%">
	<input type="text" name="telefon" class="inputbox form-control bfh-phone" value="<?php echo $row->telefon;?>" data-format="0 (ddd) ddd dd dd">
	</td>
  </tr>
  <tr>
	<td width="30%" valign="top">
	<strong>Kurum Adresi:</strong>
	</td>
	<td width="70%">
	<textarea cols="40" rows="5" name="adres" class="textbox"><?php echo $row->adres;?></textarea>
	</td>
  </tr>
</table>
<input type="hidden" name="option" value="yonetim" />
<input type="hidden" name="bolum" value="kurum" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
</form>
</div>
<br />
<div align="right">
<input type="button" name="button" value="Kaydet" onclick="javascript:submitbutton('save');" class="button"  />
<input type="button" name="button" value="İptal" onclick="javascript:submitbutton('cancel');" class="button" />
</div>
<?php
}
	
	static function getKurumList($rows, $pageNav, $tipi, $il) {
		global $my;
		?>
<form action="index.php" method="post" name="adminForm">
<div align="left" style="float:left">
<?php kurumTipi($tipi, "onchange=\"document.adminForm.submit( );\"");?>
<?php ($my->groupid == 1) ? kurumSehirSecim($il, "onchange=\"document.adminForm.submit( );\""): '';?>
</div>
<div align="right">
<input type="button" name="button" value="Yeni Kurum Ekle" onclick="javascript:submitbutton('add');" class="button" />
<input type="button" name="button" value="Seçileni Düzenle" onclick="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Lütfen listeden bir seçim yapın'); } else {submitbutton('edit');}" class="button" /> 
<input type="button" name="button" value="Seçileni Sil" onclick="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Lütfen listeden bir seçim yapın'); } else if (confirm('Bu kurumları silmek istediğinize emin misiniz?')){ submitbutton('delete');}" class="button" /> 
</div>
<table width="100%" border="0" class="veritable">
<tr>
<th width="5%">
SIRA
</th>
<th width="1%">
<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th width="35%">
Kurum Adı
</th>
<th width="15%">
Kurum Çeşidi
</th>
<th width="15%">
İli
</th>
<th width="15%">
İlçesi
</th>
<th width="20%">
Kurum Telefonu
</th>
</tr>
</table>
<?php
$t = 0;
for($i=0; $i<count($rows);$i++) {
$row = $rows[$i];

$checked = mosHTML::idBox( $i, $row->id );

if ($row->tipi == 1) {
	$tipi = 'Sağlık Kurumu';
} else if ($row->tipi == 2) {
	$tipi = 'Kolluk Kurumu';
} else if ($row->tipi == 3) {
	$tipi = 'Savcılık Kurumu';
}
?>
<div id="detail<?php echo $row->id;?>">
<table width="100%" border="0" class="veriitem<?php echo $t;?>">
<tr>
<td width="5%">
<center>
<?php echo $pageNav->rowNumber( $i ); ?>
</center>
</td>
<td width="1%">
<center>
<?php echo $checked;?>
</center>
</td>
<td width="35%">
<center>
<a href="index.php?option=yonetim&bolum=kurum&task=editx&id=<?php echo $row->id;?>">
<?php echo $row->name;?>
</a>
</center>
</td>
<td width="15%">
<center>
<?php echo $tipi;?>
</center>
</td>
<td width="15%">
<center>
<?php echo $row->iladi;?>
</center>
</td>
<td width="15%">
<center>
<?php echo $row->ilceadi;?>
</center>
</td>
<td width="20%">
<center>
<?php echo $row->telefon;?>
</center>
</td>
</tr>
</table>
</div>
<?php
$t = 1 - $t;
}
?>
<input type="hidden" name="option" value="yonetim" />
<input type="hidden" name="bolum" value="kurum" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<br />
<div align="right">
<input type="button" name="button" value="Yeni Kurum Ekle" onclick="javascript:submitbutton('add');" class="button" />
<input type="button" name="button" value="Seçileni Düzenle" onclick="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Lütfen listeden bir seçim yapın'); } else {submitbutton('edit');}" class="button" /> 
<input type="button" name="button" value="Seçileni Sil" onclick="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Lütfen listeden bir seçim yapın'); } else if (confirm('Bu ilçeleri silmek istediğinize emin misiniz?')){ submitbutton('delete');}" class="button" /> 
</div>
</form>

<div align="center">
<div class="pagenav_counter">
<?php echo $pageNav->writePagesCounter();?>
</div>
<div class="pagenav_links">
<?php 
$link = 'index.php?option=yonetim&bolum=kurum';
echo $pageNav->writePagesLinks($link);?>
</div>
</div>

<?php
		
	}
}
