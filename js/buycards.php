<?
if (!defined("PATH_SEPARATOR"))
define("PATH_SEPARATOR", getenv("COMSPEC")? ";" : ":");
ini_set("include_path", ini_get("include_path").PATH_SEPARATOR.dirname(__FILE__));
require_once "inc.php";
include("../inc/config.inc.php");
if(isset($_SESSION['userid'])){
	
	$JsHttpRequest = new JsHttpRequest("utf-8");
	$game = strip_all($_POST['a']);
	$balans = 100;
	if($balans >= $_price){
	$wh = "";
	if(is_numeric($game)){$wh = " AND g.id <> '".$game."'";}
	$r = @mysqli_query($_connect, "SELECT c.id FROM cards c, games g WHERE c.id_game = g.id ".$wh." AND c.id_user = '".$_SESSION['userid']."' AND g.status  = 0 LIMIT 1");
	if(@mysqli_num_rows($r) == 0){
		$balans = $balans - $_price;
		//@mysqli_query($_connect, "INSERT INTO transfers");
		//@mysqli_query($_connect, "UPDATE balances SET amount = '".$balans."' WHERE id_user = '".$_SESSION['userid']."' AND curr = '".$_curr."' LIMIT 1");
		if($game == 0){
			@mysqli_query($_connect, "INSERT INTO games (submit_date, id_user) VALUES(CURRENT_TIMESTAMP, '".$_SESSION['userid']."')");
			$id_game = @mysqli_insert_id($_connect);
			$res = $id_game;
		}else{
			$id_game = $game;
		}
		
	}else{
		$res = "erralreadygame";
	}
	
	if(isset($id_game) && is_numeric($id_game)){
		
		
		
		
		
		
		@mysqli_query($_connect, "INSERT INTO usergame (id_user, id_game) VALUES('".$_SESSION['userid']."', '".$id_game."')");
		
		
		
function receivecard(){
$numbers = range(0, 8);
shuffle($numbers);
$j = 0;
for($i = 0; $i < 9; $i++){
	$line1[$i] = $numbers[$i]; 
	//else $line1[$i] = $i;
}

$numbers = range(0, 8);
shuffle($numbers);
for($i = 0; $i < 9; $i++){
	$line2[$i] = $numbers[$i];
}
$numbers = range(0, 8);
shuffle($numbers);
for($i = 0; $i < 9; $i++){
	$line3[$i] = $numbers[$i];
}

$stik = 0;
$z = 0;
$pus = '';
$k = 0;
$stik = 0;
for($i = 5; $i < 9; $i++){
	$pus1[$k] = $line1[$i];
	$pus2[$k] = $line2[$i];
	$pus3[$k] = $line3[$i];
	$k++;
	
}
for($i = 0; $i < count($pus1); $i++){
	for($j = 0; $j < count($pus2); $j++){
		if($pus1[$i] == $pus2[$j]){
			for($j = 0; $j < count($pus3); $j++){
		if($pus1[$i] == $pus3[$j]){$stik = 1;}
	}
		}
	}
	
}

return Array($line1, $line2, $line3, $stik);

}
{

$mycard = receivecard();
while($mycard[3] != 0){
$mycard = receivecard();
}
$line1 = $mycard[0];
$line2 = $mycard[1];
$line3 = $mycard[2];
$stik = 0;
$z = 0;
$pus = '';
$k = 0;

$stik = 0;
for($i = 5; $i < 9; $i++){
	$pus1[$k] = $line1[$i];
	$pus2[$k] = $line2[$i];
	$pus3[$k] = $line3[$i];
	$k++;
	
}
for($i = 0; $i < count($pus1); $i++){
	for($j = 0; $j < count($pus2); $j++){
		if($pus1[$i] == $pus2[$j]){
			for($j = 0; $j < count($pus3); $j++){
		if($pus1[$i] == $pus3[$j]){$stik = 1;}
	}
		}
	}
	
}



$ke = 0;
for($i = 0; $i < 90; $i+=10){
	$z = $i;
	if($i == 0) $z = 1;
	$kk = 9;
	if($i >= 80) $kk = 10;
	$carrs[$ke] = range($z, ($z+$kk));
	$ke++;
}

for($i = 0; $i < 9; $i++){
	shuffle($carrs[$i]);
	$carr[$i] = $carrs[$i];

}
//print_r($carr);

$ka1 = $pres = 0;
for($i = 0; $i < 3; $i++){
	if($i == 0){
		//shuffle($numbers);
		$numbers = $line1;
	}
	if($i == 1){
		//shuffle($numbers);
		$numbers = $line2;
	}
	if($i == 2){
		//shuffle($numbers);
		$numbers = $line3;
	}
	$z = 0;$kaz = 0;
	for($j = 0; $j < 9; $j++){
		
		if($z < 5){
			
			$number = $carr[$numbers[$j]][$i];
			
			$kaz++;
			
					}else{
						$number = 0;}
		$a[$i][$numbers[$j]] = $number;
		$z++;
		$full[$pres] = $number;
		$pres++;
	}
}
		
		
	

		
	}
	$cifra = $a;
	@mysqli_query($_connect, "INSERT INTO cards (id_game, id_user) VALUES('".$id_game."', '".$_SESSION['userid']."')");
$id_card = @mysqli_insert_id($_connect);
$ke = 1;
$res = '<table>';
for($i = 0; $i < 3; $i++){
$res .= '<tr bgcolor="#FFFFFF">';
for($j = 0; $j < 9; $j++){
	$res .= '<td width="11.1%" align="center"><div ';
	if(is_numeric($cifra[$i][$j])){
	$res .= 'id="c_'.$id_card.'_'.$i.'_'.$j.'" onclick="getok('.$cifra[$i][$j].', \'c_'.$id_card.'_'.$i.'_'.$j.'\')"';
	}
	$res .= '>'.$cifra[$i][$j].'</div></td>';
	
	$fi = "a".$ke;
	@mysqli_query($_connect, "UPDATE cards SET ".$fi." = '".$cifra[$i][$j]."' WHERE id = '".$id_card."' LIMIT 1");
		$ke++;
	}
	$res .= '</tr>';

}

$res .= '</table>';
$res = 1;
	}else{
	$res = "errNOGAME";                                  
	}
}else{
$res = "errbalance"; 
}
}else{
$res = "error";
}
$_RESULT = array(
  "res"  => $res,
);


?>