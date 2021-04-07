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
                <section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
            
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
                            <td class="id">ID</td>
                            <td class="description">Name</td>
							<td class="price">Price</td>
							<td class="Image">Image</td>
                            <td colspan ="2" >Action</td>
						</tr>
					</thead>
                    @foreach($listProduct as $row)

                    <?php 
                        $img = json_decode($row->image);
                    ?>
					<tbody>
                        <tr>
                            <td role="row">{{$row->id}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->price}}</td>    
                            <td class="cart_product"><img src="{{asset('/upload/product/'.$img['0'])}}" width='100px' height='100px'></td>
                            <td><a href="/account/product/edit/{{$row->id}}" class="btn btn-success">Edit</a></td>
                            <td>
                                <form method="POST" action="/account/product/delete/{{$row->id}}" onsubmit="return ConfirmDelete( this )">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-success">Delete</button>
                                </form>
                            </td>
                            

                        </tr>	
					</tbody>
                    @endforeach
                </table>
			</div>
		</div>
	</section> <!--/#cart_items-->
            </div>
            <a href="{{url('/account/product/add')}}" class="btn btn-default check_out">ADD NEW</a>
		</div>
	</section><!--/form-->
@endsection