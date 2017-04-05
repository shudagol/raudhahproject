<?php 
		$alert = "";
		if ($_POST) {
			include_once 'koneksi.php';
			if ($db->insert("category", $_POST)) {
				$alert = '<div class="alert alert-dismissible alert-success">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Well done!</strong> You successfully insert category.
									</div>';
			}else{
				$alert = '<div class="alert alert-dismissible alert-danger">
								  <button type="button" class="close" data-dismiss="alert">&times;</button>
								  <strong>Oh snap!</strong> try submitting again.
									</div>';
			}
			
		}

 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">         
			<div class="col-lg-8">
				<div><br></div>
				<div><br></div>

				<?php 
					if ($alert != null) {
						echo $alert;
					}
				 ?>

				<h5><a style="color:black" href="category.php">Category</a> / Add Category</h5>

				<div class="well bs-component">
					<br>

					<form action="" method="POST" class="form-horizontal">
						
						<div class="form-group">
				      <label for="inputEmail" class="col-lg-3 control-label pull-left">Name Category</label>
				      <div class="col-lg-9">
				        <input required="" type="text" name="category_name" class="form-control" id="inputEmail" placeholder="Enter Name Category">
				      </div>
				    </div>
						
						<div class="pull-right">
						<input type="submit" value="Save" class="btn btn-primary">
						</div>
						<br><br><br>
						<div class="fix"></div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include('_template/foot.php'); ?>