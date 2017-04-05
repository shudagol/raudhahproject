<?php 

include_once 'koneksi.php';
$insert = "";
$id = $_POST['id'];

if ($_FILES['file']['name']) {
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
			$results = $db->select("sentence","id = $id");
			unlink($uploaddir.$results[0]['file']);
	    if ($db->update("sentence", $insert, "id = $id")) {
				header('location: sentence.php?message=1');
	    }else{
	    	echo "insert gagal";
	    }
	} else {
	    echo "Possible file upload attack!\n";
	}
}else{
	$insert = array(
	    "category" => $_POST['category'],
	    "sentence" => $_POST['sentence'],
	    "translation" => $_POST['translation'],
	    "description" => $_POST['description'],);
	     if ($db->update("sentence", $insert, "id = $id")) {
				header('location: sentence.php?message=1');
	    }else{
	    	echo "insert gagal";
	    }
	
}



 ?>