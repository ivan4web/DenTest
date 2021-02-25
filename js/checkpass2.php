<?require_once "inc.php";
$JsHttpRequest = new Subsys_JsHttpRequest_Php("utf-8");
include("../inc/config.inc.php");
$a = strip_all($_POST['a']);
$b = strip_all($_POST['b']);
$d = strip_all($_POST['d']);
$res = ''; $err = 0;
if(!isset($_SESSION['userid'])){
	$qqa = "SELECT id FROM users WHERE email = '".$a."' AND pass = '".$b."' AND status = 1 LIMIT 1";
	$r = @mysql_query($qqa);
	if(@mysql_NUMROWS($r) == 1){
		$zn = @mysql_fetch_row($r);
		$_SESSION['userid'] = $zn[0];
		$res = $zn[0];
		if($d == 1){		
			$unix_time = time()+60*60*24*14; 
			setcookie("tld", $a, $unix_time, "/");
			setcookie("tpd", $b, $unix_time, "/");
		}
	}
	if(!isset($_SESSION['userid'])){$err = 1;}
}else{$res = $_SESSION['userid'];}
$_RESULT = array(
  "err"  => $err,
);?>