<style>
html, body{padding: 0;margin: 0;}
table td{font-size: 15px;font-weight: bold;text-align:Center;}
table td div{padding: 5px;}
.w100{width: 100%;}
.w50{width: 48%;margin: 1%;float: left;}

.w30{width: 31%;margin: 1%;float: left;}
</style>
<script src="/js/jq.js" type="text/javascript"></script>
<script src="/js/aj.js" type="text/javascript"></script>
<script src="/js/buycards.js" type="text/javascript"></script>
<?
$r = @mysqli_query($_connect, "SELECT c.id_game FROM cards c, games g WHERE c.id_game = g.id AND c.id_user = '".$_SESSION['userid']."' AND g.status  = 0 LIMIT 1");
if(@mysqli_num_rows($r) == 1){
	
	$zn = @mysqli_fetch_row($r);
	$id_game = $zn[0];
	?>
	<div style="text-align:center;border-bottom: 1px solid #ccc;color: #fff;padding: 12px;">здесь список игроков вэтой игре (максимум 10), правила, баланс</div>
	<div style="text-align:center; color: #fff;font-size: 30px;padding: 20px;">Игра #<?=$zn[0]?></div>
	<div style="text-align:Center;color: #fff;font-size: 60px;">
	Здесь выпадает номер

	</div>
	<div style="text-align:Center;color: #fff;padding: 10px;">
	Здесь история выпавших номеров

	</div>
	<?
	$r = @mysqli_query($_connect, "SELECT id FROM cards WHERE id_user = '".$_SESSION['userid']."' AND id_game = '".$id_game."'");
	$kolvo = @mysqli_num_rows($r);
	$cls = "w100";
	if($kolvo > 1){$cls = "w50";}
	if($kolvo > 2){$cls = "w30";}
	
	
		?><div style="color: #fff;text-align:center;">
		<?if($kolvo < 6){?>
		<input type="button" onclick="buycard(<?=$id_game?>)" value="Купить еще карту" style="color: #000;display: inline"> или <?}?><input type="button" onclick="" value="Готов к игре" style="display: inline;color: #000;">
		</div>
		<?
	
	while($zn = @mysqli_fetch_row($r)){?>
	<div style="margin-top: 30px;" class="<?=$cls?>">
<table style="100%" align="center" width="100%" cellpadding="3" cellspacing="2" bgcolor="#029532">
<?$ke = 1;for($i = 0; $i < 3; $i++){$z++;?>
<tr bgcolor="#FFFFFF">
<?for($j = 0; $j < 9; $j++){
	$fi = "a".$ke;
	$r1 = @mysqli_query($_connect, "SELECT ".$fi." FROM cards WHERE id = '".$zn[0]."' LIMIT 1");
	$zn1 = @mysqli_fetch_row($r1);
	?><td width="11.1%" align="center"><div <?if(is_numeric($cifra[$i][$j])){?>id="c_<?=$i?>_<?=$j?>" onclick="getok(<?=$cifra[$i][$j]?>, 'c_<?=$i?>_<?=$j?>')"<?}?>><?if($zn1[0] > 0){?><?=$zn1[0]?><?}else{?><div><span style="color: #ccc;font-size: 11px;">x</span></div><?}?></div></td><?
	$ke++;
	}?>
</tr>
<?}?>
</table>
</div>
	<?
	}
	?><div style="clear: both"></div><?
}else{
?>
<div style="text-align: center;color: #fff;padding: 12px;">Чтобы начать новую игру, купите карту
<br /><br />
<a href="javascript:void(0)" onclick="buycard(0)">Купить карту</a> или войдите в существующую игру
</div>
<div style="background: #fff;margin-top: 20px;padding: 30px;">
Список игр тут
</div>
<?}
?>




<div style="color:#fff">
<h1>Как начать играть</h1>
<ol>
<li> Чтобы войти или создать игру, нужно купить хотябы одну карточку с числами <a href="" style="color: #ccc">(пример карты)</a>, стоимость карточки зависит от валютной комнаты: 
<ul>
<li> Litecoin комната - стоимость карты ХXXXXX LTC
<li> Ripple комната - стоимость карты ХХХХХХ XRP
<li> Tron комната - стоимость карты ХХХХХХ TRX
<li> Dash комната - стоимость карты ХХХХХХ Dash
<li> Waves комната - стоимость карты ХХХХХХ WAVES

