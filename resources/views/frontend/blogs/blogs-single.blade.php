@extends('frontend.layouts.app')
 @section('content')
 <link type="text/css" rel="stylesheet" href="{{ asset('rate/css/rate.css') }}">

 <div class="col-sm-9">
l<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>{{$BlogsSingle->title}}</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> {{$BlogsSingle->created_at}}</li>
									
								</ul>
								<span>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-half-o"></i>
								</span>
							</div>
							
								<img src="{{asset('/upload/user/blogs/'.$BlogsSingle->image)}}" alt="">
							
							<p>{{$BlogsSingle->description}}</p> <br>

							<p>
                            {!!$BlogsSingle->content!!}
							</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->

					<div class="rate">
                <div class="vote" data-id=" {{$BlogsSingle->id}}">
				
				<?php
					for($i= 1 ; $i<6 ; $i++){
		
				?>
					<div class="star_<?php echo $i;?> ratings_stars <?= $i <= $diem_rate_tb ? "ratings_over" : ""?>">
					<input value="<?php echo $i; ?>" type="hidden"></div>
				<?php	
					}
				?>
				
			
                    <span class="rate-np">{{$diem_rate_tb}}</span>
                </div> 
			
            </div>

					<div class="socials-share">
						<a href=""><img src=" {{asset('/public/document_FE/images/blog/socials.png')}}" alt=""></a>
					</div><!--/socials-share-->

					<div class="media commnets">
						<a class="pull-left" href="#">
							<img class="media-object" src="{{asset('/public/document_FE/images/blog/man-one.jpg')}}" alt="">
						</a>
						<div class="media-body">
							<h4 class="media-heading">Annie Davis</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							<div class="blog-socials">
								<ul>
									<li><a href=""><i class="fa fa-facebook"></i></a></li>
									<li><a href=""><i class="fa fa-twitter"></i></a></li>
									<li><a href=""><i class="fa fa-dribbble"></i></a></li>
									<li><a href=""><i class="fa fa-google-plus"></i></a></li>
								</ul>
								<a class="btn btn-primary"  href="">Other Posts</a>
							</div>
						</div>
					</div><!--Comments-->
					<div class="response-area">
						<h2>3 RESPONSES</h2>
						
						<ul class="media-list">
						@foreach($BlogsCmt as $row)
						<?php if($row->level ==0 ) { ?>   
							<li class="media">
								
								<a class="pull-left" href="#">
									<img style="width:100px" class="media-object" src="{{asset('/upload/user/avatar/'. $row->avatar_member)}}" alt="">
								</a>
								<div class="media-body">
									<ul class="sinlge-post-meta">
										
										<li><i class="fa fa-user"></i>{{$row->name_member}}</li>
											
										<li><i class="fa fa-clock-o"></i> {{$row->created_at}}</li>
									</ul>
									<p>{{$row->message}}</p>
									<a class="btn btn-primary btn-replay" data-id="{{$row->id}}" data-name="{{$row->name_member}}"href="#cmt"><i class="fa fa-reply"></i>Replay</a>
								</div>
							</li > 
							<?php } ?>
							
							
								@foreach($BlogsCmt as $row_reply)
								<?php if( $row_reply->level == $row->id ){ ?>
									<li class="media second-media">
										<a class="pull-left" href="#">
											<img class="media-object" src="{{asset('/upload/user/avatar/'. $row_reply->avatar_member)}}" alt="">
										</a>
										<div class="media-body">
											<ul class="sinlge-post-meta">
												<li><i class="fa fa-user"></i>{{$row_reply->name_member}}</li>
												<li><i class="fa fa-clock-o"></i> {{$row_reply->created_at}}</li>
											</ul>
											<p>{{$row_reply->message}}</p>
											<a class="btn btn-primary" href=""><i class="fa fa-reply"></i>Replay</a>
										</div>
									</li>
							
								<?php } ?>
							
								@endforeach
							
						@endforeach	
						</ul>
									
					</div><!--/Response-area-->
					<div class="replay-box">
						<div class="row">
							
							<div class="col-sm-8">
								<div class="text-area">
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
									<form id="cmt" action="{{ url('/comment_blogs')}}" method="post" >
										@csrf
										<div class="blank-arrow">
											<label>Your Name</label>
										</div>
											<span>*</span>
											<input type="hide" name="id_blogs" class="id_blogs" value="{{$BlogsSingle->id}}">
											<input type="hide" name="id_cha" class="id_cha" value="">
											<textarea name="message" id="message" rows="11"></textarea>
											<button class="btn btn-primary" type="submit" >post comment</button>
										<div id="ermessage">

										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div><!--/Repaly Box-->
					
<script type="text/javascript">
    	
    	$(document).ready(function(){
			//vote
		
			$('.ratings_stars').hover(
	            // Handles the mouseover
	            function() {
	                $(this).prevAll().andSelf().addClass('ratings_hover');
	                // $(this).nextAll().removeClass('ratings_vote'); 
	            },
	            function() {
	                $(this).prevAll().andSelf().removeClass('ratings_hover');
	                // set_votes($(this).parent());
	            }
	        );

			$('.ratings_stars').click(function(){
				
				var Values =  $(this).find("input").val();
				var AuthCheck =  "{{Auth::check()}}";
				var id_blogs= $(this).closest(".vote").data('id'); 
				
				
				if(AuthCheck!=1){
					alert('Vui lòng đăng nhập để đánh giá!');
				}else{
					if ($(this).hasClass('ratings_over')) {
		           		$('.ratings_stars').removeClass('ratings_over');
		            	$(this).prevAll().andSelf().addClass('ratings_over');
		        	} else {
		        		$(this).prevAll().andSelf().addClass('ratings_over');
					}
					
					$.ajax({
						method:"POST",
						url:"{{ url('/rate_blogs') }}",
						data :{"_token": "{{ csrf_token() }}",
							Values:Values,
							id_blogs:id_blogs},
						success : function(res){
							alert(res)
							
						}
					});
				}
				
		    	
		    });
			$('.btn-primary').click(function(){
				var AuthCheck =  "{{Auth::check()}}";
				if(AuthCheck!=1){
					alert('Vui lòng đăng nhập để đánh giá!');
				}

			});
			$('.btn-replay').click(function(){
				var id_cha = $(this).attr("data-id");
				var Name_cha = $(this).attr("data-name");
				var AuthCheck =  "{{Auth::check()}}";
				$('.id_cha').val( id_cha);
				if(AuthCheck!=1){
					alert('Vui lòng đăng nhập để đánh giá!');
				}else{
					$.ajax({
						method:"POST",
						url:"{{ url('/comment_blogs') }}",
						data :{"_token": "{{ csrf_token() }}",
						id_cha:id_cha},
						success : function(res){
							alert()	
						}
					});
				}
			});
		});
</script>
 @endsection