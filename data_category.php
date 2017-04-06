<?php 
include_once 'koneksi.php';

$results = $db->select("category");

 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

 <div class="container">
		<div class="row">
		  <div class="col-lg-8">
		  	<div>
		  		&nbsp<br>
		  	</div>
		  	
		  	<div >
		  		<h4>Data Category</h4>
				</div>
		  	<hr>
				<div class="clearfix"></div>
		    <table id="datatable" class="table table-striped table-hover ">
					  <thead>
					    <tr class="info">
					      <th width="10%">No</th>
					      <th>Category Name</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php 
					  $no = 1;
					   foreach ($results as $key => $value) {?>
					    <tr>
					      <td><?php echo $no; ?></td>
					      <td><a style="text-decoration: none;" href="data_sentence.php?category=<?php echo $value['id'] ?>"><?php echo $value['category_name']; ?></a></td>
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
