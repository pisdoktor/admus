<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

class VeriGiris {
	static function VeriGirisFormu($row, $lists) {
		global $my;
		?>
		<div id="module_header">İstek Formu <?php echo $row->id ? 'Düzenle':'Yeni';?></div>
		<div id="module">
		  <script>
		  $(function() {
			  $.datepicker.setDefaults($.datepicker.regional['tr']);
			  $("#datepicker").datepicker({ dateFormat: 'dd-mm-yy' });
		  });
		  
		  /*
		  jQuery(document).ready(function(){
			  jQuery('input').keyup(function() {
				  this.value = this.value.toLocaleUpperCase();
			  });
			  
			  jQuery('textarea').keyup(function() {
				  this.value = this.value.toLocaleUpperCase();
			  });
		  });
		  */
		  
		  function makamdegistir() {
			  $('#kurumum').prop( "disabled", false );
		  }
		  </script>
		<form action="index.php" method="post" name="adminForm" id="adminForm">
		<table width="100%">
		<tr>
		<th colspan="2" align="left">
		Genel Bilgiler:
		</th>
		</tr>
		<tr>
		<td width="25%">
		Gönderen Makam:
		</td>
		<td>
		<?php echo $lists['kolluk'];?> <input type="button" onclick="makamdegistir();" value="Değiştir" disabled="disabled" />
		</td>
		</tr>
		<tr>
		<td>
		Gönderilen Sağlık Kurumu:
		</td>
		<td>
		<?php echo $lists['saglik'];?>
		</td>
		</tr>
		<tr>
		<td>
		Gideceği Savcılık Kurumu:
		</td>
		<td>
		<?php echo $lists['savcilik'];?>
		</td>
		</tr>
		<tr>
		<td>
		Resmi Yazı Tarihi, No:
		</td>
		<td>
		<input type="text" name="gonderentarih" value="<?php echo $row->gonderentarih;?>" class="inputbox" id="datepicker"> - <input type="text" name="gonderenyazino" value="<?php echo $row->gonderenyazino;?>" class="inputbox">
		</td>
		</tr>
		<tr>
		<td valign="top">
		Gönderim Nedeni:
		</td>
		<td>
		<?php echo $lists['sebep'];?>
		</td>
		</tr>
		<tr>
		<th colspan="2" align="left">
		Eşlik Eden Görevlinin:
		</th>
		</tr>
		<tr>
		<td>
		Adı Soyadı:
		</td>
		<td>
		<input type="text" name="gondereneslikeden" value="<?php echo $row->gondereneslikeden;?>"  class="inputbox">
		</td>
		</tr>
		<tr>
		<td>
		Sicil Numarası:
		</td>
		<td>
		<input type="text" name="gondereneslikedensicil" value="<?php echo $row->gondereneslikedensicil;?>"  class="inputbox">
		</td>
		</tr>
		<tr>
		<th colspan="2" align="left">
		Gönderilen Şahsın:
		</th>
		</tr>
		<tr>
		<td>
		TC Kimlik Numarası:
		</td>
		<td>
		<input type="text" name="gonderilentc" value="<?php echo $row->gonderilentc;?>"  class="inputbox" maxlength="11" size="11">
		<input type="button" onclick="sorgula();" value="Sorgula" disabled="disabled" />
		</td>
		</tr>
		<tr>
		<td>
		Adı Soyadı:
		</td>
		<td>
		<input type="text" name="gonderilenadsoyad" value="<?php echo $row->gonderilenadsoyad;?>"  class="inputbox">
		</td>
		</tr>
		<tr>
		<td>
		Baba Adı:
		</td>
		<td>
		<input type="text" name="gonderilenbabaadi" value="<?php echo $row->gonderilenbabaadi;?>"  class="inputbox">
		</td>
		</tr>
		<tr>
		<td>
		Doğum Tarihi ve Yeri:
		</td>
		<td>
		<input type="text" name="gonderilendogumtarihi" value="<?php echo $row->gonderilendogumtarihi;?>"  class="inputbox"> - <input type="text" name="gonderilendogumyeri" value="<?php echo $row->gonderilendogumyeri;?>"  class="inputbox">
		</td>
		</tr>
		<tr>
		<td>
		Cinsiyeti:
		</td>
		<td>
		<?php echo $lists['cinsiyet'];?>
		</td>
		</tr>
		<tr>
		<td>
		Mesleği:
		</td>
		<td>
		<input type="text" name="gonderilenmeslegi" value="<?php echo $row->gonderilenmeslegi;?>"  class="inputbox">
		</td>
		</tr>
		</table>	
		<input type="hidden" name="option" value="site" />
		<input type="hidden" name="bolum" value="verigiris" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="id" value="<?php echo $row->id;?>" />
		<input type="hidden" name="gonderenkurumid" value="<?php echo $my->kurumid;?>" />	
		<input type="hidden" name="gonderenuserid" value="<?php echo $my->id;?>" />
		</form>
		</div>
		<div align="right">
<input type="button" name="button" value="Kaydet" onclick="javascript:submitbutton('save');" class="button"  />
<input type="button" name="button" value="İptal" onclick="javascript:submitbutton('cancel');" class="button" />
</div>
		<?php
	}
}
