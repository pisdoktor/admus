<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

class IlceHTML {
	static function editIlce($row, $lists) {
		?>
		<div id="module_header">İlçe <?php echo $row->id ? 'Düzenle' : 'Ekle';?></div>
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
				alert( "İlçe adını boş bırakmışsınız" );
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
	<strong>İl Adı:</strong>
	</td>
	<td width="70%">
	<?php echo $lists['iller'];?>
	</td>
  </tr>
	<tr>
	<td width="30%">
	<strong>İlçe Adı:</strong>
	</td>
	<td width="70%">
	<input type="text" id="name" name="name" class="inputbox" value="<?php echo $row->name;?>">
	</td>
  </tr>
</table>
<input type="hidden" name="option" value="yonetim" />
<input type="hidden" name="bolum" value="ilce" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="id" value="<?php echo $row->id;?>" />
<br />
</form>
</div>
<br />
<div align="right">
<input type="button" name="button" value="Kaydet" onclick="javascript:submitbutton('save');" class="button"  />
<input type="button" name="button" value="İptal" onclick="javascript:submitbutton('cancel');" class="button" />
</div>
<?php
}
	
	static function getIlceList($rows, $pageNav, $lists) {
		?>
<form action="index.php" method="post" name="adminForm">
<div align="left" style="float:left;">
Filtreleme: <?php echo $lists['iller'];?>
</div>
<div align="right">
<input type="button" name="button" value="Yeni İlçe Ekle" onclick="javascript:submitbutton('add');" class="button" />
<input type="button" name="button" value="Seçileni Düzenle" onclick="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Lütfen listeden bir seçim yapın'); } else {submitbutton('edit');}" class="button" /> 
<input type="button" name="button" value="Seçileni Sil" onclick="javascript:if (document.adminForm.boxchecked.value == 0){ alert('Lütfen listeden bir seçim yapın'); } else if (confirm('Bu ilçeleri silmek istediğinize emin misiniz?')){ submitbutton('delete');}" class="button" /> 
</div>

<table width="100%" border="0" class="veritable">
<tr>
<th width="5%">
SIRA
</th>
<th width="1%">
<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th width="45%">
İl Adı
</th>
<th width="45%">
İlçe Adı
</th>
</tr>
</table>
<?php
$t = 0;
for($i=0; $i<count($rows);$i++) {
$row = $rows[$i];

$checked = mosHTML::idBox( $i, $row->id );
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
<td width="45%">
<center>
<a href="index.php?option=yonetim&bolum=il&task=editx&id=<?php echo $row->ilid;?>">
<?php echo $row->ilname;?>
</a>
</center>
</td>
<td width="45%">
<center>
<a href="index.php?option=yonetim&bolum=ilce&task=editx&id=<?php echo $row->id;?>">
<?php echo $row->name;?>
</a>
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
<input type="hidden" name="bolum" value="ilce" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<br />
<div align="right">
<input type="button" name="button" value="Yeni İlçe Ekle" onclick="javascript:submitbutton('add');" class="button" />
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
$link = 'index.php?option=yonetim&bolum=ilce';
echo $pageNav->writeLimitPageLink($link);?>
</div>
</div>

<?php
		
	}
}
