@extends('frontend.layouts.app')
 @section('content')				
<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        @if(isset($listSearch))
						@foreach($listSearch as $key=>$value)
                            <?php 
								    $img = json_decode($value->image);
							?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
							
								<div class="single-products">
								<div class="productinfo text-center">
                                        <img src="{{asset('/upload/product/'.$img['0'])}}" alt="" />
										<h2>{{$value->price}}</h2>
										<p>{{$value->name}}</p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
								
									<div class="product-overlay">
										<form class="formSubmit" method = "POST" data-id="{{$value->id}}">
											<div class="overlay-content">
											<input type= "hidden" name="price" id ="price"value= "{{$value->price}}">
											<input type= "hidden" name="name" id="name" value= "{{$value->name}}" >
											
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
                        @endif
						
					</div><!--features_items-->		
                    @endsection    