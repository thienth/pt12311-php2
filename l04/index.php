<?php 

require_once 'models/BaseModel.php';
require_once 'models/Product.php';
require_once 'models/User.php';

$products = Product::all();

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