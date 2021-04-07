@extends('frontend.layouts.app')
 @section('content')
 <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<form action="" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control form-control-line"  placeholder="Name">
                        <br>
                        <select class="form-control form-control-line" name="price" >
                        <option value="">Choose price</option>
                        <option value="1-100">1-100</option>
                        <option value="100-300">100-300</option>
                        <option value="300-500">300-500</option>
                        </select>
                        <br>
                        <select class="form-control form-control-line" name="category" >
									<option value=""> Vui lòng chọn category </option>
                                @foreach($listCategory as $row)
                                    <option value="{{$row->id}}" >{{$row->category}}</option>
                                    
                                @endforeach        
                        </select>
                        <br>
                        <select class="form-control form-control-line" name="brand" >
                            <option value=""> Vui lòng chọn Brand </option>
                            @foreach($listBrand as $row2)
                                <option value="{{$row2->id}}">{{$row2->brand}}</option>
                                
                            @endforeach        
                        </select>
                        <br>
                        <button type="submit" class="btn btn-default get">Search</button>
                        </form>
                        
                        
					</div><!--features_items-->					
			</div>		
 @endsection   