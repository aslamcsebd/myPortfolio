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
				<div id="navbar" class="collapse">
					<ul>
						<li class="active"><a href="#" data-nav-section="home">Home</a></li>
						<li><a href="#" data-nav-section="about">About</a></li>
						<li><a href="#" data-nav-section="services">Services</a></li>
						<li><a href="#" data-nav-section="skills">Skills</a></li>
						<li><a href="#" data-nav-section="education">Education</a></li>
						<li><a href="#" data-nav-section="experience">Experience</a></li>
						<li><a href="#" data-nav-section="work">Work</a></li>
						<li><a href="#" data-nav-section="contact">Contact</a></li>
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
			
			<section id="colorlib-hero" class="js-fullheight" data-section="home">
				<div class="flexslider js-fullheight">
					<ul class="slides">
						@foreach($Home as $item)
							<li style="background-image: url({{$item->image}});">
								<div class="overlay"></div>
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-8 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
											<div class="slider-text-inner js-fullheight">
												<div class="desc">
													<h1>{!!$item->firstTitle!!}</h1>
													<h2>{!!$item->secondTitle!!}</h2>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</section>

			<section class="colorlib-about" data-section="about">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-12 slides">
							<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
								<div class="col-md-12">
									<div class="about-desc">
										<span class="heading-meta">About Me</span>
										<h2 class="colorlib-heading">Who Am I?</h2>
										<p>{!!$aboutMe->description!!}</p>
									</div>
								</div>
							</div>

							<div class="row slide-track">
								@foreach($Service as $item)
									<div class="col-md-3 animate-box" data-animate-effect="{{$effect[rand(0, 3)]}}"> 
										<div class="services color-{{rand(1,6)}}">
											<span class="pull-right">{{$loop->iteration}} of {{$Service->count()}}</span>
											<span class="icon2">{!!$item->logo!!}</span>
											<h3>{{$item->title}}</h3>
										</div>
									</div>
								@endforeach								
							</div>

							<div class="row">
								<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
									<div class="hire" id="navbar" class="collapse">
										<h2>I am happy to know you that {{$Work->count()}}+ projects done sucessfully!</h2>
										<a href="#" data-nav-section="contact" class="btn-hire">Hire me</a>
										<p class="pull-right">
											<a href="#" data-nav-section="contact" class="btn-hire">Contact me</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="colorlib-services" data-section="services">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">What I do?</span>
							<h2 class="colorlib-heading">Here are some of my expertise</h2>
						</div>
					</div>
					<div class="row row-pt-md slide-track2">
						@foreach($Service as $item)
							<div class="col-md-4 text-center animate-box">
								<div class="services color-{{rand(1,6)}}">
									<span class="pull-right">{{$loop->iteration}} of {{$Service->count()}}</span>
									<span class="icon">{!!$item->logo!!}</span>
									<div class="desc">
										<h3 class="bg-info mb-0">{{$item->title}}</h3>
										<p class="bg-dark mb-0">{!!$item->description!!}</p>
									</div>
								</div>
								
							</div>
						@endforeach
					</div>
				</div>			  
			</section>
			
			<div id="colorlib-counter" class="colorlib-counters" style="background-image: url({{asset('/')}}frontend/images/cover_bg_1.jpg);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="colorlib-narrow-content">
					<div class="row">
					</div>
					<div class="row">
						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="{{$coffeeCount}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Cups of coffee</span>
						</div>

						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="{{$Work->count()}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Projects</span>
						</div>

						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="{{$Work->count()+5}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Clients</span>
						</div>
						
						<div class="col-md-3 text-center animate-box">
							<span class="colorlib-counter js-counter" data-from="0" data-to="{{$Work->count()+3}}" data-speed="5000" data-refresh-interval="50"></span>
							<span class="colorlib-counter-label">Partners</span>
						</div>
					</div>
				</div>
			</div>
			
			<section class="colorlib-skills" data-section="skills">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">My Specialty</span>
							<h2 class="colorlib-heading animate-box">My Skills</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<p>{!!$aboutSkill->description!!}</p>
						</div>

						@foreach($Skill as $item)
							<div class="col-md-6 animate-box" data-animate-effect="{{$effect[rand(0, 3)]}}">
								<div class="progress-wrap">
									<h3>{{$item->title}}</h3>
									<div class="progress">
										<div class="progress-bar color-{{rand(1,6)}}" role="progressbar" aria-valuenow="{{$item->range}}"
											aria-valuemin="0" aria-valuemax="100" style="width:{{$item->range}}%">
											<span>{{$item->range}}%</span>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</section>
			
			<section class="colorlib-education" data-section="education">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Education</span>
							<h2 class="colorlib-heading animate-box">Education</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
							<div class="fancy-collapse-panel">
								<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									@foreach($Education as $item)
			                    	<div class="panel panel-default">
			                      	<div class="panel-heading" role="tab" id="heading_{{$item->id}}">
			                        	<h4 class="panel-title">
				                          	<a class="{{($loop->iteration==1)?'':'collapsed'}}" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$item->id}}" aria-expanded="{{($loop->iteration==1)?'true':'false'}}" aria-controls="collapse_{{$item->id}}">
				                            {{$item->degree}} 
				                            [{!! date('Y-M', strtotime($item->date)) !!}]
				                          	</a>
			                        	</h4>
			                      	</div>
			                      	<div id="collapse_{{$item->id}}" class="panel-collapse collapse {{($loop->iteration==1)?'in':''}}" role="tabpanel" aria-labelledby="heading_{{$item->id}}">
				                        <div class="panel-body">
				                          {!!$item->description!!}
				                        </div>
				                     </div>
			                    	</div>
			                  @endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
			<section class="colorlib-experience" data-section="experience">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
							<span class="heading-meta">Experience</span>
							<h2 class="colorlib-heading animate-box">Work Experience</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="timeline-centered">

								@foreach($Experience as $item)
									<article class="timeline-entry animate-box" data-animate-effect="{{$effect[rand(0, 3)]}}">
										<div class="timeline-entry-inner">
											<div class="timeline-icon color-{{rand(1,6)}}">
												<i class="icon-pen2"></i>
											</div>
											<div class="timeline-label">
												<h2>
													<a href="#">{!!$item->experience!!}</a>
													<span>
														[{!! date('Y-M', strtotime($item->startDate)) !!} -- 
														{!! ($item->endDate!=null) ? date('Y-M', strtotime($item->endDate)): 'to now' !!}]
													</span>
												</h2>
												{!!$item->description!!}
											</div>
										</div>
									</article>
								@endforeach

								<article class="timeline-entry begin animate-box" data-animate-effect="fadeInBottom">
									<div class="timeline-entry-inner">
										<div class="timeline-icon color-none">
										</div>
									</div>
								</article>

							</div>
						</div>
					</div>
				</div>
			</section>
			
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

			<section class="colorlib-contact" data-section="contact" id="contact">
				<div class="colorlib-narrow-content">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="{{$effect[rand(0, 3)]}}">
							<span class="heading-meta">Get in Touch</span>
							<h2 class="colorlib-heading">Contact</h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							@foreach($Contact as $item)
								<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="{{$effect[rand(0, 3)]}}">
									<div class="colorlib-icon">
										{!!$item->logo!!}
									</div>
									<div class="colorlib-text">
										{!!$item->details!!}
									</div>
								</div>
							@endforeach
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-12 animate-box" data-animate-effect="fadeInRight">
									<form action="{{ url('addContactEmail') }}" method="post" enctype="multipart/form-data" class="needs-validation">
										@csrf
										<div class="form-group">
											<input type="text" name="name" class="form-control" placeholder="Name" required>
										</div>
										<div class="form-group">
											<input type="text" name="email" class="form-control" placeholder="Email" required>
										</div>
										<div class="form-group">
											<input type="text" name="subject" class="form-control" placeholder="Subject" required>
										</div>
										<div class="form-group">
											<textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-send-message" value="Send Message">
										</div>
									</form>
								</div>								
							</div>
						</div>
					</div>
				</div>
			</section>
			
		</div>
	</div>
</div>

@endsection
