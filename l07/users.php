<?php 
// Hien thi tat ca nguoi dung va so san pham ho so huu
require_once 'models/User.php';

$listUser = User::all();


 ?>
 <table>
 	<thead>
 		<tr>
 			<th>ID</th>
 			<th>Name</th>
 			<th>Email</th>
 			<th>Total Product</th>
 			<th>
 				<a href="add-user.php" title="">Add</a>
 			</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php foreach ($listUser as $u): ?>
 			<tr>
 			    <td><?php echo $u->id ?></td>
 			    <td><?php echo $u->name ?></td>
 			    <td><?php echo $u->email ?></td>
 			    <td><?php echo $u->getCountProduct() ?></td>
 		    </tr>
 		<?php endforeach ?>
 		
 	</tbody>
 </table>