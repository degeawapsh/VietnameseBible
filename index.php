<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Mỗi ngày một đoạn Kinh Thánh</title>
  <link rel="stylesheet" type="text/css" href="/css.css"/>
</head>
<body>
<?php
$sql = new mysqli("asus.ml", "root", "root", "mydb");
if(mysqli_connect_error()){
	die(mysqli_connect_error());
}
$sql->set_charset("utf8");
$id = 178+round((time()-1440226702)/86400-0.5);

$res = $sql->query("SELECT data FROM bible WHERE id=".$id);
$row = $res->fetch_row();
echo $row[0];

$sql->close();
?>
</body>
</html>