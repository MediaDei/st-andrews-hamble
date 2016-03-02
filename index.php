<?php get_header(); ?>

	<figure class="hero-image home"></figure>
	<div class="page-title"><h1>Welcome</h1></div>
</header>

<section>
	<div class="parishDescription">
		<h1>St. Andrew's Church is...</h1>
		
		<div class="description">
			<figure class="imageDefaults image1">
			</figure>
			<p class="mainText">
				<span>At the centre:</span> for over nine hundred years - before yacht clubs, pubs, and factories arrived - St. Andrew's has been in the heart of the village sharing God’s love with the people of Hamble.
			</p>
		</div>
			
		<div class="description">
			<figure class="imageDefaults image2">
			</figure>
				<p class="mainText">
					<span>Traditional in worship:</span> while we value our anglo-catholic tradition, centred on the Eucharist, we warmly welcome people from all backgrounds and denominations.
			</p>
		</div>
			
		<div class="description">
			<figure class="imageDefaults image3">
			</figure>
				<p class="mainText">
					<span>Engaging the community:</span> we host a wide range of social and community events and believe in having fun! We host many of these events, for fellowship and outreach, and also to raise funds for the church and charities locally, nationally and internationally.
			</p>
		</div>
	</div>	
</section>

<section class="greyBackground">
	<div class="services">
		<h1>Church Services</h1>
		<h2>Holy Eucharist</h2>
		<div class="service">
			<figure class="imageDefaults leftShadow image1">
			</figure>
			<div class="text eucharist">
				<h3>Sunday, 10am</h3>
				<p>Main service of the week with hymns and sung liturgy</p>
				<a class="otherTimes" href="/whats-on/#services">Other Times &rarr;</a>
			</div>
		</div>
		
		<h2>Daily Prayer</h2>
		<div class="service">
			<figure class="imageDefaults rightShadow image2">
			</figure>
			<div class="text prayer">
				<h3>Tue-Sat, 8:30am</h3>
				<p>Morning prayer, most days of the week</p>
				
			</div>
			
		</div>
		
		<h2>Lighthouse Service</h2>
		<div class="service evensongBox">
			<figure class="imageDefaults leftShadow image3 evensongImage">
			</figure>
			<div class="text alternative">
				<h3>1st Sunday of the month, 11:30am</h3>
				<p>Short service for families with young children</p>
			</div>
		</div>
	</div>	
</section>

<section>
	<div class="eventsAndCommunity">
		<h1>Events & Community</h1>
		<div class="wrapper1 clear">
			<div>
				<div class="event">
					<?php 
						// Ensure the global $post variable is in scope
						global $post;
						date_default_timezone_set('Europe/London'); 
						 
						$events = tribe_get_events( array(
							'posts_per_page' => 1,
							'start_date' => strtotime('now')
						) );
						

						if ( empty( $events ) ) {
						    echo '
						    <div class="main">
						    	<p>No events currently scheduled.</p>
						    </div>';
						}

						else foreach ( $events as $post ) {
							setup_postdata( $post ); // basic WP post setup
							//remove_filter ('the_content','wpautop'); // prevent appending <p> to content

							$today = new DateTime();
							$event = new DateTime(tribe_get_start_date( null, true, "y-m-d H:i:s"));
							$interval = $today->diff($event);

							echo '
							<div class="main">
								<h2><a href="/whats-on/#events">' . get_the_title() . '</a></h2>
								<p>' . get_the_content() . '</p>
							</div>
							<div class="time">
								<p><span class="fa fa-calendar"></span><time>' . tribe_get_start_date(null, false, 'j F, g:ia') . '</time></p>
							</div>';

							if ($interval->days < 2) {

								$totalseconds = ($interval->format('%h') * 60 * 60) +
												($interval->format('%i') * 60) +
												 $interval->format('%s');
								// if there's an extra day, add it
								if ($interval->days > 0)
									$totalseconds += (24 * 60 * 60);

								echo '
								<div class="timer">
									<figure></figure>
									<p>starts in: <time datetime="P ';
										// if there's an extra day, add it
										if ($interval->days > 0)
											echo $interval->format('%h') + 24 . 'H ';
										else
											echo $interval->format('%h') . 'H ';
										echo   $interval->format('%i') . 'M 
										   ' . $interval->format('%s') . 'S" 
									id="countdown"></time></p>
								</div>';

								// Countdown script
								echo '
								<script type="text/javascript">
									function calcage(secs, num1, num2) {
									  s = ((Math.floor(secs/num1))%num2).toString();
									  if (s.length < 2)
									  	s = "0" + s;
									  return s;
									}
									function countback(secs) {
										DisplayStr = DisplayFormat.replace(/%%H%%/g, calcage(secs,3600,48));
										DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
										DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));

										document.getElementById("countdown").innerHTML = DisplayStr;
										setTimeout("countback(" + (secs-1) + ")", 1000);
									}
									DisplayFormat = "%%H%% Hrs, %%M%% Min, %%S%% Sec";
									countback(' . $totalseconds . ')
								</script>
								';

								// if in view, slide down
								echo "
								<script src='" . get_bloginfo('template_url') . "/js/isInViewport.min.js' type='text/javascript'></script>
								<script type='text/javascript'>

									// easeOutBounce function from http://gsgd.co.uk/sandbox/jquery/easing/
									$.easing.easeOutBounce = function (x, t, b, c, d) {
										if ((t/=d) < (1/2.75))
											return c*(7.5625*t*t) + b;
										else if (t < (2/2.75))
											return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
										else if (t < (2.5/2.75))
											return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
										else
											return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
									}

									$('.event').addClass('runonce');
									$('.event .main').css('background-color', 'white');
									$('.event .timer').css('bottom', '10px');
									$(window).scroll( function() {
										$('.event.runonce:in-viewport(150)').run(function() {
											$('.event .timer').animate({ 'bottom' : '-=49px' }, 1000, 'easeOutBounce');
											this.removeClass('runonce');
										});
									});
								</script>
								";
							}
						}

						//add_filter ('the_content','wpautop');	// restore
					?>
				</div>
			</div>
			<a href="/whats-on/#events" class="moreButton">
				<span class="clock fa fa-clock-o"></span><br>
				More<br>
				Events<br>
				<span class="arrow fa fa-long-arrow-right"></span>
			</a>
		</div>
		
		
		<div class="wrapper2 clear">
			<div class="grid-2-3">
				<div id="mapBox" class="Home mapBox">
				</div><!--End mapBox -->
			</div>
			<div class="grid-1-3">
				<div class="twitter">
					<div class="widgetHeader">
						<h1>
							<span class="fa fa-twitter"></span>Latest Tweets
						</h1>
					</div>
					<div class="widgetSubheader">
						<h2>@standrewshamble</h2>
						<a class="twitter-follow-button"
							href="https://twitter.com/standrewshamble"
							data-show-count="false"
							data-show-screen-name="false">
						  Follow @standrewshamble
						</a>
					</div>
					
					<div class="widget">
						<a class="twitter-timeline"
							data-dnt="true"
							href="https://twitter.com/standrewshamble"
							data-widget-id="621745956317433856"
							data-chrome="noheader"
							height="300"
							width="234">
						  Tweets by @standrewshamble
					 </a>
					</div>
				</div>
			</div>
		</div>
		<div class="connect-wrapper">
			<div class="form">
				<h1>Connect With Us!</h1>
				<?php echo do_shortcode('[contact-form-7 html_name="Subscribe" id="12" title="Subscribe"]'); ?>
			</div>
			<div class="accept top">
				<h1>Thank you.</h1>
				<h2>We'll keep in touch!</h2>
			</div>
		</div>
	</div>
