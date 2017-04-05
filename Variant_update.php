<?php 

include_once 'koneksi.php';

$insert = "";
$id = $_POST['id'];

if ($_FILES['file']['name']) {
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
			$results = $db->select("variant","id = $id");
			unlink($uploaddir.$results[0]['file']);
	    if ($db->update("variant", $insert, "id = $id")) {
				header('location: variant.php?message=1');
	    }else{
	    	echo "insert gagal";
	    }
	} else {
	    echo "Possible file upload attack!\n";
	}
}else{
	$insert = array(
	    "sentence" => $_POST['sentence'],
	    "variant" => $_POST['variant'],
	    "translation" => $_POST['translation'],
	    "description" => $_POST['description'],);
	     if ($db->update("variant", $insert, "id = $id")) {
				header('location: variant.php?message=1');
	    }else{
	    	echo "insert gagal";
	    }
	
}


 ?>