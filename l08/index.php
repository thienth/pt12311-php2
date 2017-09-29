<?php 
	require_once 'models/Product.php';


	$allProduct = Product::all(); 

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
 		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Product name</th>
					<th>Price</th>
					<th>Detail</th>
					<th>Owner</th>
					<th>
						<a href="product-add.php" class="btn btn-success">Add</a>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($allProduct as $pro): ?>
					<tr>
						<td><?php echo $pro->id ?></td>
						<td><?php echo $pro->name ?></td>
						<td><?php echo $pro->price ?></td>
						<td><?php echo $pro->detail ?></td>
						<td><?php echo $pro->created_by ?></td>
						<td>
							<a href="product-edit.php?id=<?php echo $pro->id ?>" class="btn btn-info">Edit</a>
							<button src="product-remove.php?id=<?php echo $pro->id ?>" class="btn btn-danger btn-remove">Remove</button>
						</td>
					</tr>					
				<?php endforeach ?>
			</tbody>
		</table>	
 	</div>
 	<script>
 		$(document).ready(function(){
 			$('.btn-remove').on('click', function(){
 				var url = $(this).attr('src');
 				bootbox.confirm("Ban co that su muon xoa san pham nay?", 
 					function(result){ 
 						if(result){
 							window.location.href = url;
 						}
					});
 			})

 		});
 	</script>
 </body>
 </html>