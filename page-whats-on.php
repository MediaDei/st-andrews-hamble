<?php get_header(); ?>


		
	<figure class="hero-image whatson"></figure>
	<div class="page-title"><h1>What's On & Services</h1></div>
</header>

<div class="whats-on-wrap">
	<section class="whats-on">
		<div id="events" class="upNext">
			<h1>Up Next</h1>
			<section class="ac-container">

				<div class="event-list">
				<?php 
					// Ensure the global $post variable is in scope
					global $post;
					date_default_timezone_set('Europe/London'); 

					$i = 1;
					
					$now = new DateTime();

					// Retrieve upcoming events
					$events = tribe_get_events( array(
						'eventDisplay'  => 'upcoming',      // Upcoming, Past, Custom, List, etc
						'start_date'    => $now->format('y-m-d H:i')
					) );


					foreach ( $events as $post ) {
						setup_postdata( $post ); // basic WP post setup

						if ($i == 1) {
							$event = new DateTime(tribe_get_start_date( null, true, "y-m-d H:i:s"));
							$end = new DateTime(tribe_get_end_date( null, true, "y-m-d H:i:s"));
							$interval = $now->diff($event);

							//echo $now->format('y-m-d H:i') . '<br>';
							//echo $event->format('y-m-d H:i') . '<br>';
							//echo $end->format('y-m-d H:i') . '<br>';
							//echo $interval->format('%R') . $interval->format('%h') . ':' . $interval->format('%i') . ':' . $interval->format('%s') . '<br>';

							// if timer is within 2 days, show it
							if ($interval->days < 2) {

								// if negative interval, set to zero
								if ($interval->format('%R') === "-") {
									$totalseconds = 0;
								}

								else {
									$totalseconds = ($interval->format('%h') * 60 * 60) +
													($interval->format('%i') * 60) +
													 $interval->format('%s');
									// if there's an extra day, add it
									if ($interval->days > 0)
										$totalseconds += (24 * 60 * 60);								
								}

								echo '
								<div class="timer">
									<figure></figure>
									<p>starts in: <time datetime="P ';

									// if negative interval, show zeroes
									if ($interval->format('%R') === "-") {
										echo '0H 0M 0S"';
									}

									// show interval
									else {
										// if there's an extra day, add it
										if ($interval->days > 0)
											echo $interval->format('%h') + 24 . 'H ';
										else
											echo $interval->format('%h') . 'H ';
										echo   $interval->format('%i') . 'M 
										   ' . $interval->format('%s') . 'S"';
									} 
									echo 'id="countdown"></time></p>
								</div>';

								// Countdown script
								echo '
								<script src="' . get_bloginfo('template_url') . '/js/isInViewport.min.js" type="text/javascript"></script>
								<script type="text/javascript">
									function calcage(secs, num1, num2) {
									  s = ((Math.floor(secs/num1))%num2).toString();
									  if (s.length < 2)
									  	s = "0" + s;
									  return s;
									}
									function countback(secs) {
										if (secs == 0) {
											DisplayStr = DisplayFormat.replace(/%%H%%/g, "00");
											DisplayStr = DisplayStr.replace(/%%M%%/g, "00");
											DisplayStr = DisplayStr.replace(/%%S%%/g, "00");
											document.getElementById("countdown").innerHTML = DisplayStr;
											document.getElementById("countdown").className += "blink";
											return;
										}

										else {
											DisplayStr = DisplayFormat.replace(/%%H%%/g, calcage(secs,3600,48));
											DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
											DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));

											document.getElementById("countdown").innerHTML = DisplayStr;

											if (secs == 1) window.location.reload();

											setTimeout("countback(" + (secs-1) + ")", 1000);
										}
									}
									DisplayFormat = "%%H%% Hrs, %%M%% Min, %%S%% Sec";
									countback(' . $totalseconds . ')
								';

								// if in view, slide down
								echo "
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

									$('.event-list').addClass('runonce');
									$('.event-list .timer').css('top', '10px');
									$(window).scroll( function() {
										$('.event-list.runonce:in-viewport(250)').run(function() {
											$('.event-list .timer').animate({ 'top' : '-=44px' }, 1000, 'easeOutBounce');
											this.removeClass('runonce');
										});
									});

									var timeBlink = function() {
										var elem = $(this);
										setInterval(function() {
										    if (elem.css('visibility') == 'hidden') {
										        elem.css('visibility', 'visible');
										    } else {
										        elem.css('visibility', 'hidden');
										    }    
										}, 800);
									};

									$('.blink').each ( timeBlink );

								</script>
								";
							}
						}


						echo '
						<input id="ac-' . $i . '" type="radio"' . ($i == 1 ? ' checked=""' : ' ') . ' name="accordion-1">
						<label for="ac-' . $i . '">			
							<header>
								<h1>' . get_the_title() . '</h1>
								<time datetime="' . tribe_get_start_date(null, false, 'Y-m') . '">
									<span>' . tribe_get_start_date(null, false, 'j F') . '</span> &bull; <span>' . tribe_get_start_date(null, false, 'g:i') . ' - ' . tribe_get_end_date(null, false, 'g:ia') . '</span> &bull; <span>' . tribe_get_venue() . '</span>
								</time>
							</header>

							<article>';
							if (has_post_thumbnail() ){
								echo '<a class="image">' . get_the_post_thumbnail() . '</a>';
							}
							echo '<p>' . get_the_content() . '</p>
							</article>
							
							<div class="bottomBox">
								<span class="fa fa-calendar"></span>
								<time>' . tribe_get_start_date(null, false, 'j M., g:i') . ' - ' . tribe_get_end_date(null, false, 'g:ia') . '</time>
								<span class="fa fa-star-o"></span>
								<time>' . tribe_get_venue() . '</time>
							</div>
						</label>';

						$i++;
					} #aEND foreach
				?>
				<?php wp_reset_query(); ?>
				</div>
			</section>
		</div>
	</section>





	<section class="whats-on greyBackground">
		<div class="divineServices">

			<!--dropdown-->    
			<script>
				$(document).ready(function() {
					var radioButtons = [false, false, false];

					$("input[type='radio'].radioButton-services").click(function() {
						if( radioButtons[$(this).index("input[type='radio']")] == true ) { // if clicking on self
							$(this).prop('checked', false);								   // unselect self
							radioButtons[$(this).index("input[type='radio']")] = false;
						}
						else {															// if clicking another
							radioButtons = [false, false, false];
							$("input[type='radio'].radioButton-services").prop('checked', false);	// unselect all
							radioButtons[$(this).index("input[type='radio']")] = true;	// select self
							$(this).prop('checked', true);
						}
					});
				});
			</script>

			<input class="radioButton-services" id="services-eucharist" type="radio" name="service1">
			<input class="radioButton-services" id="services-prayer" type="radio" name="service2">
			<input class="radioButton-services" id="services-lighthouse" type="radio" name="service3">
			<input class="radioButton-services" id="services-evensong" type="radio" name="service4">
			
			<header>
				<h1>Church Services</h1>
			</header>
			
			<div id="services" class="service">
				<figure class="imageDefaults image-eucharist">
					<label class="radioLabel-services" for="services-eucharist">
					</label>
					<figcaption class="holyCommunionCaption">Holy Eucharist</figcaption>
				</figure>
				<article class="clear">
					<h1>Sunday, 10am</h1>
					<p>
						Main service, with hymns and sung liturgy
					</p>
				</article>
				<div class="otherTimesDiv">
					<p>OTHER TIMES</p>
				</div>

				<article class="clear otherArticle">
					<h2>Tuesday, 7pm</h2>
					<p class="otherP">
						Said Eucharist; anointing for healing on the 1st Tuesday
					</p>
				</article>
				<article class="clear otherArticle">
					<h2>Thursday, 10am</h2>
					<p class="otherP">
						Said Eucharist with hymns
					</p>
				</article>
				<div class="arrow eucharistArrow"></div>
			</div>
			<div class="modal-info m1">
				<div class="bio">
					<h1>
						Holy Eucharist
					</h1>
					<p>
						We gather together as Christ’s body around His altar. We are a people desperately hungry for God. The Holy Eucharist nourishes our souls with Christ’s body and blood, and also joins us all together in one body. Our services are Eucharistic because our spiritual lives depend on this holy food. We make our confession for forgiveness, listen to the Word, hear God’s minister teach, recite the Creed, and at the pinnacle of our service, feed on Christ’s body and blood. Join us in this wondrous mystery. 
					</p>
				</div>
				<label for="services-eucharist">
					<div class="close fa fa-times">
					</div>
				</label>
			</div>

			
			<div class="service">
				<figure class="imageDefaults image-prayer">
					<label for="services-prayer">
					</label>
					<figcaption class="dailyOfficeCaption">Daily Prayer</figcaption>
				</figure>
				<article class="clear">
					<h1>Tue-Sat, 8:30am</h1>
					<p>
						Morning prayer most days of the week
					</p>
				</article>
				<div class="arrow prayerArrow"></div>

			</div>
			<div class="modal-info m2">
				<div class="bio">
					<h1>
						Daily Prayer
					</h1>
					<p>
						Morning prayer gives the opportunity to start the day with a quiet and reflective service with the liturgy, readings and prayers for the day. This is offered on several days of the week. It is a tremendous encouragement to us, knowing that we are lifting up our hearts unto God with millions of other Christians. If you feel isolated and disconnected from God, join us in the Daily Prayer.
					</p>
				</div>
				<label for="services-prayer">
					<div class="close fa fa-times">
					</div>
				</label>
			</div>


			
			<div class="service lighthouse-extra">
				<figure class="imageDefaults image-lighthouse">
					<label for="services-lighthouse">
					</label>
					<figcaption class="dailyOfficeCaption">For Children</figcaption>
				</figure>
				<article class="clear">
					<h1>1st Sunday, 11:30am</h1>
					<p>
						Lighthouse: short service for families with young children
					</p>
				</article>
				<div class="arrow lighthouseArrow"></div>

			</div>
			<div class="modal-info m3">
				<div class="bio">
					<h1>
						Lighthouse Service for Children
					</h1>
					<p>
						A warm, friendly welcome awaits you at LIGHTHOUSE, a short service (half an hour maximum) especially for young children on the first Sunday of every month.  We sing songs, hear a scripture reading using a children’s bible, have some prayers and a simple talk.</p>
					<p>
						Other  children’s activities include BEACONS, our weekly Sunday school, and CHERUBS for pre school children on Wednesday mornings.
					</p>
				</div>
				<label for="services-lighthouse">
					<div class="close fa fa-times">
					</div>
				</label>
			</div>

			
			
			<div class="service">
				<figure class="imageDefaults image-choral">
					<label for="services-evensong">
					</label>
					<figcaption class="choralEvensongCaption">Choral Evensong</figcaption>
				</figure>
				<article class="clear">
					<h1>2nd Sunday, 6pm</h1>
					<p>
						 Sung service with Book of Common Prayer
					</p>
				</article>
				<div class="arrow evensongArrow"></div>
			</div>
			<div class="modal-info m4">
				<div class="bio">
					<h1>
						Choral Evensong
					</h1>
					<p>
						We are called to sing praises to God (Chronicles 16:9). This special service consists of a sung liturgy. The church has sung its prayers since the very beginning. In fact, our book of Psalms is a collection of sung prayers. As part of its scriptural inheritance, the early Christians continued the Jewish custom of singing prayers. Join us in the Choral Evensong service, as together we lift our voices in adoration, confession, thanksgiving, and supplication to Almighty God, in accordance with the Book of Common Prayer. 
					</p>
					
				</div>
				<label for="services-evensong">
					<div class="close fa fa-times">
					</div>
				</label>
				
			</div>
		</div>
	</section>
</div>




<?php get_footer(); ?>    