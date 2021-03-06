<?php 
		include_once 'koneksi.php';
		$results = $db->select("category");
	
 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">         
			<div class="col-lg-8">
				<div><br></div>
				<div><br></div>

				

				<h5><a style="color:black" href="variant.php">Variant</a> / Add Variant</h5>

				<div class="well bs-component">
					<br>

					<form action="variant_insert.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						
						<div class="form-group">
				      <label for="inputEmail" class="col-lg-3 control-label pull-left">Category</label>
				      <div class="col-lg-9" id="select_box">
				        <select required="" name="category" class="form-control" onchange="fetch_select(this.value);">
				        	<option disabled="" selected="" value="">--- select category first ---</option>
				        	<?php foreach ($results as $key => $value): ?>
				        		<option value="<?php echo $value['id'] ?>"><?php echo $value['category_name'] ?></option>
				        	<?php endforeach ?>
				        </select>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="" class="col-lg-3 control-label pull-left">Sentence</label>
				      <div class="col-lg-9">
				    		<select required="" class="form-control" name="sentence" id="new_select"></select>
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Variant</label>
				      <div class="col-lg-9">
				        <input required="" type="text" name="variant" class="form-control" placeholder="Enter variant">
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Translation</label>
				      <div class="col-lg-9">
				        <input required="" type="text" name="translation" class="form-control" placeholder="Enter Translation">
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">File</label>
				      <div class="col-lg-9">
				        <input  type="file" name="file" class="form-control" >
				      </div>
				    </div>

				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Description</label>
				      <div class="col-lg-9">
				        <textarea  name="description" class="form-control " rows="4"></textarea>
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

<script type="text/javascript">
function fetch_select(val)
{
console.log(val);

 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>

<?php include('_template/foot.php'); ?>