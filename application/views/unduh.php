<?php 
$dbh = new PDO("mysql:host=localhost;dbname=ci_magang", "root", "");
$id = isset($_GET['id'])? $_GET['id'] : "";
$stat = $dbh->prepare("select * from list_file where id=?");
$stat->bindParam(1,$id);
$stat->execute();
$row = $stat->fetch();


header("Content-Type: ".$row['mime']."charset=utf-8");
header('Content-Disposition: attachment; filename='.$row['filename']);  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo $row['data'];

?>