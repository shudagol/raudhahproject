<?php 
		include_once 'koneksi.php';
		$id = $_GET['id'];

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
							variant.id = $id";

		$results = $db->run($sql);
		$id_category = $results[0]['id_category'];
		$sentence = $db->select("sentence", "category = $id_category");
		
	
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

					<form action="variant_update.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

						<div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Category</label>
				      <div class="col-lg-9">
				        <input disabled=""  type="text" class="form-control" value="<?php echo $results[0]['category_name']?>" placeholder="Enter Sentence">
				      </div>
				    </div>
						<div class="form-group">
				      <label for="inputEmail" class="col-lg-3 control-label pull-left">Sentence</label>
				      <div class="col-lg-9">
				        <select required="" name="sentence" class="form-control">
				        	<?php foreach ($sentence as $key => $value): ?>
				        		<option value="<?php echo $value['id'] ?>"
				        		<?php if ($value['id']==$results[0]['sentence']) {
				        			echo "selected";
				        		} ?> 
				        		><?php echo $value['sentence'] ?></option>
				        	<?php endforeach ?>
				        </select>
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Variant</label>
				      <div class="col-lg-9">
				        <input required="" type="text" name="variant" class="form-control" value="<?php echo $results[0]['variant']?>" placeholder="Enter Sentence">
				      </div>
				    </div>
				    <div class="form-group">
				      <label  class="col-lg-3 control-label pull-left">Translation</label>
				      <div class="col-lg-9">
				        <input required="" type="text" value="<?php echo $results[0]['translation']?>"  name="translation" class="form-control" placeholder="Enter Translation">
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