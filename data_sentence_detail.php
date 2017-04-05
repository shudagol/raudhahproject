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
					
		    <table border="1" id="datatable" class="table table-hover table-striped ">
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
				<?php endif ?>
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


<script>
function goBack() {
    window.history.back();
}
</script>

<?php include('_template/foot.php'); ?>