</section>
<section class="greyBackground">
	<div class="gallery">
		<h1>Gallery</h1>
		<div class="slider">
			<div class="slideWrapper">
				<figure class="imageDefaults image1">
				</figure>
				<figcaption>
					Stained glass windows on the Northern walls, depicting the lives of the Saints.
				</figcaption>
			</div>
			
			<div class="slideWrapper">
				<figure class="imageDefaults image2">
				</figure>
				<figcaption>
					Passover dinner
				</figcaption>
			</div>
			
			<div class="slideWrapper">
				<figure class="imageDefaults image3">
				</figure>
				<figcaption>
					Cherubs, Wednesday’s at 11am!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image4">
				</figure>
				<figcaption>
					Lighthouse service, 1st Sunday of month at 11:30am!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image5">
				</figure>
				<figcaption>
					Baptismal font
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image6">
				</figure>
				<figcaption>
					Baptism!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image7">
				</figure>
				<figcaption>
					Church service, 10am every Sunday!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image8">
				</figure>
				<figcaption>
					Little Cherubs!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image9">
				</figure>
				<figcaption>
					Little Cherubs!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image10">
				</figure>
				<figcaption>
					Weddings!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image11">
				</figure>
				<figcaption>
					Ancient main entrance
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image12">
				</figure>
				<figcaption>
					Holy matrimony
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image13">
				</figure>
				<figcaption>
					War Memorial unveiling!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image14">
				</figure>
				<figcaption>
					War Memorial unveiling!
				</figcaption>
			</div>

			<div class="slideWrapper">
				<figure class="imageDefaults image15">
				</figure>
				<figcaption>
					Easter vigil
				</figcaption>
			</div>
		</div>
	</div>
	
</section>
<section>
	<div class="comfortableWords">
		<blockquote>Sharing God’s love with the people of Hamble.</blockquote>
		<p>So God loved the world, that he gave his only-begotten Son, to the end that all that believe in him should not perish, but have everlasting life. - Gospel of St. John, iii. 16.</p>
	</div>
	
</section>


<!--Mapbox-->
<script>
	L.mapbox.accessToken = 'pk.eyJ1IjoiZm9zZWRpbGUiLCJhIjoiYTk4YzcwNDk2YTMzMmJjODE3NWY5NDU0YjFlNGJkNjcifQ.6YyEZHhF4p1gYiBa0tkGbQ';

	var geojson = [{
		"type": "FeatureCollection",
		"features": []
	}];
	var map = L.mapbox.map('mapBox', 'fosedile.mkg70eb0').setView([50.861,-1.322], 15);
	map.scrollWheelZoom.disable();
	myLayer.setGeoJSON(geojson);
</script>

<!--twitter loading script-->
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
    t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
 
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
 
  return t;
}(document, "script", "twitter-wjs"));
</script>

<!--twitter usertimeline-->
 <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!--connect-with-us form-->
<script type="text/javascript">
function connectBoxOk(){
	$('.form').addClass('top');
	$('.accept').removeClass('top');
}
</script>

<!--slick slider-->
<script src="<?php bloginfo('template_url'); ?>/js/slick.js" type='text/javascript'></script>
<script type="text/javascript">
$(document).ready(function(){
  $('.slider').slick({
    infinite: true,
    slideToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: "140px",
    dots: true,
    variableWidth: true
  });
});
</script>


<?php get_footer(); ?>
