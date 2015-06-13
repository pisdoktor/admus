<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

class Liste {
	static function formDuzenle($row) {
		global $my;
		?>
		<div id="module_header">Muayene Formu <?php echo $row->raporno ? 'Düzenle':'Yeni';?></div>
		<div id="module">
		  <script>
	var options = {
		edit: true,
		
		align: {
			y: 'top'
		},

		offset: {
			top: 15
		},

		handlers: {
			click: 'toggle'
		}
	};
	
	var data = [];
	
	var taggd = $('.taggd').taggd( options, data );
	
	taggd.on('change', function() {
		console.log(taggd.data);
	});

  </script>
		<form action="index.php" method="post" name="adminForm" id="adminForm">
		<table width="100%">
		<tr>
		<th align="left" colspan="2">Muayene Koşulları</th>
		</tr>
		<tr>
		<td width="30%">Uygun ortam sağlandı mı?</td>
		<td><?php echo $row->uygunOrtam();?></td>
		</tr>
		<tr>
		<td>Muayene sırasında bulunan kişiler</td>
		<td><?php echo $row->bulunanKisiler();?></td>
		</tr>
		<tr>
		<td>Muayene Edilenin Giysileri</td>
		<td><?php echo $row->elbiseDurum();?></td>
		</tr>
		<tr>
		<th colspan="2" align="left">Muayeneye Esas Olayla İlgili Bilgiler</th></tr>
		<tr>
		<td valign="top">Olayın Öyküsü</td>
		<td><textarea name="gonderilenoyku" cols="50" rows="5"><?php echo $row->gonderilenoyku;?></textarea></td>
		</tr>
		<tr>
		<td valign="top">Muayene Edilenin Şikayetleri</td>
		<td><textarea name="gonderilensikayetler" cols="50" rows="5"><?php echo $row->gonderilensikayetler;?></textarea></td>
		</tr>
		<tr>
		<td valign="top">Muayene Edilenin Özgeçmişi</td>
		<td><textarea name="gonderilenozgecmis" cols="50" rows="5"><?php echo $row->gonderilenozgecmis;?></textarea></td>
		</tr>
		<tr>
		<th colspan="2" align="left">Muayene Bulguları</th>
		</tr>
		<tr>
		<td>Muayene Bulgu Bölgeleri</td>
		<td><?php echo $row->bulguBolgeleri();?></td>
		</tr>
		<tr>
		<td valign="top">Muayene Bulguları</td>
		<td><textarea name="gonderilenbulgular" cols="50" rows="5"><?php echo $row->gonderilenbulgular;?></textarea></td>
		</tr>
		<tr>
		<td colspan="2" align="center">
		<img src="<?php echo SITEURL;?>/images/interactiveBody_<?php echo $row->gonderilencinsiyeti;?>.png"  class="taggd" alt="" />
		</td>
		</tr>
		<tr>
		<th colspan="2" align="left">Sistem Muayeneleri</th>
		</tr>
		<tr>
		<td>Sistemler</td>
		<td><?php echo $row->sistemMuayenesi();?></td>
		</tr>
		<tr>
		<td>Bilgiler</td>
		<td>
		Genel Durum: <input type="text" name="gonderilengeneldurum" class="inputbox" size="10" />
		Bilinç: <input type="text" name="gonderilenbilinc" class="inputbox" size="10" />
		Tansiyon: <input type="text" name="gonderilenbilinc" class="inputbox" size="10" />
		Nabız: <input type="text" name="gonderilennabiz" class="inputbox" size="10" />
		Solunum: <input type="text" name="gonderilensolunum" class="inputbox" size="10" />
		Pupiller: <input type="text" name="gonderilenpupiller" class="inputbox" size="10" />
		Işık Refleksi: <input type="text" name="gonderilenisikrefleksi" class="inputbox" size="10" />
		Tendon Refleksi: <input type="text" name="gonderilentendonrefleksi" class="inputbox" size="10" />
		</td>
		</tr>
		<tr>
		<th colspan="2" align="left">Psikiyatrik Muayene</th>
		</tr>
		<tr>
		<td>Temel psikiyatrik muayene yapıldı</td>
		<td><?php echo $row->psikiyatrikMuayene();?></td>
		</tr>
		<tr>
		<th colspan="2" align="left">Tetkikler</th>
		</tr>
		<tr>
		<td>İstenilen Tetkikler</td>
		<td><?php echo $row->tetkikler();?></td>
		</tr>
		<tr>
		<td valign="top">Tetkik Sonuçları</td>
		<td><textarea name="gonderilentetkiksonuc" cols="50" rows="5"><?php echo $row->gonderilentetkiksonuc;?></textarea></td>
		</tr>
		<tr>
		<th colspan="2" align="left">SONUÇ</th>
		</tr>
		<tr>
		<td>Bir başka sağlık kuruluşuna sevkine</td>
		<td><?php echo $row->sonucDurum();?><br /><?php echo $row->sonucDurum2();?></td>
		</tr>
		<tr>
		<td valign="top">Sonuç</td>
		<td valign="top"><textarea name="gonderilensonuc" cols="50" rows="5"><?php echo $row->gonderilensonuc;?></textarea></td>
		</tr>
		</table>
		<input type="hidden" name="option" value="site" />
		<input type="hidden" name="bolum" value="gelen" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="id" value="<?php echo $row->id;?>" />
		<input type="hidden" name="dolduranuserid" value="<?php echo $my->id;?>" />
		<input type="hidden" name="doldurantarih" value="<?php echo date('d-m-Y');?>" />
		<input type="hidden" name="dolduransaat" value="<?php echo date('H:i');?>" />
		<input type="hidden" name="raporno" value="<?php echo $row->createRaporNo();?>" />
		</form>
		</div>
		
		<div align="right">
<input type="button" name="button" value="Kaydet" onclick="javascript:submitbutton('save');" class="button"  />
<input type="button" name="button" value="İptal" onclick="javascript:submitbutton('cancel');" class="button" />
</div>

		<?php
	}
	static function Gelenler($rows, $pageNav) {
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
Gönderen Kurum
</th>
<th width="5%">
Gönderim Tarihi
</th>
</tr>
</table>
<?php
$t = 0;
for($i=0; $i<count($rows);$i++) {
$row = $rows[$i];

$checked = mosHTML::idBox( $i, $row->id );
$link = 'index.php?option=site&bolum=gelen&task=edit&id='.$row->id;
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
