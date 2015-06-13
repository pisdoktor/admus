<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );

class Liste {
	static function VeriListeleme($rows, $pageNav) {
		global $my;
		?>
		<form action="index.php" method="post" name="adminForm">
	<table width="100%" border="0" class="veritable">
<tr>
<th width="1%">
SIRA
</th>
<th width="1%">
<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $rows ); ?>);" />
</th>
<th width="5%">
Adı Soyadı
</th>
<th width="5%">
TC Kimlik
</th>
<th width="10%">
Gönderilen Kurum
</th>
<th width="5%">
Gönderim Tarihi
</th>
<th width="10%">
İstekte Bulunan
</th>
</tr>
</table>
<?php
$t = 0;
for($i=0; $i<count($rows);$i++) {
$row = $rows[$i];

$checked = mosHTML::idBox( $i, $row->id );

if ($row->raporno) {
	$link = 'index.php?option=site&bolum=liste&task=print&id='.$row->id;
} else {
	$link = 'index.php?option=site&bolum=verigiris&task=edit&id='.$row->id;
}
?>
<div id="detail<?php echo $row->id;?>">
<table width="100%" border="0" class="veriitem<?php echo $t;?>">
<tr>
<td width="1%">
<center>
<?php echo $pageNav->rowNumber( $i ); ?>
</center>
</td>
<td width="1%">
<center>
<?php echo $checked;?>
</center>
</td>
<td width="5%">
<center>
<a href="<?php echo $link;?>">
<?php echo $row->gonderilenadsoyad;?>
</a>
</center>
</td>
<td width="5%">
<center>
<?php echo $row->gonderilentc;?>
</center>
</td>
<td width="10%">
<center>
<?php echo $row->kurumadi;?>
</center>
</td>
<td width="5%">
<center>
<?php echo $row->gonderentarih;?>
</center>
</td>
<td width="10%">
<center>
<?php echo $row->ekleyen;?>
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
