<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>BookList</title>
</head>
<body>

		<form action="data.php" enctype="multipart/form-data" method="post">
		<p>Напишите название книги</p>
		<input type="text" name="BookName">
		
		<p>Напишите автора книги</p>
		<input type="text" name="Author">

		<p>Выберите тип книги</p>
		<select name="BookType">
			<option value="Бумажная">Бумажная</option>
			<option value="Электронная">Электронная</option>
			<option value="Аудио">Аудио</option>
		</select>

			<p>Выберите жанр книги</p>
			<input type="checkbox" name="Genre[]" value="Ужас">Ужас
			<input type="checkbox" name="Genre[]" value="Фантастика">Фантастика
			<input type="checkbox" name="Genre[]" value="Роман">Роман
			<input type="checkbox" name="Genre[]" value="Драма">Драма
			<input type="checkbox" name="Genre[]" value="Документальная">Документальная

			<p>Загрузите обложку</p>
			<input type="file" name="picture">

			<input type="submit" value="Отправить">
		</form>

</body>
</html>