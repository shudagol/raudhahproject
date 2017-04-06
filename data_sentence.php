<?php 
	
if ($_GET['category']==null) {
	header('location: data_category.php');
}
$id_category = $_GET['category'];
include_once 'koneksi.php';

$category = $db->select("category", "id = $id_category");
$results = $db->select("sentence", "category = $id_category");

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
		  		<h4 class="pull-left">Data Sentence / Category : <?php echo $category[0]['category_name'] ?></h4>
					<button onclick="goBack()" style="margin-bottom: 5px" class="btn btn-primary btn-sm pull-right">Go Back</button>
				</div>
					<div class="clearfix"></div>
		  	<hr>
				<div class="clearfix"></div>
				<?php if ($results==null): ?>
					tidak ada data

				<?php else: ?>
				
		    <table id="datatable" class="table table-striped table-hover ">
					  <thead>
					    <tr class="danger">
					      <th width="10%">No</th>
					      <th>Sentence</th>
					    </tr>
					  </thead>
					  <tbody>
					  <?php 
					  $no = 1;
					   foreach ($results as $key => $value) {?>
					    <tr>
					      <td><?php echo $no; ?></td>
					      <td><a style="text-decoration: none;" href="data_sentence_detail.php?sentence=<?php echo $value['id'] ?>&name=<?php echo $value['sentence'] ?>"><?php echo $value['sentence']; ?></a>
					      </td>
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
