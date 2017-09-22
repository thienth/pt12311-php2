<?php 

require_once 'models/BaseModel.php';
require_once 'models/Product.php';
require_once 'models/User.php';

$products = Product::where(['name', 'like', '%iphone%'])->get();
echo "<pre>";
var_dump($products);die; 

 ?>
 <table>
 	<thead>
 		<tr>
 			<th>ID</th>
 			<th>name</th>
 			<th>Price</th>
 			<th>Owner</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php 
 		foreach ($products as $pr) {
 			?>
 			<tr>
 			   <td>
 			   	<?= $pr->id?>
 			   </td>
 			   <td>
 			   	<?= $pr->name?>
 			   </td>
 			   <td>
 			   	<?= $pr->price?>
 			   </td>
 			   <td>
 			   	<?= $pr->getOwner()->name ?>
 			   </td>
 		    </tr>

 			<?php
 			# code...
 		}

 		 ?>
 		
 	</tbody>
 </table>