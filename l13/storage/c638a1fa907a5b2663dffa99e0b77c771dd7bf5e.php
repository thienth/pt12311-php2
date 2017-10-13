<?php $__env->startSection('content'); ?>
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
	<h3>Total Product: <?php echo e($totalProduct); ?></h3>
	<a href="<?php echo e(getUrl('clear-cart')); ?>" title="">Xoa gio hang</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($p->id); ?></td>
				<td>
					<a href="<?php echo e(getUrl('detail/'.$p->id)); ?>" title=""><?php echo e($p->name); ?></a>
				</td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>