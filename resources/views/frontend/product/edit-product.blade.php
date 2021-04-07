@extends('frontend.layouts.app')
 @section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
			<div class="left-sidebar">
				<h2>ACCOUNT</h2>
				<div class="panel-group category-products" id="accordian" >
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class= "panel-title">
								<a href="{{url('/account')}}">	
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									My Account
								</a>
							</h4>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class= "panel-title">
								<a href="{{url('/account/product')}}">	
									<span class="badge pull-right"><i class="fa fa-plus"></i></span>
									My Product
								</a>
							</h4>
						</div>
					</div>
				</div>
				
			</div>
				<div class="col-sm-4 col-sm-offset-1">
                <div class="signup-form"><!--sign up form-->
						<h2>UPDATE ITEM</h2>
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
						<form action="#" method="POST" id="form_addnew" enctype="multipart/form-data">
						@csrf
							<input type="text" name="name" id="name" value="{{$EditProduct->name}}" placeholder="Name"/>
							
							<input type="number" name ="price" id="price" value="{{$EditProduct->price}}" placeholder="Price"/>

                            <select class="form-control form-control-line" name="category" >
									<option > Vui lòng chọn category </option>
                                @foreach($listCategory as $row)
                                    <option value="{{$row->id}}"<?= $row->id == $EditProduct['category'] ? "selected" : ""; ?> >{{$row->category}}</option>
                                    
                                @endforeach        
                            </select>
                            <select class="form-control form-control-line" name="brand" >
								<option > Vui lòng chọn Brand </option>
                                @foreach($listBrand as $row2)
                                    <option value="{{$row2->id}}" <?= $row2->id == $EditProduct['brand'] ? "selected" : ""; ?>>{{$row2->brand}}</option>
                                    
                                @endforeach        
                            </select>
                            
							<select class="form-control form-control-line" name="sale" id ="sale" onchange="myFunction()" >
                                                <option > Tình trạng sản phẩm </option>
												
                                                <option value ="0"<?= "0" == $EditProduct['sale'] ? "selected" : ""; ?> > NEW </option>
                                                <option value="1" <?= "1" == $EditProduct['sale'] ? "selected" : ""; ?>> SALE </option>
                            </select>
							 
							<input type="number" name="num_sale" id="num_sale" value="{{$EditProduct->numsale}}" placeholder=" giá sale">

							<input type="text" name="namecompany" value="{{$EditProduct->namecompany}}" placeholder=" tên công ty">

							<input type="file" name ="image[]" value="" id="image" multiple/>
						
							@foreach($getImage as $key=> $value)
							<img src="{{asset('upload/product/'.$value)}}"  width="100px" height="100px">
							@endforeach
							
							<textarea name="detail" id="detail" cols="30" rows="10" placeholder="detail">{{$EditProduct->detail}}</textarea>

							<button type="submit" name ="update" id="update"class="btn btn-default">Update</button>


                            
                            <!--  -->
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
    </section><!--/form-->
    
    @endsection