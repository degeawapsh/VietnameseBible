<?php
$sql = new mysqli("asus.ml", "root", "root", "mydb");
if(mysqli_connect_error()){
	die(mysqli_connect_error());
}
if($sql->query("TRUNCATE TABLE bible") === FALSE){
	echo "SQL Error";
}

$s = file_get_contents("./list.txt");
$s = split("\n", $s);
$id = 1;

foreach($s as $f){
	$a = file_get_contents($f.".txt");
	$a = split("\n", $a);
	$t = '';
	$doan = 1;
	foreach($a as $i){
		if(preg_match('/^[0-9]+$/', $i)==1 && $i==$doan+1){
			$sql->query("INSERT INTO bible (id, data) VALUE (".$id.", '".$t."');");
			echo $sql->error;
			$t = $i;
			$id++;
			$doan++;
		}else{
			$t=$t."<BR/>".$i;
		}
	}
	$sql->query("INSERT INTO bible (id, data) VALUE (".$id.", '".$t."');");
	echo $sql->error;
	$id++;
	echo "finish ".$f."\n";
}

$sql->close();
?>