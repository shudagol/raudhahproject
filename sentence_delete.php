<?php 

include_once 'koneksi.php';
$id = $_GET['id'];
$results = $db->select("sentence","id = $id");
unlink('file/'.$results[0]['file']);

$db->delete("sentence", "id = $id");

header('location: sentence.php?message=2');


 ?>