<<<<<<< HEAD
<?
include("inc/config.inc.php");
if(isset($_POST['iko1']))
{
	$login = strip_all($_POST['iko1']);
	$pass =  strip_all($_POST['iko2']);
	$r = @mysqli_query($_connect, "SELECT id FROM users WHERE name = '".$login."' AND pass = '".$pass."' LIMIT 1");
	if(@mysqli_num_rows($r) == 1){
		$zn = @mysqli_fetch_row($r);
		$_SESSION['userid'] = $zn[0];
	}
	?><script>document.location.href='/';</script><?
	exit();
}
?><script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script><script src="/js/help.php?a=<?=time()?>" type="text/javascript"></script><script src="/js/aj.js" type="text/javascript"></script><link rel="stylesheet" type="text/css" href="/stylenew.css?t=<?=md5(time())?>">

<body style="padding: 0; margin: 0;background : #3d6591"><?
if(!isset($_SESSION['userid'])){
?><form method="post">
<div style="margin: 0 auto;width: 96%; max-width: 400px;margin-top: 100px;">
<div style="box-shadow: 0 5px 15px rgba(0,0,0,0.5);background: #fff;padding: 20px; border-radius: 20px;text-align:Center;">
<input type="text" name="iko1" autocomplete="off" placeholder="Логин" style="margin-bottom: 5px;width: 100%;"><br />
<input type="password" name="iko2" placeholder="Пароль" style="margin-bottom: 5px;width: 100%;"><br />
<input type="submit" value="Войти">

</div>
</div></form>
<?
}else{
@include("bingo.php");
}

// мои изменения
?>
=======
asdasdads test
>>>>>>> parent of 2e4514d (first)
