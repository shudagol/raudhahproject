<?php 

include_once 'koneksi.php';

$uploaddir = 'file/';
$namafile = $_FILES['file']['name'];
$uploadfile = $uploaddir . $namafile;

$insert = array(
    "sentence" => $_POST['sentence'],
    "variant" => $_POST['variant'],
    "translation" => $_POST['translation'],
    "file" => $namafile,
    "description" => $_POST['description'],
);

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
    if ($db->insert('variant', $insert)) {
			header('location: variant.php?message=3');
    }else{
    	echo "insert gagal";
    }
} else {
    echo "Possible file upload attack!\n";
}

 ?>