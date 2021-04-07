@extends('frontend.layouts.app')
 @section('content')
<div class="col-sm-4">
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
                </div>
@endsection