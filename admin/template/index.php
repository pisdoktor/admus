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
<div id="content">

<div id="header">
<img src="<?php echo SITEURL;?>/images/logo.png" title="<?php echo SITEHEAD;?>" alt="<?php echo SITEHEAD;?>" />
</div>

<?php AdminMenu();?>

<div id="container" class="clearfix">
<?php 
if ($mosmsg) {
	?>
	<div id="message">
	<?php echo $mosmsg;?>
	</div>
	<?php
}

loadAdminModule();

?>
</div><!-- container -->

<?php include(ABSPATH.'/includes/footer.php');?>

</div><!-- content -->
</body>
</html>

