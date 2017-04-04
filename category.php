<?php 
include_once 'koneksi.php';

$results = $db->select("category");
$alert = "";
if(isset($_GET['message'])){ 
				if($_GET['message'] == "1"){
					$alert = '<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Well done!</strong> You successfully update category.
									</div>';
				}elseif ($_GET['message'] == "2") {
					$alert = '<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Well done!</strong> You successfully delete category.
									</div>';
				}

			}
 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

 <div class="container">
		<div class="row">
		  <div class="col-lg-8">
		  	<div>
		  		&nbsp<br>
		  		&nbsp<br>
		  	</div>
		  	<?php 
					if ($alert != null) {
						echo $alert;
					}
				 ?>
		  	<div >
		  		<h4 class="pull-left">Data Category</h4>
					<a class="btn btn-primary btn-sm pull-right  " href="category_add.php" style="margin-bottom: 5px">add data</a><br>
				</div>
		  	<hr>
				<div class="clearfix"></div>
		    <table id="datatable" class="table table-striped table-hover ">
					  <thead>
					    <tr class="info">
					      <th>No</th>
					      <th>Category Name</th>
					      <th>Aksi</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php 
					  $no = 1;
					   foreach ($results as $key => $value) {?>
					    <tr>
					      <td><?php echo $no; ?></td>
					      <td><?php echo $value['category_name']; ?></td>
					      
					      <td><a style="color:black" href="category_edit.php?id=<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a> | <a style="color:black" href="category_delete.php?id=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-trash"></span></a></td>
					    </tr>
					   <?php $no++; } ?>
					  </tbody>
					</table> 
					<div class="clearfix"></div>
		    
		  </div>
		</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();

		$("[data-toggle=tooltip]").tooltip();

		$('#flash-messages').delay(5000).fadeOut(400);
	} );
	</script>

<?php include('_template/foot.php'); ?>
