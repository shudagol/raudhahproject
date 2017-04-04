<?php 

include_once 'class.db.php'; 

$db = new db("mysql:host=127.0.0.1;port=3306;dbname=suport", "root", "");

$results = $db->select("user");

echo "<pre>";
print_r ($results);
echo "</pre>";
exit();
echo 'tes';

 ?>