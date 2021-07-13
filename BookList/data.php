<?php

$data = [];
$data["BookName"] = $_POST['BookName'];
$data["Author"] = $_POST['Author'];
$data["BookType"] = $_POST['BookType'];
move_uploaded_file($_FILES["picture"]["tmp_name"], "pict".DIRECTORY_SEPARATOR.$_FILES["picture"]["name"]);
$data["picturesrc"] = "pict".DIRECTORY_SEPARATOR.$_FILES["picture"]["name"];
$genre = $_POST['Genre'];
foreach ($genre as $value) {
	$data["genre"][] = $value;
}
$fileData = [];
if (file_exists("Data")){
	$fileData = file_get_contents("Data");
	$fileData = json_decode($fileData, true);
}
$fileData[] = $data;
$fileData = json_encode($fileData);
file_put_contents ("Data", $fileData);