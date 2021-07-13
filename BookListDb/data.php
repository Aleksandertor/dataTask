<?php

$bookName = $_POST['BookName'];
$genre = $_POST['Genre'];
$bookYear = $_POST['BookYear'];
$author = $_POST['author'];

move_uploaded_file($_FILES["picture"]["tmp_name"], "pict".DIRECTORY_SEPARATOR.$_FILES["picture"]["name"]);
$url = "pict".DIRECTORY_SEPARATOR.$_FILES["picture"]["name"];

$db = require (__DIR__.DIRECTORY_SEPARATOR."db.php");

$theValues = $db->prepare("INSERT INTO books(name, genre, year, author_id, url) VALUES (:name, :genre, :year, :author_id, :url)");

$theValues->bindParam(':name', $bookName);
$theValues->bindParam(':genre', $genre);
$theValues->bindParam(':year', $bookYear);
$theValues->bindParam(':author_id', $author);
$theValues->bindParam(':url', $url);

if ($theValues->execute()) {
    echo  'Успех<br>';
} else {
    echo 'Неполучилось';
};
