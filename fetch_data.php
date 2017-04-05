<?php 
include_once 'koneksi.php';

$id = $_POST['get_option'];
$results = $db->select("sentence","category = $id");

foreach ($results as $key => $value) {
	echo "<option value=".$value['id'].">".$value['sentence']."</option>";
}


 exit();


?>