<li> Doge комната - стоимость карты ХХХХХХ DOGE
<li> Verge комната - стоимость карты ХХХХХХ XVG




</ul>
<span style="font-size: 10px;color: #aaa;">стоимости карточек могут меняться как в большую, так и в меньшую сторону, без предварительного уведомления игроков, актуальную стоимость карточки, вы можете видеть вверху валютной комнаты</span>
<ol>
<li>1. Создание игры
<ul>
<li> Что бы создать игру - нажмите на кнопку "Купить карту" на общей странице сервиса
<li> 
</ul>
</ol>
</ol>




</div>

<?
exit();
function getnumber(){
	
	$number = rand(1, 90);
	
	return $number;
	}

?>


<?

$uzhe = '';
$id_game = 1;
$qq = "SELECT results FROM gamestat WHERE id_game = '".$id_game."' LIMIT 1";

$r = @mysqli_query($_connect,  $qq);
if(@mysqli_num_rows($r) == 0){
	$insert = 1;
}else{
	$zn = @mysqli_fetch_row($r);
	$uzhe = $zn[0];
	
}
$number = getnumber();
$ken = 0;
if($uzhe != ''){
$ex = explode(",", $uzhe);

if(count($ex) < 90){
	for($i = 0; $i < count($ex); $i++){
		if($ex[$i] == $number){
			$ken = 1; 
			$number = getnumber();
			break; 
			}
}

while($ken != 0){
	$ken = 0;
	$ex = explode(",", $uzhe);
	for($i = 0; $i < count($ex); $i++){
		if($ex[$i] == $number){
			$ken = 1; 
			$number = getnumber();
			break; 
			}
}
}
}elsE{
$number = "FINISHED"; 
$fin = 1;
}
}
if(!isset($fin)){
$uzhe .= ",".$number;
	
if(!isset($insert)){echo "123";
	$qq = "UPDATE gamestat SET results = '".$uzhe."' WHERE id_game = '".$id_game."' LIMIT 1";
	
@mysqli_query($_connect, $qq);
//echo $qq.@mysqli_error($_connect)." / ".$uzhe." -- ";

}else{
	$qq = "INSERT INTO gamestat (id_game, results) VALUES('".$id_game."', '".$uzhe."')";
//	echo $qq;
@mysqli_query($_connect, $qq);
}

}

?>
<div style="color: #fff;font-size: 40px;text-align: center; padding: 30px">
<?=$number?><?if($uzhe != ''){echo " / ".strlen($uzhe);?>
<div style="padding-top: 20px;font-size: 20px;">
<?$ex = explode(",", $uzhe);
for($i = 0; $i < count($ex); $i++){
?><span style="padding-left: 5px;padding-right: 5px;"><?=$ex[$i]?></span> <?
}?>
</div>
<?}?>
</div>
<input type="hidden" id="number" value="<?=$number?>">
<script>function getok(a, b){
n = document.getElementById('number').value;
if(a == n){alert('ok');
document.getElementById(b).className='grn';
}else{alert('not');}
}</script>
<?


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
for($zaza = 0; $zaza < 3; $zaza++){

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
						$number = '<div><span style="color: #ccc;font-size: 11px;">x</span></div>';
						}
		$a[$i][$numbers[$j]] = $number."/".$pres;
		$z++;
		$full[$pres] = $number;
		$pres++;
	}
	//echo "<br />";
}

?>

<?//print_r($a);
$cifra = $a;

?>
<div style="padding: 50px;">
<table style="width: 500px;" align="center" cellpadding="12" cellspacing="2" bgcolor="#029532">
<?for($i = 0; $i < 3; $i++){$z++;?>
<tr bgcolor="#FFFFFF">
<?for($j = 0; $j < 9; $j++){?><td width="11.1%" align="center"><div <?if(is_numeric($cifra[$i][$j])){?>id="c_<?=$i?>_<?=$j?>" onclick="getok(<?=$cifra[$i][$j]?>, 'c_<?=$i?>_<?=$j?>')"<?}?>><?=$cifra[$i][$j]?> / <?=$j?></div></td><?}?>
</tr>
<?}?>
</table>
</div>
<?}?>