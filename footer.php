		<footer>
			<div class="contact">
				<h3>Contact</h3>				
				<figure class="svg-container">
				<svg version="1.1" viewBox="-4 -4 123 120" preserveAspectRatio="xMinYMin meet">
					<defs>
						<path id="path" d="M2.86881886,103.70309 C4.85341274,106.028435 7.1671348,107.258068 9.81489742,107.258068 L100.447959,107.258068 C103.095722,107.258068 105.409444,106.028435 107.394038,103.70309 C109.27056,101.243824 110.262857,98.37671 110.262857,95.0956601 L110.262857,34.5697256 C108.494407,37.0289912 106.401741,39.2143287 104.088019,41.125738 C90.6330617,52.4663612 80.4890361,61.2077111 73.4348856,67.4958827 C71.1211636,69.6812202 69.2446416,71.3187014 67.8102322,72.5483342 C66.2677508,73.6440466 64.3912289,74.8736794 61.9645225,76.1033122 C59.5427285,77.332945 57.3370784,78.0147215 55.2395002,78.0147215 L55.018444,78.0147215 C52.9257782,78.0147215 50.720128,77.332945 48.2934217,76.1033122 C45.8667153,74.8736794 43.9951057,73.6440466 42.4526244,72.5483342 C41.0182149,71.3187014 39.141693,69.6812202 36.8279709,67.4958827 C31.2033175,62.4373439 21.0592919,53.695994 6.17483786,41.125738 C3.8611158,39.2143287 1.76353762,37.0289912 0,34.5697256 L0,95.0956601 C0,98.37671 0.992296936,101.243824 2.86881886,103.70309 L2.86881886,103.70309 Z M3.4190033,24.1848072 C5.62465342,28.0076259 8.05135979,30.87474 10.5861381,33.0661647 C12.0205475,34.2957975 16.2058792,37.8446882 23.1568701,43.8589317 C30.2110206,50.0070956 35.6146178,54.5177783 39.3627492,57.7927408 C39.6918774,58.2066766 40.5761024,59.0223736 41.8975276,60.118086 C43.223865,61.3477188 44.3242339,62.3034235 45.2084589,62.9852 C46.0877716,63.8069843 47.1930528,64.6287686 48.406406,65.5844733 C49.7278311,66.4001703 50.8282,67.0880342 52.0415532,67.6358904 C53.1468344,68.0437389 54.1391313,68.317667 55.018444,68.317667 L55.2395002,68.317667 C56.1237252,68.317667 57.1160222,68.0437389 58.216391,67.6358904 C59.4297442,67.0880342 60.5350255,66.4001703 61.8564506,65.5844733 C63.0698038,64.6287686 64.1701726,63.8069843 65.0543976,62.9852 C65.9337103,62.3034235 67.0389915,61.3477188 68.3604166,60.118086 C69.6867541,59.0223736 70.5660668,58.2066766 70.9001073,57.7927408 C74.7563108,54.5177783 84.3501519,46.3181973 99.7847904,33.0661647 C102.761681,30.4668915 105.188388,27.3258493 107.285966,23.636951 C109.27056,19.9480526 110.262857,16.1191466 110.262857,12.1563201 C110.262857,8.74134989 109.27056,5.87423582 107.285966,3.54889066 C105.409444,1.08962509 103.095722,0 100.447959,0 L9.81489742,0 C6.7250223,0 4.29831594,1.22963278 2.53477831,3.96282645 C0.884224992,6.55601241 0,9.83706227 0,13.7998887 C0,17.0748513 1.10036888,20.4959088 3.4190033,24.1848072 L3.4190033,24.1848072 Z" stroke="5" stroke-color="red"></path>
						<filter id="drop-shadow">
							<feGaussianBlur in="SourceAlpha" stdDeviation="3"/>
							<feOffset dx="0" dy="2" result="offsetblur"/>
							<feFlood flood-color="rgba(0,0,0,0.7)"/>
							<feComposite in2="offsetblur" operator="in"/>
							<feMerge>
								<feMergeNode/>
								<feMergeNode in="SourceGraphic"/>
							</feMerge>
						</filter>
						<filter id="inset-shadow">
						    <feOffset dx="0" dy="5"/>                                                         <!-- Shadow Offset -->
						    <feGaussianBlur stdDeviation="1.5" result="offset-blur"/>                           <!-- Shadow Blur -->
						    <feComposite operator="out" in="SourceGraphic" in2="offset-blur" result="inverse"/> <!-- Invert the drop shadow to create an inner shadow -->
						    <feFlood flood-color="black" flood-opacity="1" result="color"/>                     <!-- Color & Opacity -->
						    <feComposite operator="in" in="color" in2="inverse" result="shadow"/>               <!-- Clip color inside shadow -->
						    <feComponentTransfer in="shadow" result="shadow">                                   <!-- Shadow Opacity -->
						        <feFuncA type="linear" slope="1"/>
						    </feComponentTransfer>
						    <feComposite operator="over" in="shadow" in2="SourceGraphic"/>                      <!-- Put shadow over original object -->
						</filter>
					
						<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="top">
							<stop stop-color="#FFFFFF" stop-opacity="0.6" offset="0"></stop>
							<stop stop-color="#FFFFFF" stop-opacity="0" offset="1"></stop>
						</linearGradient>
						<linearGradient x1="50%" y1="79%" x2="50%" y2="56%" id="bottom">
							<stop stop-color="#000000" stop-opacity="0.5" offset="0"></stop>
							<stop stop-color="#FFFFFF" stop-opacity="0" offset="1"></stop>
						</linearGradient>
					</defs>

					<g id="button">
						<use id="shape" xlink:href="#path" fill="#C5B3AA" filter="url(#drop-shadow)" />

						<mask id="mask" fill="white"><use xlink:href="#path" /></mask>
						<rect id="glint-top" fill="url(#top)" mask="url(#mask)" width="129" height="74"></rect>
						<rect id="glint-btm" fill="url(#bottom)" mask="url(#mask)" x="-27" y="62" width="156" height="59"></rect>
					</g>
				</svg>
				<figcaption>Contact</figcaption>
				</figure>
				<style>
					.svg-container:hover #top stop:first-of-type { stop-opacity: 0.8; }
					.svg-container:hover #bottom stop:first-of-type { stop-opacity: 0.7; }
					.svg-container:active #shape { filter:url(#inset-shadow); }
					.svg-container:active #glint-top { display:none; }
					.svg-container:active #glint-btm { display:none; }
					footer .svg-container:active figcaption { bottom: -4px !important; }
				</style>

				<p class="details">
					<span>Email:</span> <a class="email-address" href="mailto:StAndrews.Hamble@gmail.com">StAndrews.Hamble@gmail.com</a><br><br>
					<span>Phone:</span> <a class="phone-number" href="tel:02380 452148">02380 452148</a>
				</p>

				<h3 class="address">Address</h3>
				<p class="address">St. Andrew the Apostle, Hamble<br>
				High St., Hamble-le-Rice, Southampton,<br>
				Hampshire SO314JF</p>
			</div>


			<div class="social">
				<h3>Social</h3>
				<a href="https://www.facebook.com/standrewshamble/"><figure class="fa fa-facebook"></figure>Facebook</a>
				<a href="https://twitter.com/standrewshamble"><figure class="fa fa-twitter"></figure>Twitter</a>
				<a href="/rss/"><figure class="fa fa-rss"></figure>Rss Feed</a>
			</div>


			<div class="branding">
				<p class="title">St. Andrew's<br> <span>Church</span></p>
				<figure class="cross"></figure>
				<p class="benediction"><span>The grace of our Lord Jesus Christ, and<br>
				the love of God, and the fellowship of<br>
				the Holy Ghost, be with us all<br>
				evermore.</span> Amen.</p>
			</div>


			<div class="mediadei">
				<a href="http://www.mediadei.org">Designed and built by Media Dei, &copy; <?php echo date("Y"); ?></a>
			</div>

			<div class="contact-lightbox">
				<div class="overlay"></div>
				<?php echo do_shortcode('[contact-form-7 html_name="ContactForm" id="11" title="Contact Form"]'); ?>
			</div>
		</footer>


	</div> <?php # END div.page-wrap ?>



	<script type="text/javascript">
		var $ = jQuery.noConflict();
	  $(document).ready(function(){

		$("header .social .contact, footer .svg-container, section.about-contact a.contact").click(function() {
			$("div.contact-lightbox").css("display","block");
		});		

		$("footer .contact-lightbox .close, footer .overlay").click(function() {
			$("div.contact-lightbox").css("display","none");
		});

	  });
	</script>



	<?php wp_footer(); ?>
</body>
</html>