@extends('frontend.master')
	@php
		$effect = array('fadeInLeft', 'fadeInRight', 'fadeInTop', 'fadeInBottom');
		$color = array('bg-primary', 'bg-secondary', 'bg-success', 'bg-info', 'bg-warning', 'bg-danger', 'bg-dark');
		$coffeeCount = ((date('Y')-2017)*12+date('m'))*20+date('d');
	@endphp
@section('content')
 @include('common.alertMessage')

<div id="colorlib-page">
	<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight" style="">
			<div class="text-center">
				<img class="author-img" 
					src="{{ !empty($profilePicture->image) ? $profilePicture->image:
						'public/images/profilePicture/default.jpg' }}" alt="Image not found">
				<h1 id="colorlib-logo"><a href="#">Md Aslam Hossain</a></h1>
				<span class="position"><a href="https://www.google.com/search?sxsrf=ALeKk00UZVgWw4qePXzSqdfiqwFagXRyeQ:1628416336519&q=What+is+meant+by+full+stack+developer%3F&sa=X&ved=2ahUKEwj7gKPKk6HyAhV6xzgGHSZbC4YQzmd6BAgOEAU&biw=1280&bih=577&dpr=1.5" target="_blank">Full stack developer</a> in Bangladesh</span>
			</div>
			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<p class="text-center"><a  href="https://www.aslambd.com/" target="_blank">See full portfolio</a></p>				
				<div id="navbar" class="collapse">
					<ul>
						<li class="active"><a href="#" data-nav-section="work">All project</a></li>
					</ul>
				</div>
			</nav>
			<div class="colorlib-footer">
				<ul>
					@foreach($SocialSite as $social)
						<li><a href="{{$social->socialUrl}}" target="_blank" title="{!!$social->socialName!!}">{!!$social->socialLogo!!}</a></li>
					@endforeach
				</ul>
				<p>
					<small>
						&copy; Copyright <script>document.write(new Date().getFullYear());</script>
						All rights reserved.
					</small>
				</p>
			</div>
		</aside>

		<div id="colorlib-main">	
			
			<section class="colorlib-work" data-section="work">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">My Work</span>
							<h2 class="colorlib-heading animate-box">Recent Work</h2>
						</div>
					</div>
						
					<fieldset>
						<legend>Project List [{{$Work->count()}}]</legend>
						<div class="work" style="height:300px;">
						  	<ul class="nav nav-tabs col-md-4" role="tablist">
						    	<li role="presentation" class="active">
						    		<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Project overview [click below]</a>
						    	</li>
						 		@foreach($Work as $item)						    		
						    		<li>
						    			<a href="#project{{$item->id}}" data-toggle="tab">{{$loop->iteration}}) {{$item->name}}</a>
						    		</li>
						    	@endforeach
						   </ul>

						  	<div class="tab-content col-md-8">
						    	<div role="tabpanel" class="tab-pane active" id="home">
						    		<div class="animate-box" data-animate-effect="fadeInLeft">
						    			<ul>
							    			@foreach($Work as $item)
							    			<li>
							    				{{$item->name}} [{{$item->date}}]
							    			</li>
							    			@endforeach
						    			</ul>						    				
						    		</div>
						    	</div>
						    	@foreach($Work as $item)
							    	<div class="tab-pane" id="project{{$item->id}}">
										<div class="animate-box" data-animate-effect="{{$effect[rand(0, 3)]}}">
											<div class="project" style="background-image: url({{$item->image}});">
												<div class="desc">
													<div class="con">
														<h3>
															<a href="{{$item->link}}">Project No : {{$loop->iteration}} of {{$Work->count()}}</a>
															<a href="{{$item->link}}" class="pull-right">Complete date : {{$item->date}}</a>
														</h3>
														<span class="justify">{!!$item->description!!}</span>
														<p class="icon">
															@if($item->github!=null)
																<span>
																	<a href="{{$item->github}}" target="_blank" title="See github link"><i class="fab fa-github"></i>  
																	</a>
																</span>
															@endif
															@if($item->link!=null)
																<span>
																	<a href="{{$item->link}}" target="_blank" title="See this project"><i class="fas fa-external-link-alt"></i></a>
																</span>
															@endif
															<br>
															@if($item->skill!=null)
																<span>
																	<b>Language : </b> {!!$item->skill!!}
																</span>
															@endif
														</p>
													</div>
												</div>
											</div>
										</div>
							    	</div>
						    	@endforeach

						  	</div>
						</div>
					</fieldset>

				</div>
			</section>

		</div>
	</div>
</div>

@endsection
