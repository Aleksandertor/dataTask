<?
$db = require (__DIR__."\\db.php");

$sort = $_GET["sort"];
if($sort != '') {	
	setcookie('sort', $sort);
} else {
	$sort = $_COOKIE['sort'];
	if ($sort == '') {
		$sort = "name";
	}
}

$order = $_GET['order'];
if($order != '') {
	setcookie('order', $order);
} else {
	$order = $_COOKIE['order'];
	if ($order == '') {
		$order = "asc";
	}
}
$bookStyle = $sort == "name" ? "style=\"background:#0099ff\"":"";
$authorStyle = $sort == "author" ? "style=\"background:#0099ff\"":"";
$yearStyle = $sort == "year" ? "style=\"background:#0099ff\"":"";

$bookChar = $sort == "name" ? ($order == 'asc' ? '↓' : '↑'):"";
$authorChar = $sort == "author" ? ($order == 'asc' ? '↓' : '↑'):"";
$yearChar = $sort == "year" ? ($order == 'asc' ? '↓' : '↑'):"";

if ($sort == 'name') {
	if ($order == "desc") {
		$bookOrder = "asc";
	} else {
		$bookOrder = "desc";
	}
} else {
	$bookOrder = "asc";
}

if ($sort == 'author') {
	if ($order == "desc") {
		$authorOrder = "asc";
	} else {
		$authorOrder = "desc";
	}
} else {
	$authorOrder = "asc";
}

if ($sort == 'year') {
	if ($order == "desc") {
		$yearOrder = "asc";
	} else {
		$yearOrder = "desc";
	}
} else {
	$yearOrder = "asc";
}

$data = $db->query('SELECT books.name as name, books.genre as genre, books.year as year, authors.name as author, books.url as url FROM books LEFT JOIN authors on books.author_id=authors.id ORDER BY '.$sort.' '.$order);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>List</title>
</head>
<body>

<table border>
	<tr>
		<th <?php echo $bookStyle;?>><a href="list.php?sort=name&order=<?php echo $bookOrder?>">Название<?php echo $bookChar; ?></a></th>
		<th <?php echo $authorStyle;?>><a href="list.php?sort=author&order=<?php echo $authorOrder?>">Автор<?php echo $authorChar; ?></a></th>
		<th <?php echo $yearStyle;?>><a href="list.php?sort=year&order=<?php echo $yearOrder?>">Год<?php echo $yearChar; ?></a></th>
		<th>Жанр</th>
		<th>Обложка</th>
	</tr>
<?php
while($item = $data->fetch()){
	echo "<tr>";
	echo "<td>".$item["name"]."</td>";
	echo "<td>".$item["author"]."</td>";
	echo "<td>".$item["year"]."</td>";
	echo "<td>".$item["genre"]."</td>";
	echo "<td><img height=\"150\" src=\"".$item["url"]."\"></td>";
	echo "</tr>";
}
echo "</table>";
echo "</body>";
echo "</html>";
