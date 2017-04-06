<?php 
	
if ($_GET['sentence']==null) {
	header('location: data_category.php');
}
$id_sentence = $_GET['sentence'];
include_once 'koneksi.php';

$sql = "select 
						category.category_name,
						sentence.*
						from
							category join sentence 
						on
							sentence.category = category.id
						where
							sentence.id = $id_sentence";

	$results = $db->run($sql);

	$sql_variant = "select 
							variant.*,
							sentence.sentence,
							sentence.id as id_sentence,
							category.category_name,
							category.id as id_category
						from
							variant 
						join 
							sentence 
						on
							sentence.id = variant.sentence
						join 
							category 
						on
							sentence.category = category.id
						where
							variant.sentence = $id_sentence";

	$variants = $db->run($sql_variant);

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
		  		<h4 class="pull-left">Data Sentence / Detail : <?php echo $_GET['name']; ?></h4>
					<button onclick="goBack()" class="btn btn-primary btn-sm pull-right">Go Back</button>
				</div>
				<div class="clearfix"></div>
		  	<hr>
				<div class="clearfix"></div>
				<?php if ($results==null): ?>
					tidak ada data
										
				<?php else: ?>
		  	
		    <table border="1" class="table table-hover table-striped ">
					    <tr>
					    	<td class="success" width="30%">Category</td>
					    	<td style=""><?php echo $results[0]['category_name'] ?></td>
					    </tr>
					    <tr>
					    	<td class="success" width="30%">Sentence</td>
					    	<td style=""><?php echo $results[0]['sentence'] ?></td>
					    </tr>
					    <tr>
					    	<td class="success" width="30%">Translation</td>
					    	<td style=""><?php echo $results[0]['translation'] ?></td>
					    </tr>
					    <tr>
					    	<td class="success" width="30%">File</td>
					    	<td style=""><a style="text-decoration: none" target="_blank" href="file/<?php echo $results[0]['file']; ?>"><?php echo $results[0]['file'] ?></a></td>
					    </tr>
					    <tr>
					    	<td class="success" width="30%">Description</td>
					    	<td style=""><?php echo $results[0]['description'] ?></td>
					    </tr>
					</table> 
					<div class="clearfix"></div>
		    
		  </div>

		  <div class="col-lg-12">
		  <h4 class="pull-left">Variant</h4>
				<br><hr>
					<table id="datatable" class="table table-striped table-hover ">
					  <thead>
					    <tr class="info">
					      <th width="10%">No</th>
					      <th>Variant</th>
					      <th>Translation</th>
					      <th>File</th>
					      <th>Desciption</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php 
					  $no = 1;
					   foreach ($variants as $key => $variant) {?>
					    <tr>
					      <td><?php echo $no; ?></td>
					      <td><?php echo $variant['variant']; ?></td>
					      <td><?php echo $variant['translation']; ?></td>
					      <td><a style="text-decoration: none" target="_blank" href="file/<?php echo $variant['file']; ?>"><?php echo $variant['file']; ?></a></td>
					      <td><?php echo $variant['description']; ?></td>
					      
					    </tr>
					   <?php $no++; } ?>
					  </tbody>
					</table>		  	

		  </div>	
				<?php endif ?>

		</div>
	</div>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#datatable').dataTable();

		$("[data-toggle=tooltip]").tooltip();

		$('#flash-messages').delay(5000).fadeOut(400);
	} );
	</script>


<script>
function goBack() {
    window.history.back();
}
</script>

<?php include('_template/foot.php'); ?>
