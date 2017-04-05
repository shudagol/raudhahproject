<?php 

include_once 'koneksi.php';
$id = $_GET['id'];
$results = $db->select("variant","id = $id");
unlink('file/'.$results[0]['file']);

$db->delete("variant", "id = $id");

header('location: variant.php?message=2');


 ?>