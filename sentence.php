<?php 
include_once 'koneksi.php';

$sql = "select 
					category.category_name,
					sentence.*
				from
					category join sentence 
				on
					sentence.category = category.id";

$results = $db->run($sql);



$alert = "";
if(isset($_GET['message'])){ 
				if($_GET['message'] == "1"){
					$alert = '<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Well done!</strong> You successfully update sentence.
									</div>';
				}elseif ($_GET['message'] == "2") {
					$alert = '<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Well done!</strong> You successfully delete sentence.
									</div>';
				}elseif ($_GET['message'] == "3") {
					$alert = '<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Well done!</strong> You successfully insert sentence.
									</div>';
				}

			}
 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

 <div class="container">
		<div class="row">
		  <div class="col-lg-12">
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
		  		<h4 class="pull-left">Data Sentence</h4>
					<a class="btn btn-primary btn-sm pull-right  " href="setence_add.php" style="margin-bottom: 5px">add data</a><br>
				</div>
		  	<hr>
				<div class="clearfix"></div>
		    <table id="datatable" class="table table-striped table-hover ">
					  <thead>
					    <tr class="info">
					      <th>No</th>
					      <th>Sentence</th>
					      <th>Translation</th>
					      <th>File</th>
					      <th>Description</th>
					      <th>Category Name</th>
					      <th>Action</th>
					      
					    </tr>
					  </thead>
					  <tbody>
					  <?php 
					  $no = 1;
					   foreach ($results as $key => $value) {?>
					    <tr>
					      <td><?php echo $no; ?></td>
					      <td><?php echo substr( $value['sentence'],0,25); ?></td>
					      <td><?php echo substr( $value['translation'],0,25); ?></td>
					      <td><?php echo substr( $value['file'],0,25); ?></td>
					      <td><?php echo substr( $value['description'],0,25); ?></td>
					      <td><?php echo substr( $value['category_name'],0,25); ?></td>
					      
					      
					      <td><a class="btn btn-warning btn-sm" href="sentence_edit.php?id=<?php echo $value['id']; ?>"><span class="glyphicon glyphicon-pencil "></span></a>  <a class="btn btn-danger btn-sm" href="sentence_delete.php?id=<?php echo $value['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><span class="glyphicon glyphicon-trash"></span></a></td>
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
