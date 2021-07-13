<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List</title>
</head>
<body>
<?
$sort = $_GET["sort"];
$bookStyle = $sort === "BookName" ? "style=\"background:#0099ff\"":"";
$authorStyle = $sort === "Author" ? "style=\"background:#0099ff\"":"";
$typeStyle = $sort === "BookType" ? "style=\"background:#0099ff\"":"";
?>

<table border>
	<tr>
		<th <?php echo $bookStyle;?>><a href="list.php?sort=BookName">Название</a></th>
		<th <?php echo $authorStyle;?>><a href="list.php?sort=Author">Автор</a></th>
		<th <?php echo $typeStyle;?>><a href="list.php?sort=BookType">Тип</a></th>
		<th>Жанр</th>
		<th>Обложка</th>
	</tr>
<?php
$data = file_get_contents("Data");
$data = json_decode($data, true);
$list = [];
foreach ($data as $key => $i){
	$list[$i[$sort].$key] = $i;
}
ksort($list);

foreach ($list as $item) {
	echo "<tr>";
	echo "<td>".$item["BookName"]."</td>";
	echo "<td>".$item["Author"]."</td>";
	echo "<td>".$item["BookType"]."</td>";
	echo "<td>";
	foreach ($item["genre"] as $num) {
		echo $num."<br>";
	}
	echo "</td>";
	echo "<td>";
	echo '<img height="150" src="'.$item["picturesrc"].'">';
	echo "</td>";
	echo "</tr>";
}
echo "</table>";
echo "</body>";
echo "</html>";



