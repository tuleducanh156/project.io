@extends('frontend.layouts.app')
 @section('content')				
<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						@foreach($ShowProduct as $row)
							<?php 
								$img = json_decode($row->image);
							?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
							
								<div class="single-products">
								<div class="productinfo text-center">
										<img src="{{asset('/upload/product/'.$img['0'])}}" alt="" />
										<h2>{{$row->price}}</h2>
										<p>{{$row->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<!-- <div class="product-overlay">
										<div class="overlay-content">
											<h2>{{$row->price}}</h2>
											<p>{{$row->name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div> -->
									<div class="product-overlay">
										<form class="formSubmit" method = "POST" data-id="{{$row->id}}">
											<div class="overlay-content">
											<input type= "hidden" name="price" id ="price"value= "{{$row->price}}">
											<input type= "hidden" name="name" id="name" value= "{{$row->name}}" >
											<input type= "hidden" name="image" id="image" value= "{{$img['0']}}" >
											<button type="submit" name="savesm4"  class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
											</div>
										</form>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
								
							</div>	
						</div>
						@endforeach
						<!-- <ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul> -->
					</div><!--features_items-->					
					
<script type="text/javascript">
	$(document).ready(function(){
		$(".formSubmit").on('submit',function(e){
			e.preventDefault();
			var id_item = $(this).data('id');
			// var AuthCheck =  "{{Auth::check()}}";
			// console.log(id_item)
			// if(AuthCheck!=1){
			// 			alert('Vui lòng đăng nhập để mua hàng!');
			// }else{
				$.ajax({
					method: "POST",
					url: "{{ url('/addcart') }}",
					data: {"_token": "{{ csrf_token() }}",
						id_item: id_item},
					success : function(response){
						alert($success);
					}
				});
					
			
		});
				
			
	});

</script>
 @endsection                      