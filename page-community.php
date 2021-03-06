<?php get_header(); ?>

	
	<figure class="hero-image community"></figure>
	<div class="page-title"><h1>Community</h1></div>
</header>

<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		var a = "023 8045";
		var e = "5794";
		var r = "tel:" + a + e; //href
		$('#phone1').attr('href',r).html(a + ' ' + e);
	});
</script>
<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		var a = "023 8045";
		var e = "5794";
		var r = "tel:" + a + e; //href
		$('#phone2').attr('href',r).html(a + ' ' + e);
	});
</script>
<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		var a = "023 8045";
		var e = "2988";
		var r = "tel:" + a + e; //href
		$('#phone3').attr('href',r).html(a + ' ' + e);
	});
</script>


<section class="community">
	<div class="wrapper">
		<div class="text">
			<h2>St Andrew's Cafe</h2>
			<p>
				Every other Tuesday, 10.30 am – 12.45 pm in the Priory Centre (except August)

				Run by volunteers from the church and the village the café provides excellent low cost lunches and a fun meeting place for all.  Any queries call Joan Marshall; <a id="phone1" class="phone-number" href="#">Please enable Javascript to view</a>.  
			</p>
		</div>
		<div class="image cafe"></div>
	</div>

	<div class="wrapper">
		<div class="image place-2b"></div>
		<div class="text place-2b">
			<h2>The Place 2B</h2>
			<p>
				Every other Tuesday, 10.30 am – 12.45 pm in the Priory Centre (except August)

				Run by volunteers from the church and the village the café provides excellent low cost lunches and a fun meeting place for all.  Any queries call Joan Marshall; <a id="footer-phone" class="phone-number" href="#">Please enable Javascript to view</a>.  
			</p>
		</div>
	</div>
	<div class="support-group">
		<div class="left">
			<h2>Bereavement Support Group</h2>
			<p>
				Every 4th Wednesday, 2 - 3 pm, in the Priory Centre.
			</p>
		</div>
		<div class="right">
			<p>
				An informal, friendly group that shares worries and strategies for coping with loss over tea and biscuits.  For information contact Heather Smith; <a id="phone3" class="phone-number" href="#">Please enable Javascript to view</a>. 
			</p>
		</div>
	</div>
	<div class="social-fund">
		<h2>Social Activities & Fund-Raising</h2>
		<p>
			St Andrew’s has a reputation for offering people a good social programme in a safe environment and at affordable prices  - from  coffee, cakes and quizzes to formal dinners and concerts. Keep an eye on the website for upcoming events – we look forward to seeing you there!
		</p>
	</div>
	<?php if ( function_exists( 'soliloquy' ) ) { soliloquy( 'community', 'slug' ); } ?>
</section>
<section class="community grey-bg" id="priory-centre">
	<h1>The Priory Centre</h1>
	<p>
		The Priory Centre is a modern hall attached to the church that can be hired for all sorts of functions.  It is well used for church functions and community activities and is let out for numerous village events  eg: children’s parties, family celebrations, meetings, wedding receptions.
	</p>
	<div class="wrapper">
		<div class="ph1"></div>
		<div class="ph2"></div>
	</div>
	<div class="wrapper floor-plan">
		<p>
			The Priory Centre is an L shaped building around two sides of the monastic cloister – a grassy area that is often used at summer functions and is popular as an enclosed children’s playarea.  It has toilets and a splendid kitchen from which meals for up to 100 people can be produced.  There is a sliding dividing wall which enables the creation of smaller meeting area.  It has disabled access and facilities.
		</p>
	</div>
	<div class="wrapper">
		<div class="ph3"></div>
		<div class="ph4"></div>
	</div>
	<p class="info">
		<span class="arrow fa fa-reply-all fa-flip-horizontal"></span>For more information, hire rates, and 
		bookings please contact, Jeff Law:
		<a id="phone5" class="phone-number" href="#">Please enable Javascript to view</a>	
		<a id="email1" class="email-address" href="#">Please enable Javascript to view</a>
	</p>
</section>

<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		var a = "023 8045";
		var e = "4299";
		var r = "tel:" + a + e; //href
		$('#phone5').attr('href',r).html(a + ' ' + e);
	});
</script>
<script type="text/javascript">
	var $ = jQuery.noConflict();
	$(document).ready(function() {
		var e = "jenjeff"; // replace with your email username
		var t = "btinternet"; // replace with your email provider
		var n = ".com"; // replace with your email provider TLD
		var r = "mailto:" + e + '@' + t + n; //href
		$('#email1').attr('href',r).html(e + '@'+t+n);
	});
</script>
<?php get_footer(); ?>
