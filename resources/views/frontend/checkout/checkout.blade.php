@extends('frontend.layouts.app')
 @section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->
			<?php if(Auth::check()!= 1){?>
			<div class="step-one">
				<h2 class="heading">Step1</h2>
			</div>
			<div class="checkout-options">
				<h3>New User</h3>
				<p>Checkout options</p>
				<ul class="nav">
					<li>
						<label><input type="checkbox"> Register Account</label>
					</li>
					<li>
						<label><input type="checkbox"> Guest Checkout</label>
					</li>
					<li>
						<a href=""><i class="fa fa-times"></i>Cancel</a>
					</li>
				</ul>
			</div><!--/checkout-options-->

			<div class="register-req">
				<p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
			</div><!--/register-req-->

			<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						@if(session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                        {{session('success')}}
                                    </div>
                                @endif
                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-check"></i> Thông báo!</h4>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
						<form method="post" enctype="multipart/form-data">
                            @csrf
							<input type="text" name="name" placeholder="Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
                            <input type="password" name="password" placeholder="Password"/>
							<input type="number" name="phone" placeholder="Phone">
							<input type="text" name="address" placeholder="Address">
							<input type="file" name="avatar" placeholder="avatar">
							<select class="form-control form-control-lineid_country" name="id_country" >
								@foreach($listCountry as $row)
									
								<option value="{{$row->id}}" >{{$row->country}}</option>
									
								@endforeach        
                            </select>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
					<?php } ?>
			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
				
					<tbody>
					<?php $totalall= 0; ?>
					@foreach($listAddCart as $key=>$value)
					<?php 
						$totalall= $totalall+ $value->price*$value->qty;
						$img = json_decode($value->image);
                    ?>
					<tr role="row" id="tr{{$value->id}}">
						<td class="cart_product">
								<a href=""><img src="{{asset('/upload/product/'.$img['0'])}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$value->name}}</a></h4>
								
							</td>
							<td class="cart_price">
								<p>{{$value->price}}$</p>
							</td>
							
							
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<button data-id="{{$value->id}}" data-price="{{$value->price}}" type="submit" class="cart_quantity_up"> + </button>
									<input class="cart_quantity_input" id="qty{{$value->id}}"  type="text" name="quantity"type="text" name="quantity" value="{{$value->qty}}" autocomplete="off" size="2">
									<button data-id="{{$value->id}}" data-price="{{$value->price}}" type="submit"class="cart_quantity_down" > - </button>
								</div>
							</td>
							
							<td class="cart_total">
								<p class="cart_total_price" id="total{{$value->id}}"> <?php echo $value->price*$value->qty."$" ; ?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" data-id="{{$value->id}}"data-price="{{$value->price}}"  ><i class="fa fa-times"></i></a>
							</td>	
						</tr>
						@endforeach
						<tr>
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Sub Total</td>
										<td><span id="totalAll"><?php  echo $totalall."$";?></td>
									</tr>
									<tr>
										<td>Exo Tax</td>
										<td>$2</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost</td>
										<td>Free</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>$61</span></td>
									</tr>
								</table>
								<a class="btn btn-default check_out" href="{{ url('/checkoutMail') }}">Check Out</a>
							</td>
						</tr>
					</tbody>
					
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>
    </section> <!--/#cart_items-->
	<script type="text/javascript">
	$(document).ready(function(){
		$(".cart_quantity_up").click(function(e){
			var id_item = $(this).data('id');
			var price = parseInt($(this).data('price'));	
			var totalAll = parseInt($('#totalAll').html())
			// console.log(id_item)
			$.ajax({
				method: 'POST',
				url : "{{ url('/checkoutUp') }}",
				data: {"_token": "{{ csrf_token() }}",
				id_item : id_item, type : 'up'},
				// console.log(id_item);
				success: function(res){
					// alert(res)
					$('#qty' + id_item).val(res); 
					$('#total'+ id_item).text(res*price+'$'); 
					var result = totalAll + price;
					$('#totalAll').html(result+" $")  
					
				}
			})
		});

		$(".cart_quantity_down").click(function(e){
			e.preventDefault();
			var id_item = $(this).data('id');
			var price = parseInt($(this).data('price'));
			var totalAll = parseInt($('#totalAll').html());
			$.ajax({
				method: 'POST',
				url : "{{ url('/checkoutUp') }}",
				data: {"_token": "{{ csrf_token() }}",
				id_item : id_item, type : 'down'},
				success: function(res){
					$('#qty' + id_item).val(res); 
					$('#total'+ id_item).text(res*price+'$');
						var result = totalAll - price;
						$('#totalAll').html(result+" $")  
					if(res<1){
						$('#tr'+id_item).remove('tr');
					}
				}
			})
		});
		$(".cart_quantity_delete").click(function(e){
			e.preventDefault();
			var id_item = $(this).data('id');
			var price = parseInt($(this).data('price'));
			var totalAll = parseInt($('#totalAll').html());
			$.ajax({
				method: 'POST',
				url : "{{ url('/checkoutUp') }}",
				data: {"_token": "{{ csrf_token() }}",
				id_item : id_item, type : 'delete'},
				success: function(res){
					$('#tr'+id_item).remove('tr');
					var result = totalAll - (price*res);
					console.log(price);
						$('#totalAll').html(result+" $")  
				}
			})
		});
		// $(".check_out").click(function(e){
		// 	e.preventDefault();
		// 	var totalAll = parseInt($('#totalAll').html());
		// 	$.ajax({
		// 		method: 'POST',
		// 		url : "{{ url('/checkoutMail') }}",
		// 		data: {"_token": "{{ csrf_token() }}",
		// 		totalAll : totalAll},
		// 		success: function(res){
		// 			alert(res); 
		// 		}
		// 	})
		// });
	});
</script>
    @endsection
