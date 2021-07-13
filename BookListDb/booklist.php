<?php 
$db = require (__DIR__."\\db.php");

$authorList = $db->query('SELECT * FROM authors');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BookList2</title>
</head>
<body>

		<form action="data.php" enctype="multipart/form-data" method="POST">
		<p>Напишите название книги</p>
		<input type="text" name="BookName">

        <p>Напишите жанр книги</p>
		<input type="text" name="Genre">

        <p>Напишите год издания книги</p>
		<input type="text" name="BookYear">
		
		<p>Выберете автора книги</p>
        <select name="author">
		<?php
		foreach ($authorList as $author){
			echo '<option value="' . $author["id"] . '">' . $author["name"] . '</option>';
		}
		?>
        </select>
        

		<p>Загрузите обложку</p>
		<input type="file" name="picture">

		<input type="submit" value="Отправить">
		</form>

</body>
</html>