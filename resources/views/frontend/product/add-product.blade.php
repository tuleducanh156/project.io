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
						<h2>CREATE ITEM</h2>
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
							<input type="text" name="name" id="name" placeholder="Name"/>
							
							<input type="number" name ="price" id="price" placeholder="Price"/>

                            <select class="form-control form-control-line" name="category" >
									<option > Vui lòng chọn category </option>
                                @foreach($listCategory as $row)
                                    <option value="{{$row->id}}" >{{$row->category}}</option>
                                    
                                @endforeach        
                            </select>
                            
                            <select class="form-control form-control-line" name="brand" >
								<option > Vui lòng chọn Brand </option>
                                @foreach($listBrand as $row2)
                                    <option value="{{$row2->id}}">{{$row2->brand}}</option>
                                    
                                @endforeach        
                            </select>
                            
                            <select class="form-control form-control-line" name="sale" id ="sale" onchange="myFunction()" >
                                                <option > Tình trạng sản phẩm </option>
                                                <option value ="0"> NEW </option>
                                                <option value="1"> SALE </option>
                            </select>
                            
                            <input type="hidden" name="num_sale" id="num_sale" placeholder=" giá sale">

                            <input type="text" name="namecompany" placeholder=" tên công ty">

                            <input type="file" name ="image[]"  id="image" multiple/>

                            <textarea name="detail" id="detail" cols="30" rows="10" placeholder="detail"></textarea>
							
							<button type="submit" name ="addnew" id="addnew"class="btn btn-default">ADD</button>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
    </section><!--/form-->
    <script type="text/javascript">
        function myFunction() {
        var x = document.getElementById("sale").value;
        if(x== 1){
            document.getElementById("num_sale").type = 'number' ;
        } else {
			document.getElementById("num_sale").type = 'hidden' ;
		}
        }
    </script>
    @endsection