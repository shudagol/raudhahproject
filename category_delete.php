<?php 

include_once 'koneksi.php';
$id = $_GET['id'];

$db->delete("category", "id = $id");

header('location: category.php?message=2');


 ?>