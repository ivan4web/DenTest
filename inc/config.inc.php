<?session_start();
$_connect = @mysqli_connect("localhost", "admin_lotto", "123123?a", "admin_lotto"); 
@mysqli_query($_connect, "set names utf8");

function fomail($email, $subj, $mess){
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: SpectrSad <info@'.$_SERVER['HTTP_HOST'].'>' . "\r\n";
@mail($email, $subj, $mess, $headers);
}

function strip_all($a){
$a = trim(strip_tags($a));
$a = str_replace('"', "″", $a);
$a = str_replace("'", "′", $a);
return trim(strip_tags($a));
}
$_price = 0.5;
$_curr = 1;
?>