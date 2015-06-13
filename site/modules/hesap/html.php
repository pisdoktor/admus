<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' ); 

class HesapHTML {
	
	static function getHesap($row) {
		?>
		<div id="module_header">Bilgilerim - <?php echo $row->name;?></div>
		<div id="module">
		<script type="text/javascript">
$(function(){
	
	$('input[name=confirm_password]').on('keyup', function(){
		var pwd = $('input[name=password]').val();
		var confirm_pwd = $(this).val();
		$('span.success').hide();
		$('span.error').hide();
		if( pwd != confirm_pwd ){
			$('span.error').show();
		}
		
	});
	
});

$.extend({
  password: function (length, special) {
	var iteration = 0;
	var password = "";
	var randomNumber;
	var keylist = "abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
	if(special == undefined){
		var special = false;
	}
	while(iteration < length){
		iteration++;
		password += keylist.charAt(Math.floor(Math.random()*keylist.length))
	}
	return password;
  }
});

$(document).ready(function() {
	
	$('#showpass_text').hide();
 
	$('.link-password').click(function(e){
 
		// First check which link was clicked
		linkId = $(this).attr('id');
		if (linkId == 'olustur'){
			$('#random').empty();
			// If the generate link then create the password variable from the generator function
			password = $.password(10,true);
 
			// Empty the random tag then append the password and fade In
			$('#random').hide().append(password).fadeIn('slow');
 
			// Also fade in the confirm link
			$('#confirm').fadeIn('slow');
		} else {
			// If the confirm link is clicked then input the password into our form field
			$('#password').val(password);
			$('#confirm_password').val(password);
			$('#showpass_text').show();
			$('#showpass').empty().append(password).fadeIn('slow');
			// remove password from the random tag
			$('#random').empty();
			// Hide the confirm link again
			$(this).hide();
		}
		e.preventDefault();
	});
});

</script>
 <script language="javascript" type="text/javascript">
		function submitbutton(pressbutton) {
			var form = document.adminForm;

			if (pressbutton == 'cancel') {
				submitform( pressbutton );
				return;
			}
			
			var r = new RegExp("[\<|\>|\"|\'|\%|\;|\(|\)|\&|\+|\-]", "i");
			// do field validation
			if (form.username.value == "") {
				alert( "You must provide a user login name." );
			} else if (r.exec(form.username.value) || form.username.value.length < 3) {
				alert( "You login name contains invalid characters or is too short." );
			} else if (trim(form.email.value) == "") {
				alert( "You must provide an e-mail address." );
			} else if (form.groupid.value == "") {
				alert( "You must assign user to a group." );
			} else if (trim(form.password.value) != "" && form.password.value != form.confirm_password.value){
				alert( "Password do not match." );
			} else if (form.kurumid.value == "") {
				alert( "Lütfen bir kurum seçin" );
			} else {
				submitform( pressbutton );
			}
		}
		</script>
<form action="index.php" method="post" name="adminForm">
<table width="100%">
  <tr>
	<td width="30%">
	<strong>Kullanıcı İsim:</strong>
	</td>
	<td width="70%">
	<input type="text" name="name" class="inputbox" value="<?php echo $row->name;?>">
	</td>
  </tr>
  <tr>
	<td width="30%">
	<strong>Kullanıcı Adı:</strong>
	</td>
	<td width="70%">
	<input type="text" name="username" class="inputbox" value="<?php echo $row->username;?>" disabled="disabled">
	</td>
  </tr>
  <tr>
	<td width="30%">
	<strong>E-posta Adresi:</strong>
	</td>
	<td width="70%">
	<input type="text" name="email" class="inputbox" value="<?php echo $row->email;?>">
	</td>
  </tr>
  </table>
  
  <table width="100%">
  <tr>
  <th align="left">Parola İşlemleri</th>
  </tr>
   <tr>
	<td width="30%">
	<strong>Parola:</strong>
	</td>
	<td width="70%">
	<input type="password" name="password" id="password" class="inputbox" value="">
	<span id="showpass_text">Yeni Parola:</span><span id="showpass"></span>
	</td>
  </tr>
   <tr>
	<td width="30%">
	<strong>Parola Tekrarı:</strong>
	</td>
	<td width="70%">
	<input type="password" name="confirm_password" id="confirm_password" class="inputbox" value="">
	<span class="error" style="display: none; background-color: red;">Parolalar uyuşmuyor!</span>
	</td>
  </tr>
  <tr>
  <td>
  <a href="#" class="link-password" id="olustur">Parola Oluştur</a>
	<a href="#" class="link-password" id="confirm">Parolayı Kullan</a>
	<div id="random"></div>
  </td>
  </tr>
</table>
<input type="hidden" name="option" value="site" />
<input type="hidden" name="bolum" value="hesap" />
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
	
}