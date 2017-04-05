<?php 
		include_once 'koneksi.php';
		$id = $_GET['id'];
		$category = $db->select("category");
		$sql = "select 
						category.category_name,
						sentence.*
						from
							category join sentence 
						on
							sentence.category = category.id
						where
							sentence.id = $id";

	$results = $db->run($sql);
	
 ?>

<?php include('_template/head.php'); ?>
<?php include('_template/menu.php'); ?>

<div class="container">
	<div class="row">
		<div class="col-lg-12">         
			<div class="col-lg-8">
				<div><br></div>
				<div><br></div>

				

				<h5><a style="color:black" href="category.php">Sentence</a> / Add Sentence</h5>

				<div class="well bs-component">
					<br>

					<form action="sentence_update.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
						
						<div class="form-group">
				      <label for="inputEmail" class="col-lg-3 control-label pull-left">Category</label>
				      <div class="col-lg-9">
				        <select name="category" class="form-control">
				        	<?php foreach ($category as $key => $value): ?>
				        		<option value="<?php echo $value['id'] ?>"
				        		<?php if ($value['id']==$results[0]['category']) {
				        			echo "selected";
				        		} ?> 
				        		><?php echo $value['category_name'] ?></option>
				        	<?php endforeach ?>
				        </select>
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Sentence</label>
				      <div class="col-lg-9">
				        <input type="text" name="sentence" class="form-control" value="<?php echo $results[0]['sentence']?>" placeholder="Enter Sentence">
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Translation</label>
				      <div class="col-lg-9">
				        <input type="text" value="<?php echo $results[0]['translation']?>"  name="translation" class="form-control" placeholder="Enter Translation">
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">File</label>
				      <div class="col-lg-9">
				        <input type="file" name="file" class="form-control" ><span><?php echo $results[0]['file']?></span>
				      </div>
				    </div>

				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Description</label>
				      <div class="col-lg-9">
				        <textarea name="description" class="form-control"  rows="4"><?php echo $results[0]['description']?></textarea>
				      </div>
				    </div>
				    <input type="hidden" name="id" value=<?php echo $id ?>>
						
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