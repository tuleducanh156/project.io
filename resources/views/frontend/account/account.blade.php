@extends('frontend.layouts.app')
 @section('content')
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
						<h2>User Update!</h2>
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
						<form action="#" method="post" enctype="multipart/form-data">
						@csrf
							<input type="text" name="name" placeholder="Name" value="{{$users->name}}"/>
							
							<input type="email" name ="email" placeholder="Email" value="{{$users->email}}"/>
							
                            <input type="number" name ="password" placeholder="Password" value="{{$users->password}}"/>
							
                            <input type="text" name = "address" placeholder="Address" value="{{$users->address}}"/>
							
                            <select class="form-control form-control-line" name="id_country" >
                                                @foreach($listCountry as $row)
                                                    
                                                    <option value="{{$row->id}}" <?= $row->id == $users['id_country'] ? "selected" : ""; ?>>{{$row->country}}</option>
                                                    
                                                 @endforeach        
                            </select>
							
                            <input type="text" name="phone" placeholder="Phone" value="{{$users->phone}}"/>
							
                            <input type="file" name="avatar" value="{{$users->avatar}}">
						
							<button type="submit" name ="update" class="btn btn-default">Update</button>
							<p>
 								
							</p>
							
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
@endsection