<?php
// no direct access
defined( 'ERISIM' ) or die( 'Bu alanı görmeye yetkiniz yok!' );  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php showHead();?>
</head>
<body>
<?php
$validate = spoofValue(1);
?>
<div id="content">
<div id="container">
<div id="logo">
<img src="./images/logo.png" border="0" alt="<?php echo SITEHEAD;?>" title="<?php echo SITEHEAD;?>" />
</div>
<?php
	if ($mosmsg) {
	echo '<div id="message">'.$mosmsg.'</div>';
	}
?>

<div id="login">
<form action="index.php" method="post" name="login" id="loginForm">

<div class="row">
<input name="username" id="username" type="text" class="inputbox" alt="username" placeholder="Kullanıcı adınızı yazın" size="15" required />
</div>

<div class="row">
<input type="password" id="password" name="passwd" class="inputbox" size="15" alt="password" placeholder="Parolanızı yazın" required />
</div>

<div class="row">
<input type="submit" name="button" class="button" value="GİRİŞ YAP" />
</div>  
  
<input type="hidden" name="remember" value="0" />
<input type="hidden" name="option" value="login" />
<input type="hidden" name="op2" value="login" />
<input type="hidden" name="return" value="index.php" />
<input type="hidden" name="force_session" value="1" />
<input type="hidden" name="<?php echo $validate; ?>" value="1" />
</form>
<script>
$("#loginForm").validate();
</script>
</div> 

</div><!-- container -->

<?php include(ABSPATH.'/includes/footer.php');?>

</div><!-- content -->
</body>
</html>