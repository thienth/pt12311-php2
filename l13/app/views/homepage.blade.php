@extends('layout')
@section('content')
	@php 
		if (!isset($_SESSION['CART']) || $_SESSION['CART'] == []){
			$totalProduct = 0;
		}else{
			$totalProduct = 0;
			$cartArr = $_SESSION['CART'];
			foreach ($cartArr as $item) {
				$totalProduct+=$item['quantity'];
			}
		}
	@endphp
	<h3>Total Product: {{$totalProduct}}</h3>
	<a href="{{getUrl('clear-cart')}}" title="">Xoa gio hang</a>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>NAME</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $p)
			<tr>
				<td>{{$p->id}}</td>
				<td>
					<a href="{{getUrl('detail/'.$p->id)}}" title="">{{$p->name}}</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
@endsection