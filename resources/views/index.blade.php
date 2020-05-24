@extends('layouts.master')
@section('content')
    <!-- Start Slider Area -->
    <div id="home" class="slider-area">
        <div class="bend niceties preview-2">
        <div id="ensign-nivoslider" class="slides">
            @foreach($slides as $slide)
                <img src="{{asset($slide->photo)}}" alt="" title="#slider-direction-{{$slide->id}}" />
            @endforeach
        </div>
        @foreach($slides as $slide)
            <!-- direction 1 -->
            <div id="slider-direction-{{$slide->id}}" class="slider-direction slider-one">
                <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="slider-content">
                        <!-- layer 1 -->
                        <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                        <h2 class="title1">{{$slide->title}}</h2>
                        </div>
                        <!-- layer 2 -->
                        <div class="layer-1-2 wow slideInUp" data-wow-duration="2s" data-wow-delay=".1s">
                        <h1 class="title2">{{$slide->short_description}}</h1>
                        </div>
                        <!-- layer 3 -->
                        <div class="layer-1-3 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                        <a class="ready-btn right-btn page-scroll" href="#services">See Services</a>
                        <a class="ready-btn page-scroll" href="#about">Learn More</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

        @endforeach
        </div>
    </div>
    <!-- End Slider Area -->

  <!-- Start About area -->
  <div id="about" class="about-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>About Us</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single-well start-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-left">
            <div class="single-well">
              <a href="#">
                    <img src="{{asset($about->featured_photo)}}" alt="">
                </a>
            </div>
          </div>
        </div>
        <!-- single-well end-->
        <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="well-middle">
            <div class="single-well">
              <a href="#">
                <h4 class="sec-head">{{$about->title}}</h4>
              </a>
             {!! $about->description !!}
             
            </div>
          </div>
        </div>
        <!-- End col-->
      </div>
    </div>
  </div>
  <!-- End About area -->
<!-- Start Service area -->
    <div id="services" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>Our Services</h2>
          </div>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
            @foreach($services as $s)
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="about-move">
                    <div class="services-details">
                        <div class="single-services">
                        <a class="services-icon" href="#">
                            <i class="{{$s->icon}}"></i>
                        </a>
                        <h4>{{$s->title}}</h4>
                        <p>
                            {{$s->description}}
                        </p>
                        </div>
                    </div>
                    <!-- end about-details -->
                    </div>
                </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->

  <!-- Start Wellcome Area -->
    <div class="wellcome-area">
        <div class="well-bg">
          <div class="test-overly"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="wellcome-text">
                  <div class="well-text text-center">
                    <h2>Welcome To Our eBusiness</h2>
                    <p>
                      Busuness Lorem ipsum dolor sit amet, consectetur adipiscing elit.luctus est eget congue.
                    </p>
                    <div class="subs-feilds">
                      <div class="suscribe-input">
                        <input type="email" class="email form-control width-80" id="sus_email" placeholder="Email">
                        <button type="submit" id="sus_submit" class="add-btn width-20">Subscribe</button>
                        <div id="msg_Submit" class="h3 text-center hidden"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    <!-- End Wellcome Area -->

    <!-- Start team Area -->
    <div id="team" class="our-team-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our special Team</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="team-top">
            @foreach($teams as $t)
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="single-team-member">
                  <div class="team-img">
                    <a href="#">
                        <img src="{{asset($t->photo)}}" alt="">
                      </a>
                    <div class="team-social-icon text-center">
                      <ul>
                        <li>
                          <a href="{{$t->facebook}}">
                              <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                          <a href="{{$t->linkedin}}">
                              <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
                  <div class="team-content text-center">
                    <h4>{{$t->name}}</h4>
                    <p>{{$t->position}}</p>
                  </div>
                </div>
              </div>
            <!-- End column -->
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <!-- End Team Area -->

    <!-- Start portfolio Area -->
    <div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Our Portfolio</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start Portfolio -page -->
          <div class="awesome-project-1 fix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="awesome-menu ">
                <ul class="project-menu">
                  <li>
                    <a href="#" class="active" data-filter="*">All</a>
                  </li>
                  @foreach($cats as $c)
                  <li>
                    <a href="#" data-filter=".cat{{$c->id}}">{{$c->name}}</a>
                  </li>
                  @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
          <div class="awesome-project-content">
            <!-- single-awesome-project start -->
            @foreach($ports as $p)
            
            <div class="col-md-4 col-sm-4 col-xs-12 cat{{$p->category_id}}">
              <div class="single-awesome-project">
                <div class="awesome-img">
                  <a href="#"><img src="{{asset($p->photo)}}" alt="" /></a>
                  <div class="add-actions text-center">
                    <div class="project-dec">
                      <a class="venobox" data-gall="myGallery" href="img/portfolio/1.jpg">
                        <h4>{{$p->title}}</h4>
                        <span>{{$p->name}}</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <!-- single-awesome-project end -->
            
          </div>
        </div>
      </div>
    </div>
    <!-- awesome-portfolio end -->


  <!-- Start reviews Area -->
  <div class="reviews-area hidden-xs">
    <div class="work-us">
      <div class="work-left-text">
        <a href="#">
						<img src="img/about/2.jpg" alt="">
					</a>
      </div>
      <div class="work-right-text text-center">
        <h2>working with us</h2>
        <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
        <a href="#contact" class="ready-btn">Contact us</a>
      </div>
    </div>
  </div>
  <!-- End reviews Area -->


  <!-- Start Blog Area -->
  <div id="blog" class="blog-area">
    <div class="blog-inner area-padding">
      <div class="blog-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Latest News</h2>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($posts as $post)
          <?php
            $comment = DB::table('comments')
              ->where('post_id', $post->id)
              ->count('id');
          ?>
          <!-- Start Left Blog -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="single-blog">
              <div class="single-blog-img">
                <a href="{{url('post/'.$post->id)}}">
									<img src="{{asset($post->featured_photo)}}" alt="">
								</a>
              </div>
              <div class="blog-meta">
                <span class="comments-type">
										<i class="fa fa-comment-o"></i>
										<a href="{{url('post/'.$post->id)}}">{{$comment}} comments</a>
									</span>
                <span class="date-type">
										<i class="fa fa-calendar"></i> {{$post->create_at}}
									</span>
              </div>
              <div class="blog-text">
                <h4>
                    <a href="{{url('post/'.$post->id)}}">{{$post->title}}</a>
								</h4>
                <p>
                  {{$post->short_description}}
                </p>
              </div>
              <span>
									<a href="{{url('post/'.$post->id)}}" class="ready-btn">Read more</a>
								</span>
            </div>
            <!-- Start single blog -->
          </div>
          <!-- End Left Blog-->
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- End Blog -->

@endsection