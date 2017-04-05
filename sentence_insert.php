<?php 

include_once 'koneksi.php';

$uploaddir = 'file/';
$namafile = $_FILES['file']['name'];
$uploadfile = $uploaddir . $namafile;

$insert = array(
    "category" => $_POST['category'],
    "sentence" => $_POST['sentence'],
    "translation" => $_POST['translation'],
    "file" => $namafile,
    "description" => $_POST['description'],
);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    if ($db->insert('sentence', $insert)) {
			header('location: sentence.php?message=3');
    }else{
    	echo "insert gagal";
    }
} else {
    echo "Possible file upload attack!\n";
}

 ?>