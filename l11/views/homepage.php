<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php 
		if (!isset($_SESSION['CART']) || $_SESSION['CART'] == []){
			$totalProduct = 0;
		}else{
			$totalProduct = 0;
			$cartArr = $_SESSION['CART'];
			foreach ($cartArr as $item) {
				$totalProduct+=$item['quantity'];
			}
		}
		?>
	<h3>Total Product: <?php echo $totalProduct ?></h3>
	<a href="<?php echo getUrl('clear-cart') ?>" title="">Xoa gio hang</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($products as $p): ?>
			<tr>
				<td><?php echo $p->id ?></td>
				<td>
					<a href="<?php echo getUrl('detail?id='.$p->id) ?>" title=""><?php echo $p->name ?></a>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</body>
</html>