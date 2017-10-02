<?php 
// tao form de dien thong tin cho san pham moi
require_once 'models/User.php';

$users = User::all();

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<title></title>
 	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<script src="jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="bootbox.min.js"></script>
 </head>
 <body>
 	<div class="container">
 		<div class="col-sm-8 col-sm-offset-2">
 			<form action="product-save-add.php" method="post" >
 				
 				<div class="form-group">
 					<label for="">Product name</label>
 					<input type="text" name="name" class="form-control" value="" placeholder="">
 				</div>

 				<div class="form-group">
 					<label for="">Product price</label>
 					<input type="number" name="price" class="form-control" value="" placeholder="">
 				</div>
 				<div class="form-group">
 					<label for="">Product detail</label>
 					<textarea name="detail" class="form-control"></textarea>
 				</div>
 				<div class="form-group">
 					<label for="">Owner</label>
 					<select name="created_by" class="form-control">
 						<?php foreach ($users as $u): ?>
 							<option value="<?php echo $u->id ?>">
 								<?php echo $u->name ?>
 							</option>
 						<?php endforeach ?>
 					</select>
 				</div>

 				<div class="text-center">
 					<a href="index.php" class="btn btn-danger">Cancel</a>
 					<button type="submit" class="btn btn-success">Save</button>
 				</div>
 			</form>
 		</div>	
 	</div>
 	<script>
 		
 	</script>
 </body>
 </html>