<?php 
	
if ($_GET['sentence']==null) {
	header('location: data_category.php');
}
include_once 'koneksi.php';
$id_sentence = $_GET['sentence'];
$sql = "select 
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

		$results = $db->run($sql);

 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

 <div class="container">
		<div class="row">
		  <div class="col-lg-12">
		  	<div>
		  		&nbsp<br>
		  	</div>
		  	
		  	<div >
		  		<h4 class="pull-left">Data Variant / Sentence : <?php echo $_GET['name'] ?></h4>
				<button onclick="goBack()" class="btn btn-primary btn-sm pull-right">Go Back</button>
				</div>
				<div class="clearfix"></div>
		  	<hr>
				<div class="clearfix"></div>
				<?php if ($results==null): ?>
					tidak ada data
				<?php else: ?>
					
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
					   foreach ($results as $key => $value) {?>
					    <tr>
					      <td><?php echo $no; ?></td>
					      <td><?php echo $value['variant']; ?></td>
					      <td><?php echo $value['translation']; ?></td>
					      <td><a style="text-decoration: none" target="_blank" href="file/<?php echo $value['file']; ?>"><?php echo $value['file']; ?></a></td>
					      <td><?php echo $value['description']; ?></td>
					      
					    </tr>
					   <?php $no++; } ?>
					  </tbody>
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
